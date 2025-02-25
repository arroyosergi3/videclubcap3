@props(['id'])
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
                    <div class="grid grid-rows-1">
                        @if (isset($_SESSION['msg']))

                            @if ($_SESSION['msg'] == '1')
                                <p>Pelicula alquilada correctamente</p>
                            @else
                                <p>Pelicula devuelta correctamente</p>
                            @endif


                        @endif
                        <div class="grid grid-cols-2">
                            <div>
                                <img src="{{ $pelicula->poster }}" style="height: 200px">
                            </div>
                            <div>
                                <h1 class="text-lg font-bold">{{ $pelicula->title }}</h1>
                                <h2>Año: {{ $pelicula->year }} Director: {{ $pelicula->director }}</h2>
                                <p><b>Resumen:</b> {{ $pelicula->synopsis }}</p>
                                <p><b>Estado:</b>
                                    @if ($pelicula->rented)
                                        Pelicula actualmente alquilada
                                    @else
                                        Pelicula disponible
                                    @endif
                                </p>
                                @if ($pelicula->rented)
                                    <form action="{{ route('return', ['id' => $pelicula->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Devolver</button>
                                    </form>
                                @else
                                    <form action="{{ route('rent', ['id' => $pelicula->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit "
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Alguilar
                                            Película</button>
                                    </form>
                                @endif
                                <button type="button"
                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                    onclick="window.location.href='{{ route('edit', ['id' => $pelicula->id]) }}';">Editar
                                    Pelicula</button>
                                <button type="button"
                                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                    onclick="window.location.href='{{ route('index') }}';">Volver
                                    al listado</button>
                                <button type="button"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar
                                    Pelicula</button>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
