<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Activité : {{ Str::ucfirst($activity->date->translatedFormat('l d F Y')) }} - ({{ $activity->shelf->getFullname() }})
        </h2>
    </x-slot>

    <x-activity-navigation />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <dl>
                    <div class="grid grid-cols-[12rem_1fr] gap-4 px-4 py-2 border-b bg-slate-600 text-white">
                        <div class="text-sm font-medium tracking-wide">Title</div>
                        <div class="text-sm font-medium tracking-wide">Valeur</div>
                    </div>
                    <div class="">
                        <div class="divide-y">
                            <div class="grid grid-cols-[12rem_1fr] gap-4 p-4 hover:bg-slate-400">
                                <dt class="text-sm font-semibold">Date de l'activité</dt>
                                <dd class="font-medium text-gra-900 ">{{ Str::ucfirst($activity->date->translatedFormat('l d F Y')) }}</dd>
                            </div>

                            <div class="grid grid-cols-[12rem_1fr] gap-4 p-4 hover:bg-slate-400">
                                <dt class="text-sm font-semibold">Rayon</dt>
                                <dd class="font-medium text-gra-900 ">{{ Str::ucfirst($activity->shelf->getFullname()) }}</dd>
                            </div>

                            <div class="grid grid-cols-[12rem_1fr] gap-4 p-4 hover:bg-slate-400">
                                <dt class="text-sm font-semibold">Créer le</dt>
                                <dd class="font-medium text-gra-900 ">{{ Str::ucfirst($activity->created_at->translatedFormat('l d F Y')) }}</dd>
                            </div>
                            
                            <div class="grid grid-cols-[12rem_1fr] gap-4 p-4 hover:bg-slate-400">
                                <dt class="text-sm font-semibold">Dernière modification</dt>
                                <dd class="font-medium text-gra-900 ">{{ Str::ucfirst($activity->updated_at->translatedFormat('l d F Y')) }} <span class="ml-4">({{ Str::ucfirst($activity->updated_at->diffForHumans()) }})</span></dd>
                            </div>
                        </div>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
