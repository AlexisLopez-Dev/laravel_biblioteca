@extends('layout')
@section('content')
    <h1 class="text-4xl font-black mb-4">Mi biblioteca</h1>

    <form action="{{route('libros.index')}}" method="get">
        <input type="text" name="busqueda" placeholder="Buscar por título o autor..." class="font-medium border-2 border-black mb-4 p-2 rounded-2xl ">

        <select name="estado" class="font-medium border-2 border-black mb-4 p-2 rounded-2xl">
            <option value="todos">Todos los estados</option>
            <option value="pendiente">Pendiente</option>
            <option value="leyendo">Leyendo</option>
            <option value="leido">Leído</option>
            <option value="abandonado">Abandonado</option>
        </select>

        <select name="formato" class="font-medium border-2 border-black mb-4 p-2 rounded-2xl">
            <option value="todos">Todos los formatos</option>
            <option value="fisico">Físico</option>
            <option value="ebook">Ebook</option>
            <option value="pdf">PDF</option>
        </select>

        <select name="genero" class="font-medium border-2 border-black mb-4 p-2 rounded-2xl">
            <option value="todos">Todos los géneros</option>
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
        </select>

        <div class="mb-4 inline-block ml-4">
            <label class="font-bold cursor-pointer">
                <input type="checkbox"
                       name="favorito"
                       value="1"
                        {{ request('favorito') ? 'checked' : '' }}
                >
                Favoritos ❤️
            </label>
        </div>

        <button type="submit" class="font-black border-2 border-black mb-4 p-2 rounded-2xl inline-block">Buscar</button>
        <a href="{{route('libros.index')}}" class="font-black border-2 border-black mb-4 p-2 rounded-2xl inline-block">Limpiar filtros</a>
    </form>

    <a href="{{route('libros.create')}}" class="font-black border-2 border-black mb-4 p-2 rounded-2xl inline-block">Añadir libro</a>

    @foreach($libros as $libro)
        <div class="bg-amber-200 border-2 border-black p-2 rounded-2xl">
            <h2><strong>Título:</strong> {{$libro->titulo}}</h2>
            <p><strong>Autor:</strong> {{$libro->autor}}</p>
            <p><strong>Portada:</strong> {{$libro->portada}}</p>

            <form action="{{route('libros.destroy', $libro->id)}}" method="post">
                @csrf @method('delete')
                <button type="submit">❌</button>
            </form>

            <form action="{{route('libros.edit', $libro->id)}}" method="get">
                <button type="submit">✏️</button>
            </form>

        </div>
    @endforeach
@endsection
