<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Produits
                </h2>
                <div>
                    <x-primary-button
                        x-data
                        x-on:click.prevent="$dispatch('open-modal', 'product-creation')"
                    >Ajouter</x-primary-button>

                    <x-modal name="product-creation" max-width="md" :show="$errors->productCreation->isNotEmpty() || session('status') == 'product-created'" focusable>
                        <form method="post" action="{{ route('products.store') }}" class="p-6">
                            @csrf
                
                            <h2 class="text-lg font-medium text-gray-900">
                                Nouveau produit
                            </h2>
                
                            <div class="mt-6 space-y-4">
                                <div>
                                    <x-input-label for="name" value="Nom du produit" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->productCreation->get('name')" />
                                </div>

                                <div>
                                    <x-input-label for="default_price" value="Prix par défaut" />
                                    <x-text-input id="default_price" name="default_price" type="number" class="mt-1 block w-full" :value="old('default_price', 0)" />
                                    <x-input-error class="mt-2" :messages="$errors->productCreation->get('default_price')" />
                                </div>

                                <div>
                                    <x-input-label for="shelf" value="Rayon" />
                                    <x-select-input id="shelf" name="shelf" class="mt-1 block w-full" required>
                                        @foreach (App\Enums\Shelf::cases() as $shelf)
                                            <option value="{{ $shelf->value }}" @selected($shelf->value == old('shelf'))>{{ $shelf->getLong() }}</option>
                                        @endforeach
                                    </x-select-input>
                                    <x-input-error class="mt-2" :messages="$errors->productCreation->get('shelf')" />
                                </div>

                                <div>
                                    <x-input-label for="launched_at" value="Date du lancement" />
                                    <x-text-input id="launched_at" name="launched_at" type="date" class="mt-1 block w-full" :value="old('launched_at', now()->format('Y-m-d'))" required />
                                    <x-input-error class="mt-2" :messages="$errors->productCreation->get('launched_at')" />
                                </div>
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
</x-app-layout>
