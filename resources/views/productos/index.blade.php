@extends('layouts.master')

@section('content')
    <div class="container ">
        <h1 class="text-center text-4xl font-bold mb-7">Listado de productos</h1>

        @if (session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif
{{-- 
        @role('admin')
            <a href="{{ route('productos.create') }}"
                class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-1 px-2 border-b-2 border-yellow-700 hover:border-yellow-500 rounded mr-2 ">
                Añadir nuevo producto
            </a>
        @endrole --}}


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-5">
            @foreach ($productos as $producto)
                <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img src="{{ asset('storage/public/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
                        class="w-full h-56 object-cover rounded-t-lg">
                    <div class="p-5">
                        <h4 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">{{ $producto->nombre }}</h4>
                        <p class="mb-2 text-sm text-gray-600 dark:text-gray-400">Precio:
                            {{ number_format($producto->precio, 2) }}€</p>
                        <a href="{{ $producto->url }}"
                            class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-1 px-2 border-b-2 border-blue-700 hover:border-blue-500 rounded ">Ver
                            producto</a>
                        @role('admin')
                            <form action="{{ route('productos.delete', $producto->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-400 text-white font-bold py-1 px-2 border-b-2 border-red-700 hover:border-red-500 rounded mt-2"
                                    onclick="return confirm('¿Estás seguro que deseas eliminar este producto?')">Eliminar
                                </button>
                            </form>
                        @endrole
                    </div>
                </div>
            @endforeach
            <section class="mt-4">
                <a href="{{ route('welcome') }}" class="form-group text-center">
                    <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-1 px-2 border-b-2 border-yellow-700 hover:border-yellow-500 rounded mr-2">
                        Volver a la página principal
                    </button>
                </a>
            </section>
        </div>
        {{ $productos->links() }}

    </div>
@endsection
