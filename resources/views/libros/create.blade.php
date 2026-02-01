@extends('layout')
@section('content')
    <h1 class="text-4xl font-black mb-4">Añadir libro a la biblioteca</h1>

    @if(session('mensaje'))
        <p>{{session('mensaje')}}</p>
    @endif

    <form action="{{route('libros.store')}}" method="post" >
        @csrf

        <input type="text" placeholder="Título" name="titulo"> <br>
        <input type="text" placeholder="Autor" name="autor"> <br>
        <input type="text" placeholder="Portada" name="portada"><br>
        <input type="text" placeholder="Género" name="genero"><br>
        <input type="number" placeholder="Año de publicación" name="anyo_publicacion"><br>
        <input type="text" placeholder="Formato (físico, ebook, pdf...)" name="formato"><br>
        <input type="text" placeholder="Estado (pendiente, leyendo, leído...)" name="estado_lectura"><br>
        <input type="number" placeholder="Puntuación (1-10)" name="puntuacion"><br>
        Favorito <input type="checkbox" name="favorito"><br>
        <input type="text" placeholder="Opinión (opcional)" name="opinion"><br>
        <input type="text" placeholder="Prestado a... (opcional)" name="prestado_a"><br>
        Fecha del prestamo (opcional) <input type="date" placeholder="Título" name="fecha_prestamo"><br>

        <button type="submit" class="font-black border-2 border-black my-4 p-2 rounded-2xl">Añadir</button>
    </form>
    <a href="{{route('libros.index')}}" class="font-black border-2 border-black p-2 rounded-2xl ">Volver al inicio</a>

@endsection
