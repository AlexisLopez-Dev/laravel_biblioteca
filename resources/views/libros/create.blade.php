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

        <select name="genero" class="font-medium border-2 border-black mb-4 p-2 rounded-2xl">
            <option value="" disabled selected>-- Elige el género --</option>
            <option value="ciencia_ficcion">Ciencia Ficción</option>
            <option value="fantasia">Fantasía</option>
            <option value="ensayo">Ensayo</option>
            <option value="biografia">Biografía</option>
            <option value="historia">Historia</option>
            <option value="terror">Terror</option>
            <option value="misterio">Misterio</option>
            <option value="drama">Drama</option>
            <option value="romance">Romance</option>
            <option value="poesia">Poesía</option>
        </select> <br>

        <input type="number" placeholder="Año de publicación" name="anyo_publicacion"><br>

        <input type="text" placeholder="Formato (físico, ebook, pdf...)" name="formato"><br>

        <select name="formato" class="font-medium border-2 border-black mb-4 p-2 rounded-2xl">
            <option value="" disabled selected>-- Elige el formato --</option>
            <option value="fisico">Físico</option>
            <option value="ebook">Ebook</option>
            <option value="pdf">PDF</option>
        </select> <br>

        <select name="estado_lectura" class="border-2 border-black mb-4 p-2 rounded-lg">
            <option value="" disabled selected>-- Elige el estado --</option>
            <option value="pendiente">Pendiente</option>
            <option value="leyendo">Leyendo</option>
            <option value="leido">Leído</option>
            <option value="abandonado">Abandonado</option>
        </select> <br>

        <input type="number" placeholder="Puntuación (1-10)" name="puntuacion" min="1" max="10"><br>

        Favorito <input type="checkbox" name="favorito"><br>

        <input type="text" placeholder="Opinión (opcional)" name="opinion"><br>

        <input type="text" placeholder="Prestado a... (opcional)" name="prestado_a"><br>

        Fecha del prestamo (opcional) <input type="date" placeholder="Título" name="fecha_prestamo"><br>

        <button type="submit" class="font-black border-2 border-black my-4 p-2 rounded-2xl">Añadir</button>
    </form>
    <a href="{{route('libros.index')}}" class="font-black border-2 border-black p-2 rounded-2xl ">Volver al inicio</a>

@endsection
