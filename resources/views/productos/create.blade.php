@extends('layouts.master')
@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="sm:w-full md:w-1/2 lg:w-1/3">
            <div class="card">
                <div class="text-center text-4xl font-bold mb-7">
                    Añadir nuevo producto
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
                <div class="flex-auto p-6 mx-auto">

                    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="nombre">Nombre: </label>
                            <input type="text" name="nombre" id="nombre"
                                class="appearance-none block bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                value="{{ old('nombre') }}" style=" border: 1px solid black"required>
                        </div>

                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="precio">Precio: </label>
                            <input type="text" name="precio" id="precio"
                                class="appearance-none block bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                value="{{ old('precio') }}" style=" border: 1px solid black"required>
                        </div>

                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="url">Enlace: </label>
                            <input type="text" name="url" id="url"
                                class="appearance-none block bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                value="{{ old('url') }}" style=" border: 1px solid black" required>
                        </div>

                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="imagen">Imagen:</label>
                            <input type="file" name="imagen" id="imagen"
                                class="appearance-none block bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                accept="image/jpeg, image/jpg, image/png, image/gif" class="form-control-file">
                        </div>

                        <button type="submit"
                            class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-1 px-2 border-b-2 border-yellow-700 hover:border-yellow-500 rounded mr-2">
                            Guardar producto
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
