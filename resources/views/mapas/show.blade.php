@extends('layouts.master')

@section('content')
    <div class="container">
        @if (isset($ciudadSeleccionada) && $enlaceWhatsapp !== "Error al determinar la ciudad. Por favor, inténtalo de nuevo más tarde.")
            <h1>Información de {{ $ciudades[$ciudadSeleccionada] }}</h1>
            <h2>Enlace de WhatsApp para {{ $ciudades[$ciudadSeleccionada] }}</h2>
            <a href="{{ $enlaceWhatsapp }}" target="_blank">{{ $enlaceWhatsapp }}</a>
        @else
            <h1>Información de Ciudad Desconocida</h1>
            <p>No se ha podido determinar una ciudad cercana a estas coordenadas.</p>
        @endif
    </div>
@endsection
