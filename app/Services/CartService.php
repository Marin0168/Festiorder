<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class CartService
{
    protected string $sessionKey = 'cart';

    public function get(): array
    {
        return Session::get($this->sessionKey, [
            'foodtruck_id' => null,
            'items' => [],
        ]);
    }

    public function add(Product $product, int $quantity = 1): void
    {
        $cart = $this->get();

        if ($cart['foodtruck_id'] && $cart['foodtruck_id'] !== $product->foodtruck_id) {
            $cart = [
                'foodtruck_id' => $product->foodtruck_id,
                'items' => [],
            ];
        }

        $cart['foodtruck_id'] = $product->foodtruck_id;

        $existing = $cart['items'][$product->id] ?? null;
        $cart['items'][$product->id] = [
            'product_id' => $product->id,
            'foodtruck_id' => $product->foodtruck_id,
            'name' => $product->name,
            'price' => (float) $product->price,
            'quantity' => ($existing['quantity'] ?? 0) + $quantity,
        ];

        Session::put($this->sessionKey, $cart);
    }

    public function increment(int $productId): void
    {
        $cart = $this->get();
        if (! isset($cart['items'][$productId])) {
            return;
        }

        $cart['items'][$productId]['quantity'] += 1;
        Session::put($this->sessionKey, $cart);
    }

    public function decrement(int $productId): void
    {
        $cart = $this->get();
        if (! isset($cart['items'][$productId])) {
            return;
        }

        $cart['items'][$productId]['quantity'] -= 1;

        if ($cart['items'][$productId]['quantity'] <= 0) {
            unset($cart['items'][$productId]);
        }

        if (empty($cart['items'])) {
            $this->clear();
            return;
        }

        Session::put($this->sessionKey, $cart);
    }

    public function remove(int $productId): void
    {
        $cart = $this->get();
        Arr::forget($cart['items'], $productId);

        if (empty($cart['items'])) {
            $this->clear();
            return;
        }

        Session::put($this->sessionKey, $cart);
    }

    public function clear(): void
    {
        Session::forget($this->sessionKey);
    }

    public function items(): Collection
    {
        $cart = $this->get();

        return collect($cart['items'] ?? []);
    }

    public function subtotal(): float
    {
        return $this->items()
            ->map(fn ($item) => $item['price'] * $item['quantity'])
            ->sum();
    }
}
