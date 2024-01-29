@extends('layouts.master')

@section('content')
    <div class="container mx-auto mt-4">
        <!-- Utiliza 'mx-auto' para centrar el contenido horizontalmente y 'mt-4' para agregar un margen superior -->
        <div class="lg:w-1/2 xl:w-1/3 mx-auto">
            <!-- Utiliza clases de ancho para dispositivos grandes y extra grandes y 'mx-auto' para centrar -->
            <div class="card p-6"> <!-- Añade un padding alrededor del formulario -->
                <div>
                    <h3 class="text-center text-4xl font-bold mb-7">Editar Videos</h3>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="flex-auto p-6">
                    <form action="{{ route('videos.putEdit', ['id' => $video->id]) }}" method="POST" class="max-w-sm mx-auto"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label
                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"for="nombre">Nombre
                                del Video:</label>
                            <input type="text" name="nombre" id="nombre"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                value="{{ $video->nombre }}">
                        </div>

                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="descripcion">Descripción:</label>
                            <textarea name="descripcion" id="descripcion"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                value="{{ old('descripcion') }}" style="border: 1px solid black">
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="fecha">Fecha:</label>
                            <input type="date" name="fecha" id="fecha"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                value="{{ $video->fecha }}">
                        </div>

                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="video_actual">Video Actual:</label>
                            <video id="video_actual" width="320" height="240" controls>
                                <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>

                        <div class="form-group">
                            <label
                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-2"for="video">Cargar
                                nuevo video (opcional):</label>
                            <input type="file" name="video" id="video"
                                accept="video/mp4,video/mov,video/avi,video/flv"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit"
                                class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-1 px-2 border-b-2 border-yellow-700 hover:border-yellow-500 rounded mr-2 ">Editar
                                Video</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

    {{-- script cambiar video --}}
    <script>
        document.getElementById('video').addEventListener('change', function(e) {
            const video_actual = document.getElementById('video_actual');
            video_actual.src = URL.createObjectURL(e.target.files[0]);

        });
    </script>
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
