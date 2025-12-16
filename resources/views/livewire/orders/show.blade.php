<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 py-6 space-y-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-purple-300">{{ $order->foodtruck->name }}</p>
                <h1 class="text-2xl font-bold">Order #{{ $order->id }}</h1>
                <p class="text-gray-400 text-sm">Geplaatst op {{ $order->created_at->format('d M H:i') }}</p>
            </div>
            <span class="px-4 py-2 rounded-full text-xs font-semibold bg-orange-500/20 text-orange-300 capitalize">{{ str_replace('_', ' ', $order->status) }}</span>
        </div>

        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-4 space-y-2">
            <h2 class="font-semibold">Pickup info</h2>
            <p class="text-sm text-gray-400">Pickup code: <span class="text-white font-semibold">{{ $order->pickup_code ?? 'Nog niet toegewezen' }}</span></p>
            <p class="text-sm text-gray-400">Locker nummer: <span class="text-white font-semibold">{{ $order->locker_number ?? 'Volgt later' }}</span></p>
        </div>

        <div class="space-y-3">
            <h2 class="font-semibold text-lg">Items</h2>
            @foreach ($order->items as $item)
                <div class="bg-gray-900 border border-gray-800 rounded-2xl p-4 flex items-center justify-between">
                    <div>
                        <h3 class="font-semibold">{{ $item->product->name }}</h3>
                        <p class="text-sm text-gray-400">€ {{ number_format($item->price, 2, ',', '.') }} per stuk</p>
                    </div>
                    <div class="text-right">
                        <p class="font-semibold">x{{ $item->quantity }}</p>
                        <p class="text-orange-300 font-semibold">€ {{ number_format($item->price * $item->quantity, 2, ',', '.') }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-4 flex items-center justify-between">
            <p class="text-sm text-gray-400">Totaal</p>
            <p class="text-2xl font-bold">€ {{ number_format($order->total, 2, ',', '.') }}</p>
        </div>
    </div>
</x-app-layout>
