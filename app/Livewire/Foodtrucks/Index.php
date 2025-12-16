<?php

namespace App\Livewire\Foodtrucks;

use App\Models\Foodtruck;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.foodtrucks.index', [
            'foodtrucks' => Foodtruck::withCount('products')->orderBy('name')->get(),
        ]);
    }
}
