<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Activité : {{ Str::ucfirst($activity->date->translatedFormat('l d F Y')) }} - ({{ $activity->shelf->getFullname() }})
        </h2>
    </x-slot>

    <x-activity-navigation :activity="$activity" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
            </div>
        </div>
    </div>
</x-app-layout>
