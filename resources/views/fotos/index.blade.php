@extends('layouts.master')

@section('content')
    <div class="container">

        <h1 class="text-center text-4xl font-bold mb-7">La fotaza de la semana</h1>

        @if (session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif

        <a href="{{ route('fotos.create') }}"
            class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-1 px-2 border-b-2 border-yellow-700 hover:border-yellow-500 rounded mr-2 ">
            Añadir nueva foto
        </a>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-5">
            @foreach ($fotos as $foto)
                <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="w-full h-48 object-cover rounded-t-lg" src="{{ asset('storage/' . $foto->imagen) }}"
                            alt="{{ $foto->nombre }}" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h4 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">{{ $foto->nombre }}</h4>
                        </a>
                        <p class="mb-2 text-sm text-gray-600 dark:text-gray-400">Fecha: {{ $foto->fecha }}</p>
                        <p class="mb-2 text-sm text-gray-600 dark:text-gray-400">Votos: {{ $foto->votos_count }}</p>

                        @if ($user->hasVotedFor($foto))
                            <form action="{{ route('fotos.eliminarVoto', ['foto' => $foto]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-400 text-white font-bold py-1 px-2 border-b-2 border-red-700 hover:border-red-500 rounded mr-2 mb-2">Eliminar
                                    Voto</button>
                            </form>
                        @else
                            <form action="{{ route('fotos.voto', ['id' => $foto->id]) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-400 text-white font-bold py-1 px-2 border-b-2 border-green-700 hover:border-green-500 rounded mr-2 mb-2">Votar</button>
                            </form>
                        @endif

                        <a class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-1 px-2 border-b-2 border-blue-700 hover:border-blue-500 rounded mr-2 "
                            href="{{ route('fotos.getEdit', ['id' => $foto->id]) }}">
                            Editar foto
                        </a>

                        <form action="{{ route('fotos.delete', ['id' => $foto->id]) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-400 text-white font-bold py-1 px-2 border-b-2 border-red-700 hover:border-red-500 rounded mr-2">
                                Eliminar Foto
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $fotos->links() }}

        <section class="mt-4">
            <a href="{{ route('welcome') }}" class="form-group text-center">
                <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-1 px-2 border-b-2 border-yellow-700 hover:border-yellow-500 rounded mr-2">
                    Volver a la página principal
                </button>
            </a>
        </section>
    </div>

    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: '{{ session('success') }}',
            })
        </script>
    @endif


    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
            })
        </script>
    @endif
@endsection
