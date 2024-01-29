@extends('layouts.master')

@section('content')

    @if (Auth::check())
        <div class="row">

            <div class="col-sm-4">
                <img src="{{ $video['video'] }}" alt="" style="height:70vh" class="border border-gray-300">
            </div>

            <div class="col-sm-8">
                <h2>{{ $video['nombre'] }}</h2>
                <h2>{{ $video['fecha'] }}</h2>

            </div>

            @if (Auth::user()->role == 'admin')
                <a href="{{ url('/edit/' . $video->id) }}"> </a>
                <a href="{{ url('/delete/' . $video->id) }}"> </a>
            @endif
    @endif

    <a href="{{ route('welcome') }}"type="buttom"
        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-gray-100 text-gray-800 hover:bg-gray-200 text-gray-900 border-gray-900 hover:bg-gray-900 hover:text-white bg-white hover:bg-gray-900 mt-4">Volver
        a la pagina principal</a>

    </div>
@endsection
