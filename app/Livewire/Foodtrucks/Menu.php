<?php

namespace App\Livewire\Foodtrucks;

use App\Models\Foodtruck;
use App\Models\Product;
use App\Services\CartService;
use Livewire\Component;

class Menu extends Component
{
    public Foodtruck $foodtruck;

    public function mount(Foodtruck $foodtruck): void
    {
        $this->foodtruck = $foodtruck;
    }

    public function addToCart(int $productId, CartService $cart): void
    {
        $product = Product::where('foodtruck_id', $this->foodtruck->id)->findOrFail($productId);
        $cart->add($product);

        session()->flash('message', "{$product->name} toegevoegd aan je cart");
    }

    public function render()
    {
        return view('livewire.foodtrucks.menu', [
            'products' => $this->foodtruck->products()->orderBy('name')->get(),
        ]);
    }
}
