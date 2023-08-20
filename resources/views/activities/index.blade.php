<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="flex justify-between items-center p-6 text-gray-900">
                    <div>
                        <h2 class="text-lg font-medium capitalize text-gray-900">Activities</h2>
                    </div>

                    <div>
                        <x-primary-button
                            x-data
                            x-on:click.prevent="$dispatch('open-modal', 'creating-activity')"
                        >
                            Nouvelle activité
                        </x-primary-button>

                        <x-modal name="creating-activity" max-width="md" :show="$errors->activityCreation->isNotEmpty()" focusable>
                            <form method="post" action="{{ route('activities.store') }}" class="p-6">
                                @csrf
                    
                                <h2 class="text-lg font-medium text-gray-900">
                                    Nouvelle activité
                                </h2>
                    
                                <div class="mt-6">
                                    <x-input-label for="date" value="Date de l'activité" />
                                    <x-text-input id="date" name="date" type="date" class="mt-1 block w-full" :value="old('date', now()->format('Y-m-d'))" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->activityCreation->get('date')" />
                                </div>
                    
                                <div class="mt-6">
                                    <x-input-label for="shelf" value="Rayon" />
                                    <x-select-input id="shelf" name="shelf" class="mt-1 block w-full">
                                        @foreach ($shelves as $shelf)
                                            <option value="{{ $shelf->value }}" @selected($shelf->value == old('shelf'))>{{ $shelf->getFullname() }}</option>
                                        @endforeach
                                    </x-select-input>
                                    <x-input-error class="mt-2" :messages="$errors->activityCreation->get('shelf')" />
                                </div>
                    
                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        Annuler
                                    </x-secondary-button>
                    
                                    <x-primary-button class="ml-3">
                                        Créer
                                    </x-primary-button>
                                </div>
                            </form>
                        </x-modal>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
