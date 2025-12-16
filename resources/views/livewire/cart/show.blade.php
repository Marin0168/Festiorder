<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 py-6 space-y-4">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold">Mijn Cart</h1>
            <a href="{{ route('foodtrucks.index') }}" class="text-purple-300 text-sm hover:text-purple-100" wire:navigate>Verder shoppen →</a>
        </div>

        @if (session()->has('error'))
            <div class="bg-red-900/40 border border-red-700 text-red-200 rounded-xl px-4 py-3">
                {{ session('error') }}
            </div>
        @endif

        <div class="space-y-3">
            @forelse ($items as $item)
                <div class="bg-gray-900 border border-gray-800 rounded-2xl p-4 flex items-center justify-between">
                    <div>
                        <h3 class="font-semibold">{{ $item['name'] }}</h3>
                        <p class="text-sm text-gray-400">€ {{ number_format($item['price'], 2, ',', '.') }} per stuk</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <button wire:click="decrement({{ $item['product_id'] }})" class="h-8 w-8 rounded-full bg-gray-800 text-white flex items-center justify-center">-</button>
                        <span class="font-semibold">{{ $item['quantity'] }}</span>
                        <button wire:click="increment({{ $item['product_id'] }})" class="h-8 w-8 rounded-full bg-orange-500 text-white flex items-center justify-center">+</button>
                        <button wire:click="remove({{ $item['product_id'] }})" class="text-sm text-red-400 hover:text-red-200">Remove</button>
                    </div>
                </div>
            @empty
                <div class="bg-gray-900 border border-gray-800 rounded-2xl p-4 text-gray-400">Je cart is leeg.</div>
            @endforelse
        </div>

        @if ($items->isNotEmpty())
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-4 flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-400">Totaal</p>
                    <p class="text-2xl font-bold">€ {{ number_format($subtotal, 2, ',', '.') }}</p>
                </div>
                <button wire:click="placeOrder" class="px-5 py-3 rounded-full bg-orange-500 text-white font-semibold hover:bg-orange-600 transition">Place order</button>
            </div>
        @endif
    </div>
</x-app-layout>
