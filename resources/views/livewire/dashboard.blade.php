<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 py-6 space-y-6">
        <div class="bg-gradient-to-br from-gray-900 to-gray-800 border border-gray-800 rounded-2xl p-6 shadow-lg">
            <div class="flex flex-col gap-4">
                <div>
                    <p class="text-sm uppercase text-purple-300">Welkom terug</p>
                    <h1 class="text-2xl font-bold mt-1">Bestel je festival food in minuten</h1>
                    <p class="text-gray-300 mt-2">Kies een foodtruck, stel je menu samen en haal het op wanneer het klaar is.</p>
                </div>
                <div class="flex gap-3 flex-wrap">
                    <a href="{{ route('foodtrucks.index') }}" class="px-4 py-2 rounded-full bg-orange-500 text-white font-semibold hover:bg-orange-600 transition" wire:navigate>
                        Kies een foodtruck
                    </a>
                    <a href="{{ route('orders.index') }}" class="px-4 py-2 rounded-full border border-purple-500 text-purple-200 font-semibold hover:bg-purple-500/10 transition" wire:navigate>
                        Bekijk mijn orders
                    </a>
                </div>
            </div>
        </div>

        <div class="space-y-3">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold">Populaire foodtrucks</h2>
                <a href="{{ route('foodtrucks.index') }}" class="text-sm text-purple-300 hover:text-purple-100" wire:navigate>Alle trucks →</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach ($foodtrucks as $truck)
                    <a href="{{ route('foodtrucks.menu', $truck) }}" class="block bg-gray-900 border border-gray-800 rounded-2xl p-4 hover:border-orange-500 transition" wire:navigate>
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h3 class="text-lg font-semibold">{{ $truck->name }}</h3>
                                <p class="text-gray-400 text-sm mt-1 line-clamp-2">{{ $truck->description }}</p>
                                <p class="text-purple-300 text-xs mt-2">{{ $truck->products_count }} items</p>
                            </div>
                            <div class="h-12 w-12 rounded-xl bg-gray-800 flex items-center justify-center text-2xl">🚚</div>
                        </div>
                    </a>
                @endforeach

                @if($foodtrucks->isEmpty())
                    <div class="text-gray-400">Nog geen foodtrucks beschikbaar.</div>
                @endif
            </div>
        </div>

        <div class="space-y-3">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold">Recente orders</h2>
                <a href="{{ route('orders.index') }}" class="text-sm text-purple-300 hover:text-purple-100" wire:navigate>Alles bekijken →</a>
            </div>
            <div class="space-y-3">
                @forelse ($recentOrders as $order)
                    <a href="{{ route('orders.show', $order) }}" class="block bg-gray-900 border border-gray-800 rounded-2xl p-4 hover:border-orange-500 transition" wire:navigate>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-300">{{ $order->foodtruck->name }}</p>
                                <p class="text-xs text-gray-400">{{ $order->created_at->format('d M H:i') }}</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-orange-500/20 text-orange-300 capitalize">{{ str_replace('_', ' ', $order->status) }}</span>
                        </div>
                    </a>
                @empty
                    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-4 text-gray-400">Nog geen orders. Start met bestellen!</div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
