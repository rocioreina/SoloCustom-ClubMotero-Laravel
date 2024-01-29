@extends('layouts.master')
@section('content')

    <div class="flex justify-center items-center h-screen"> <!-- Centrar en el medio -->

        <div class="sm:w-full md:w-1/2 lg:w-1/3"> <!-- Hacerlo responsive -->
            <div class="card">
                <div class="text-center text-4xl font-bold mb-7">
                    Añadir nueva foto
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
                <div class="flex-auto p-6 mx-auto"> <!-- Alineación del formulario -->

                    <form action="{{ route('fotos.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-nombre">
                                Nombre
                            </label>
                            <input type="text" name="nombre" id="nombre"
                                class="appearance-none block bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                value="{{ old('nombre') }}" style="border: 1px solid black">
                        </div>

                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="fecha">Fecha:
                            </label>
                            <input type="date" name="fecha" id="fecha"
                                class="appearance-none block bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                value="{{ old('fecha') }}" style="border: 1px solid black">
                        </div>

                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="imagen">Cargar Foto:</label>
                            <input type="file" name="imagen" id="imagen"
                                class="appearance-none block bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                accept="image/jpeg, image/jpg, image/png, image/gif" class="form-control-file">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit"
                                class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-1 px-2 border-b-2 border-yellow-700 hover:border-yellow-500 rounded mr-2">
                                Añadir Foto
                            </button>
                        </div>

                        {{-- TODO: Cerrar formulario --}}
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
