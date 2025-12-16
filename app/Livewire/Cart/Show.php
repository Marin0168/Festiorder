<?php

namespace App\Livewire\Cart;

use App\Models\Foodtruck;
use App\Models\Order;
use App\Models\OrderItem;
use App\Services\CartService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Show extends Component
{
    public array $cart = [];

    public function mount(CartService $cart): void
    {
        $this->cart = $cart->get();
    }

    public function increment(int $productId, CartService $cart): void
    {
        $cart->increment($productId);
        $this->cart = $cart->get();
    }

    public function decrement(int $productId, CartService $cart): void
    {
        $cart->decrement($productId);
        $this->cart = $cart->get();
    }

    public function remove(int $productId, CartService $cart): void
    {
        $cart->remove($productId);
        $this->cart = $cart->get();
    }

    public function placeOrder(CartService $cart): void
    {
        $cartData = $cart->get();

        if (empty($cartData['items'])) {
            session()->flash('error', 'Je cart is leeg. Voeg eerst items toe.');
            return;
        }

        $user = Auth::user();
        $foodtruck = Foodtruck::findOrFail($cartData['foodtruck_id']);
        $items = collect($cartData['items']);

        $total = $items->map(fn ($item) => $item['price'] * $item['quantity'])->sum();

        $order = Order::create([
            'user_id' => $user->id,
            'foodtruck_id' => $foodtruck->id,
            'status' => 'placed',
            'pickup_code' => Str::upper(Str::random(6)),
            'locker_number' => null,
            'total' => $total,
        ]);

        $items->each(function ($item) use ($order): void {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        });

        $cart->clear();
        $this->cart = $cart->get();

        $this->redirectRoute('orders.show', $order);
    }

    public function render(CartService $cart)
    {
        return view('livewire.cart.show', [
            'items' => collect($this->cart['items'] ?? []),
            'subtotal' => $cart->subtotal(),
        ]);
    }
}
