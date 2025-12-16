<?php

namespace App\Livewire;

use App\Models\Foodtruck;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $user = Auth::user();

        return view('livewire.dashboard', [
            'foodtrucks' => Foodtruck::withCount('products')->orderBy('name')->take(3)->get(),
            'recentOrders' => $user?->orders()
                ->with('foodtruck')
                ->latest()
                ->take(3)
                ->get() ?? collect(),
        ]);
    }
}
