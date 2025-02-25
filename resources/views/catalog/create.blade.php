<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="create">
                        @csrf

                        <!-- Titulo -->
                        <div>
                            <x-input-label for="title" :value="__('Titulo')" />
                            <x-text-input id="title" class="block w-full mt-1" type="text" name="title"
                                :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Año -->
                        <div class="mt-4">
                            <x-input-label for="year" :value="__('Año')" />
                            <x-text-input id="year" class="block w-full mt-1" type="text" name="year"
                                :value="old('year')" required autocomplete="year" />
                            <x-input-error :messages="$errors->get('year')" class="mt-2" />
                        </div>

                        <!-- Director -->
                        <div class="mt-4">
                            <x-input-label for="director" :value="__('Director')" />
                            <x-text-input id="director" class="block w-full mt-1" type="text" name="director"
                                :value="old('director')" required autocomplete="director" />
                            <x-input-error :messages="$errors->get('year')" class="mt-2" />
                        </div>

                        <!-- Poster -->
                        <div class="mt-4">
                            <x-input-label for="poster" :value="__('Poster')" />
                            <x-text-input id="poster" class="block w-full mt-1" type="text" name="poster"
                                :value="old('poster')" required autocomplete="poster" />
                            <x-input-error :messages="$errors->get('year')" class="mt-2" />
                        </div>

                        <!-- Resumen -->
                        <div class="mt-4">
                            <label for="synopsis">Synopsis</label>
                            <textarea name="synopsis" id="synopsis">

                            </textarea>
                        </div>




                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Añadir Película') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
