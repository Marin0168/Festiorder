<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 py-8 space-y-4">
        <h1 class="text-2xl font-bold">Stage: {{ ucfirst($stage) }}</h1>
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6 text-center text-gray-300">
            <p class="text-lg">🎤 Coming soon</p>
            <p class="text-sm text-gray-400 mt-2">Info voor stage {{ $stage }} wordt later toegevoegd.</p>
        </div>
    </div>
</x-app-layout>
