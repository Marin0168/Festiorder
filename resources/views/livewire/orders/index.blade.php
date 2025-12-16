<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 py-6 space-y-4">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold">Mijn orders</h1>
            <p class="text-sm text-gray-400">Bekijk status en details.</p>
        </div>

        <div class="space-y-3">
            @forelse ($orders as $order)
                <a href="{{ route('orders.show', $order) }}" class="block bg-gray-900 border border-gray-800 rounded-2xl p-4 hover:border-orange-500 transition" wire:navigate>
                    <div class="flex items-start justify-between">
                        <div class="space-y-1">
                            <p class="text-sm text-gray-300">{{ $order->foodtruck->name }}</p>
                            <p class="text-xs text-gray-500">Geplaatst op {{ $order->created_at->format('d M H:i') }}</p>
                            <p class="text-sm text-gray-200 font-semibold">€ {{ number_format($order->total, 2, ',', '.') }}</p>
                        </div>
                        <div class="text-right">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-orange-500/20 text-orange-300 capitalize">{{ str_replace('_', ' ', $order->status) }}</span>
                            <p class="text-xs text-purple-200 mt-2">{{ $order->items_count }} items</p>
                        </div>
                    </div>
                </a>
            @empty
                <div class="bg-gray-900 border border-gray-800 rounded-2xl p-4 text-gray-400">Nog geen orders geplaatst.</div>
            @endforelse
        </div>
    </div>
</x-app-layout>
