@extends('layouts.master')
@section('content')
    <style>
        body {
            background-color: grey;
        }

        .carousel-item iframe {
            display: block;
            margin: 0 auto;
        }
    </style>
    {{-- clase de la bliblioteca --}}
    <div class="container">
        <form action="{{ route('videos.index') }}"method='GET' class="mb-3">

            <div class="flex justify-center items-center">

                <div class="sm:w-1/2 lg:w-1/3 flex items-center"> <!-- Agregamos la clase 'flex items-center' para alinear los elementos verticalmente -->

                    @if (!request()->has('descripcion'))
                        <input type="text" name="descripcion"
                            class="appearance-none block bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            placeholder="Busca por descripcion" value="{{ request('descripcion') }}">
                        <button type="submit"
                            class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-1 px-2 border-b-2 border-yellow-700 hover:border-yellow-500 rounded ml-2"> <!-- Añadimos la clase 'ml-2' para dar margen a la izquierda -->
                            Buscar
                        </button>
                    @else
                        <a href="{{ route('videos.index') }}"
                            class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-1 px-2 border-b-2 border-yellow-700 hover:border-yellow-500 rounded mt-4 mb-2">
                            Mostrar todos los videos
                        </a>
                    @endif

                </div>

            </div>




            <section>
                @role('admin')
                    <a href="{{ route('videos.create') }}"
                        class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-1 px-2 border-b-2 border-yellow-700 hover:border-yellow-500 rounded mr-2 ">
                        Crear Video
                    </a>
                 @endrole

            </section>

        </form>

        <div class="slick-carousel">
            @foreach ($videos as $video)
                <!-- Video item -->
                <div class="text-center mx-auto mt-2">
                    <!-- Utiliza la clase text-center para centrar horizontalmente y mx-auto para centrar en el eje x -->
                    <div class="carousel-item">
                        <iframe id="video-{{ $video->id }}" width="560" height="315"
                            src="{{ asset('storage/' . $video->video) }}" frameborder="0" allowfullscreen></iframe>
                    </div>

                    <div class="text-center mt-2">
                        <!-- Alinea el contenido a la izquierda y agrega un espacio en la parte superior -->
                        <h4>{{ $video->nombre }}</h4>
                        <p>{{ $video->descripcion }}</p>
                        <h4>{{ $video->fecha }}</h4>
                    </div>

                    <div class="flex justify-center mt-2">
                        @role('admin')
                            <!-- Utiliza la clase flex y justify-center para centrar horizontalmente -->
                            <a href="{{ route('videos.getEdit', ['id' => $video->id]) }}"
                                class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-1 px-2 border-b-2 border-blue-700 hover:border-blue-500 rounded mr-2">Editar
                                video</a>

                            <form action="{{ route('videos.delete', ['id' => $video->id]) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-400 text-white font-bold py-1 px-2 border-b-2 border-red-700 hover:border-red-500 rounded">Eliminar
                                    Video</button>
                            </form>
                         @endrole
                    </div>
                </div>
            @endforeach
        </div>


        <section>
            <a href="{{ route('welcome') }}" class="form-group text-center">
                <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-1 px-2 border-b-2 border-yellow-700 hover:border-yellow-500 rounded mr-2">Volver
                    a la página principal</button>
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
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
@endsection
