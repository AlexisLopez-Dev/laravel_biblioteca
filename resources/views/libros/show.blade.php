@extends('layout')

@section('content')
    <h1 class="text-4xl font-black mb-4">Detalle del libro</h1>

    <div class="border-2 border-black p-6 rounded-2xl bg-white">

        <div class="mb-6">
            <img src="{{$libro->portada}}" alt="Portada de {{$libro->titulo}}" class="w-64 border-2 border-black rounded-lg shadow-lg">
        </div>

        <div class="space-y-2 text-lg">
            <p><strong>Título:</strong> {{$libro->titulo}}</p>
            <p><strong>Autor:</strong> {{$libro->autor}}</p>
            <p><strong>Género:</strong> {{$libro->genero}}</p>
            <p><strong>Año:</strong> {{$libro->anyo_publicacion}}</p>
            <p><strong>Formato:</strong> {{$libro->formato}}</p>
            <p><strong>Estado:</strong> {{$libro->estado_lectura}}</p>
            <p><strong>Puntuación:</strong> {{$libro->puntuacion}} / 10</p>

            <p><strong>Favorito:</strong> {{ $libro->favorito ? 'Sí ❤️' : 'No' }}</p>
        </div>

        @if($libro->opinion)
            <div class="mt-6 border-t-2 border-black pt-4">
                <h3 class="font-black text-xl mb-2">Mi Opinión:</h3>
                <p class="italic">"{{$libro->opinion}}"</p>
            </div>
        @endif

        @if($libro->prestado_a)
            <div class="mt-6 bg-red-100 border-2 border-red-500 p-4 rounded-xl">
                <p class="font-bold text-red-700">⚠️ Este libro está prestado</p>
                <p><strong>Persona:</strong> {{$libro->prestado_a}}</p>
                <p><strong>Desde el:</strong> {{$libro->fecha_prestamo}}</p>
            </div>
        @endif

    </div>

    <div class="mt-6">
        <a href="{{route('libros.index')}}" class="font-black border-2 border-black p-3 rounded-2xl inline-block mr-4 hover:bg-gray-100">⬅ Volver al listado</a>
        <a href="{{route('libros.edit', $libro->id)}}" class="font-black border-2 border-black p-3 rounded-2xl inline-block bg-yellow-200 hover:bg-yellow-300">✏️ Editar libro</a>
    </div>

@endsection
