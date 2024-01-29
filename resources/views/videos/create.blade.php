@extends('layouts.master')
@section('content')
    <div class="container mx-auto mt-4">
        <!-- Utiliza 'mx-auto' para centrar el contenido horizontalmente y 'mt-4' para agregar un margen superior -->
        <div class="lg:w-1/2 xl:w-1/3 mx-auto">
            <!-- Utiliza clases de ancho para dispositivos grandes y extra grandes y 'mx-auto' para centrar -->
            <div class="card p-6"> <!-- Añade un padding alrededor del formulario -->
                <div class="text-center text-4xl font-bold mb-7">
                    Añadir nuevo video
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
                    <form action="{{ route('videos.create') }}" method="POST" enctype="multipart/form-data" id="videosForm">
                        @csrf
                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                value="{{ old('nombre') }}" style="border:1px solid black">
                        </div>
                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="nombre">Descripción:</label>
                            <textarea
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                name="descripcion" id="descripcion" value="{{ old('descripcion') }}" style="border: 1px solid black">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="fecha">Fecha:</label>
                            <input type="date" name="fecha" id="fecha"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                value="{{ old('fecha') }}" style="border: 1px solid black">
                        </div>

                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="video">Cargar Video:</label>
                            <input type="file" name="video" id="video" accept="video/*"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit"
                                class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-1 px-2 border-b-2 border-yellow-700 hover:border-yellow-500 rounded mr-2">
                                Añadir video
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
