<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="flex justify-between items-center p-6 text-gray-900">
                    <div>
                        <h2 class="text-lg font-medium capitalize text-gray-900">Produits</h2>
                    </div>

                    <div>
                        <x-primary-button
                            x-data
                            x-on:click.prevent="$dispatch('open-modal', 'creating-product')"
                        >
                            Nouveau produit
                        </x-primary-button>

                        <x-modal name="creating-product" max-width="md" :show="$errors->productCreation->isNotEmpty() && session('status') == 'product-created'" focusable>
                            <form method="post" action="{{ route('products.store') }}" class="p-6">
                                @csrf
                    
                                <h2 class="text-lg font-medium text-gray-900">
                                    Nouveau produit
                                </h2>
                    
                                <div class="mt-6">
                                    <x-input-label for="name" value="Nom du produit" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->productCreation->get('name')" />
                                </div>
                    
                                <div class="mt-6">
                                    <x-input-label for="default_price" value="Prix par defaut" />
                                    <x-text-input id="default_price" name="default_price" type="number" class="mt-1 block w-full" :value="old('default_price', 0)" required />
                                    <x-input-error class="mt-2" :messages="$errors->productCreation->get('default_price')" />
                                </div>
                    
                                <div class="mt-6">
                                    <x-input-label for="shelf" value="Rayon" />
                                    <x-select-input id="shelf" name="shelf" class="mt-1 block w-full">
                                        @foreach ($shelves as $shelf)
                                            <option value="{{ $shelf->value }}" @selected($shelf->value == old('shelf'))>{{ $shelf->getFullname() }}</option>
                                        @endforeach
                                    </x-select-input>
                                    <x-input-error class="mt-2" :messages="$errors->productCreation->get('shelf')" />
                                </div>
                    
                                <div class="mt-6">
                                    <x-input-label for="started_at" value="Ce produit demarre le" />
                                    <x-text-input id="started_at" name="started_at" type="date" class="mt-1 block w-full" :value="old('started_at', now()->format('Y-m-d'))" required />
                                    <x-input-error class="mt-2" :messages="$errors->productCreation->get('started_at')" />
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
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg divide-y">
                @foreach ($products as $product)
                    <div class="flex flex-col p-4">
                        <div class="text-sm text-gray-600">{{ $product->shelf->getFullname() }}</div>
                        <div class="font-medium">{{ $product->name }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
