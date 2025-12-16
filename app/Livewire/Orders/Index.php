<?php

namespace App\Livewire\Orders;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $orders = Auth::user()
            ->orders()
            ->with('foodtruck')
            ->withCount('items')
            ->latest()
            ->get();

        return view('livewire.orders.index', [
            'orders' => $orders,
        ]);
    }
}
