<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 py-6 space-y-5">
        <div class="flex items-center justify-between gap-3">
            <div>
                <p class="text-sm text-purple-300">{{ $foodtruck->name }}</p>
                <h1 class="text-2xl font-bold">Menu</h1>
                <p class="text-gray-400 mt-1">{{ $foodtruck->description }}</p>
            </div>
            <a href="{{ route('cart.show') }}" class="px-3 py-2 rounded-full border border-orange-500 text-orange-300 font-semibold hover:bg-orange-500/10 transition" wire:navigate>
                Cart bekijken
            </a>
        </div>

        @if (session()->has('message'))
            <div class="bg-green-900/40 border border-green-700 text-green-200 rounded-xl px-4 py-3">
                {{ session('message') }}
            </div>
        @endif

        <div class="space-y-4">
            @foreach ($products as $product)
                <div class="bg-gray-900 border border-gray-800 rounded-2xl p-4 flex items-start justify-between gap-4">
                    <div class="space-y-2">
                        <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                        <p class="text-gray-400 text-sm">{{ $product->description }}</p>
                        <p class="text-orange-300 font-semibold">€ {{ number_format($product->price, 2, ',', '.') }}</p>
                    </div>
                    <button wire:click="addToCart({{ $product->id }})" class="self-center px-4 py-2 rounded-full bg-orange-500 text-white font-semibold hover:bg-orange-600 transition">Add</button>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
