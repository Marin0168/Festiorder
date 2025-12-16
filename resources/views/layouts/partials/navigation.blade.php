@php($user = auth()->user())
<header class="bg-gray-900/80 border-b border-gray-800 backdrop-blur">
    <div class="max-w-5xl mx-auto px-4 py-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <x-application-logo class="h-10 w-10 fill-current text-orange-500" />
            <div>
                <p class="text-xs uppercase tracking-wide text-purple-300">Festival Orders</p>
                <p class="font-semibold">Welkom, {{ $user?->name }}</p>
            </div>
        </div>
        <div class="flex items-center gap-3 text-sm">
            <a href="{{ route('profile') }}" class="text-purple-300 hover:text-purple-200" wire:navigate>Profiel</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-3 py-1.5 rounded-full bg-orange-500 text-white text-sm font-semibold hover:bg-orange-600 transition">Logout</button>
            </form>
        </div>
    </div>
</header>

<nav class="fixed bottom-0 inset-x-0 bg-gray-900/90 backdrop-blur border-t border-gray-800">
    <div class="max-w-5xl mx-auto px-4 py-3 grid grid-cols-5 text-center text-sm font-semibold text-gray-300">
        <a href="{{ route('dashboard') }}" class="flex flex-col items-center gap-1 {{ request()->routeIs('dashboard') ? 'text-orange-400' : 'hover:text-white' }}" wire:navigate>
            <span class="text-lg">🏠</span>
            <span>Home</span>
        </a>
        <a href="{{ route('foodtrucks.index') }}" class="flex flex-col items-center gap-1 {{ request()->routeIs('foodtrucks.*') ? 'text-orange-400' : 'hover:text-white' }}" wire:navigate>
            <span class="text-lg">🚚</span>
            <span>Foodtrucks</span>
        </a>
        <a href="{{ route('orders.index') }}" class="flex flex-col items-center gap-1 {{ request()->routeIs('orders.*') ? 'text-orange-400' : 'hover:text-white' }}" wire:navigate>
            <span class="text-lg">🧾</span>
            <span>Orders</span>
        </a>
        <a href="{{ route('map') }}" class="flex flex-col items-center gap-1 {{ request()->routeIs('map') ? 'text-orange-400' : 'hover:text-white' }}" wire:navigate>
            <span class="text-lg">🗺️</span>
            <span>Map</span>
        </a>
        <a href="{{ route('lineup') }}" class="flex flex-col items-center gap-1 {{ request()->routeIs('lineup') || request()->routeIs('stages.*') ? 'text-orange-400' : 'hover:text-white' }}" wire:navigate>
            <span class="text-lg">🎵</span>
            <span>Line-up</span>
        </a>
    </div>
</nav>
