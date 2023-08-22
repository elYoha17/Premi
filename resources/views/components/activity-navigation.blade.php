@props([
    'activity',
])

<div class="bg-slate-700">
    <div class="flex justify-center items-center max-w-7xl mx-auto py-1.5 space-x-2">
        <a href="{{ route('activities.show', [$activity]) }}" class="px-2 py-1 text-sm tracking-wide rounded hover:bg-white/25 {{ request()->routeIs('activities.show') ? 'text-white' : 'text-gray-400 hover:text-white' }}">Tableau de bord</a>
        <a href="{{ route('activities.sales.index', [$activity]) }}" class="px-2 py-1 text-sm tracking-wide rounded hover:bg-white/25 {{ request()->routeIs('activities.sales.index') ? 'text-white' : 'text-gray-400 hover:text-white' }}">Vente</a>
    </div>
</div>