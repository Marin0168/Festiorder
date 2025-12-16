<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Show extends Component
{
    use AuthorizesRequests;

    public Order $order;

    public function mount(Order $order): void
    {
        $this->authorize('view', $order);
        $this->order = $order->load(['foodtruck', 'items.product']);
    }

    public function render()
    {
        return view('livewire.orders.show', [
            'order' => $this->order,
        ]);
    }
}
