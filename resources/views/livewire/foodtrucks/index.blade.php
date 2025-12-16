<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 py-6 space-y-4">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold">Foodtrucks</h1>
            <p class="text-sm text-gray-400">Kies je favoriet en bestel meteen.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @forelse ($foodtrucks as $foodtruck)
                <a href="{{ route('foodtrucks.menu', $foodtruck) }}" class="bg-gray-900 border border-gray-800 rounded-2xl p-5 hover:border-orange-500 transition" wire:navigate>
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <h2 class="text-xl font-semibold">{{ $foodtruck->name }}</h2>
                            <p class="text-gray-400 mt-1 line-clamp-3">{{ $foodtruck->description }}</p>
                            <p class="text-purple-300 text-xs mt-2">{{ $foodtruck->products_count }} menu items</p>
                        </div>
                        <div class="h-12 w-12 rounded-xl bg-gray-800 flex items-center justify-center text-2xl">🔥</div>
                    </div>
                </a>
            @empty
                <div class="text-gray-400">Nog geen foodtrucks beschikbaar.</div>
            @endforelse
        </div>
    </div>
</x-app-layout>
