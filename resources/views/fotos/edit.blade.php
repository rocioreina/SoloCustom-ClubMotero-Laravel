@extends('layouts.master')

@section('content')

    <div class="flex justify-center items-center min-h-screen">

        <div class="w-full sm:w-11/12 md:w-3/4 lg:w-2/3 xl:w-1/2">
            <div class="card">
                <div class="text-center text-2xl md:text-4xl font-bold mb-4 md:mb-7">
                    <h3>Editar Fotos</h3>
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
                <div class="p-4 md:p-6">
                    <form action="{{ route('fotos.putEdit', ['id' => $foto->id]) }}" method="POST"
                        class="max-w-sm md:max-w-md lg:max-w-lg mx-auto" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="nombre">Nombre de la Foto:</label>
                            <input type="text" name="nombre" id="nombre"
                                class="appearance-none block bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                value="{{ old('nombre', $foto->nombre) }}" style="border: 1px solid black">
                        </div>

                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="fecha">Fecha de la Foto:</label>
                            <input type="date" name="fecha" id="fecha"
                                class="appearance-none block bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                value="{{ old('fecha', $foto->fecha) }}" style="border: 1px solid black">
                        </div>

                        <div class="form-group">
                            <label for="imagen"
                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Imagen
                                actual:</label>
                            <img id="imagen-preview" src="{{ asset('storage/' . $foto->imagen) }}" alt="{{ $foto->nombre }}"
                                class="w-full max-w-md mx-auto mb-4 md:max-w-2xl lg:max-w-3xl xl:max-w-4xl">
                        </div>

                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-2"
                                for="imagen">Cargar nueva imagen (opcional):</label>
                            <input type="file" name="imagen" id="imagen-input"
                                class="appearance-none block bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                accept="image/jpeg, image/jpg, image/png, image/gif">
                        </div>
                        {{-- script cambiar img --}}
                        <script>
                            document.getElementById('imagen-input').addEventListener('change', function(e) {
                                const file = e.target.files[0];
                                if (file) {
                                    const imageUrl = URL.createObjectURL(file);
                                    document.getElementById('imagen-preview').src = imageUrl;
                                }
                            });
                        </script>

                        <div class="form-group text-center mt-4">
                            <button type="submit"
                                class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 md:py-1 md:px-2 lg:py-2 lg:px-4 border-b-2 border-yellow-700 hover:border-yellow-500 rounded">
                                Editar Foto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
