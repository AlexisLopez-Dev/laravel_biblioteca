@extends('layout')
@section('content')
    <h1 class="text-4xl font-black mb-4">Mi biblioteca</h1>

    <form action="{{route('libros.index')}}" method="get">
        <input type="text" name="busqueda" placeholder="Buscar por título o autor..." class="font-medium border-2 border-black mb-4 p-2 rounded-2xl ">

        <select name="genero">
            <option value="todos">Todos</option>
            <option value="novela">Novela</option>
            <option value="drama">Drama</option>
            <option value="ensayo">Ensayo</option>
            <option value="misterio">Misterio</option>

        </select>

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
