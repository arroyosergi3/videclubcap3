@props(['id'])
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Listado de películas
                    <div class="grid grid-cols-4">
                        @foreach ($arrayPeliculas as $key => $pelicula)
                            <a href="{{ url('catalog/show/' . $pelicula->id) }}">
                                <img src="{{ $pelicula->poster }}" style="height: 200px">
                                <h4 style="min-height: 45px; margin: 5px 0 10px 0;">{{ $pelicula->title }}</h4>
                            </a>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
