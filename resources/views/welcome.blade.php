@extends('layouts.master')

@section('content')
    <div class="bg-white">
        <div class="flex items-center justify-center">
            <img src="{{ asset('images/logo2.jpg') }}" alt="logo" width="400">
        </div>

        <div class="text-black items-center justify-center">

            <h1 class="text-3xl font-bold text-center mb-4 underline">Historia</h1>

            <p class="text-xl text-center mb-4">Grupo que nace el 22 de febrero de 2019 ante la
                necesidad de unir a moteros y moteras para disfrutar de la carretera sin prisa y sin ataduras, extendiéndose
                así por toda España.</p>

            </p>
            <p class="text-xl text-center mb-4">
                La diversidad de nuestra comunidad garantiza que encontrarás personas con intereses similares a los tuyos.
                Ya seas un aficionado a la gastronomía local, un amante de la cultura y el arte, o simplemente alguien que
                busca compartir momentos especiales mientras recorre carreteras panorámicas, aquí encontrarás a alguien con
                quien conectar y disfrutar de un viaje inolvidable.
            </p>

            <p class="text-xl text-center mb-4">
                Así que, ¿qué estás esperando? Únete a nosotros y descubre nuevas amistades mientras recorremos juntos los
                caminos de España. ¡Empecemos esta aventura y creemos vínculos que durarán toda la vida!
            </p>

            <p class="text-xl text-center ">
                ¡Bienvenid@ a nuestra comunidad de moter@s!
            </p>

            <h1 class="text-3xl font-bold text-center mt-7 mb-4 underline">Normas</h1>

            <ul class="font-bold text-xl text-center mb-4">
                <li>Respeta la privacidad de los demás.</li>
                <li>No compartir contenido político, sexual o carteles de otros grupos en los que no participamos.</li>
                <li>Hay que comportarse con educación, respeto y compañerismo.</li>
            </ul>
            <h1 class="text-3xl font-bold text-center mb-4 underline">Redes</h1>
            <div class="flex items-center justify-center mt-4 mb-4">

                <a href="https://www.facebook.com/groups/SoloCustomSinPrisas" target="_blank" rel="noopener noreferrer">
                    <img class="h-8 w-8" src="{{ asset('images/facelogo.png') }}" alt="Icono de Facebook">
                </a>

            </div>
        </div>
    </div>
@endsection
