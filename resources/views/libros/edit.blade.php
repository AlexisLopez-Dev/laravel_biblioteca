@extends('layout')
@section('content')
    <h1 class="text-4xl font-black mb-4">Editar libro</h1>

    @if(session('mensaje'))
        <p>{{session('mensaje')}}</p>
    @endif

    <form action="{{route('libros.update', $libro->id)}}" method="post" >
        @csrf
        @method('put')

        <input type="text" placeholder="Título" name="titulo" value="{{$libro->titulo}}"> <br>
        <input type="text" placeholder="Autor" name="autor" value="{{$libro->autor}}"> <br>
        <input type="text" placeholder="Portada" name="portada" value="{{$libro->portada}}"><br>
        <input type="text" placeholder="Género" name="genero" value="{{$libro->genero}}"><br>
        <input type="number" placeholder="Año de publicación" name="anyo_publicacion" value="{{$libro->anyo_publicacion}}"><br>
        <input type="text" placeholder="Formato (físico, ebook, pdf...)" name="formato" value="{{$libro->formato}}"><br>
        <input type="text" placeholder="Estado (pendiente, leyendo, leído...)" name="estado_lectura" value="{{$libro->estado_lectura}}"><br>
        <input type="number" placeholder="Puntuación (1-10)" name="puntuacion" value="{{$libro->puntuacion}}"><br>
        Favorito <input type="checkbox" name="favorito" @checked($libro->favorito)><br>
        <input type="text" placeholder="Opinión (opcional)" name="opinion" value="{{$libro->opinion}}"><br>
        <input type="text" placeholder="Prestado a... (opcional)" name="prestado_a" value="{{$libro->prestado_a}}"><br>
        Fecha del prestamo (opcional) <input type="date" placeholder="Título" name="fecha_prestamo" value="{{$libro->fecha_prestamo}}"><br>

        <button type="submit" class="font-black border-2 border-black my-4 p-2 rounded-2xl">Guardar cambios</button>
    </form>
    <a href="{{route('libros.index')}}" class="font-black border-2 border-black p-2 rounded-2xl ">Volver al inicio</a>

@endsection
