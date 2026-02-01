@extends('layout')
@section('content')
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-3xl shadow-lg border border-gray-100">
        <h1 class="text-3xl font-black text-gray-800 mb-6">✏️ Editar libro</h1>

        @if(session('mensaje'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">
                {{session('mensaje')}}
            </div>
        @endif

        <form action="{{route('libros.update', $libro->id)}}" method="post" class="space-y-6">
            @csrf
            @method('put')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="col-span-2">
                    <label class="block font-bold text-gray-700 mb-1">Título</label>
                    <input type="text" name="titulo" value="{{$libro->titulo}}" class="w-full border-2 border-gray-200 p-3 rounded-xl focus:border-black outline-none">
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block font-bold text-gray-700 mb-1">Autor</label>
                    <input type="text" name="autor" value="{{$libro->autor}}" class="w-full border-2 border-gray-200 p-3 rounded-xl focus:border-black outline-none">
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block font-bold text-gray-700 mb-1">Año</label>
                    <input type="number" name="anyo_publicacion" value="{{$libro->anyo_publicacion}}" class="w-full border-2 border-gray-200 p-3 rounded-xl focus:border-black outline-none">
                </div>

                <div class="col-span-2">
                    <label class="block font-bold text-gray-700 mb-1">Portada URL</label>
                    <input type="text" name="portada" value="{{$libro->portada}}" class="w-full border-2 border-gray-200 p-3 rounded-xl focus:border-black outline-none">
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-1">Género</label>
                    <select name="genero" class="w-full border-2 border-gray-200 p-3 rounded-xl focus:border-black outline-none bg-white">
                        <option value="" disabled>-- Elige --</option>
                        <option value="ciencia_ficcion" {{ $libro->genero == 'ciencia_ficcion' ? 'selected' : '' }}>Ciencia Ficción</option>
                        <option value="fantasia" {{ $libro->genero == 'fantasia' ? 'selected' : '' }}>Fantasía</option>
                        <option value="ensayo" {{ $libro->genero == 'ensayo' ? 'selected' : '' }}>Ensayo</option>
                        <option value="biografia" {{ $libro->genero == 'biografia' ? 'selected' : '' }}>Biografía</option>
                        <option value="historia" {{ $libro->genero == 'historia' ? 'selected' : '' }}>Historia</option>
                        <option value="terror" {{ $libro->genero == 'terror' ? 'selected' : '' }}>Terror</option>
                        <option value="misterio" {{ $libro->genero == 'misterio' ? 'selected' : '' }}>Misterio</option>
                        <option value="drama" {{ $libro->genero == 'drama' ? 'selected' : '' }}>Drama</option>
                        <option value="romance" {{ $libro->genero == 'romance' ? 'selected' : '' }}>Romance</option>
                        <option value="poesia" {{ $libro->genero == 'poesia' ? 'selected' : '' }}>Poesía</option>
                    </select>
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-1">Formato</label>
                    <select name="formato" class="w-full border-2 border-gray-200 p-3 rounded-xl focus:border-black outline-none bg-white">
                        <option value="" disabled>-- Elige --</option>
                        <option value="fisico" {{ $libro->formato == 'fisico' ? 'selected' : '' }}>Físico</option>
                        <option value="ebook" {{ $libro->formato == 'ebook' ? 'selected' : '' }}>Ebook</option>
                        <option value="pdf" {{ $libro->formato == 'pdf' ? 'selected' : '' }}>PDF</option>
                    </select>
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-1">Estado</label>
                    <select name="estado_lectura" class="w-full border-2 border-gray-200 p-3 rounded-xl focus:border-black outline-none bg-white">
                        <option value="" disabled>-- Elige --</option>
                        <option value="pendiente" {{ $libro->estado_lectura == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="leyendo" {{ $libro->estado_lectura == 'leyendo' ? 'selected' : '' }}>Leyendo</option>
                        <option value="leido" {{ $libro->estado_lectura == 'leido' ? 'selected' : '' }}>Leído</option>
                        <option value="abandonado" {{ $libro->estado_lectura == 'abandonado' ? 'selected' : '' }}>Abandonado</option>
                    </select>
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-1">Puntuación</label>
                    <input type="number" name="puntuacion" value="{{$libro->puntuacion}}" class="w-full border-2 border-gray-200 p-3 rounded-xl focus:border-black outline-none">
                </div>
            </div>

            <div class="border-t border-gray-100 pt-6 mt-6">
                <div class="mb-4">
                    <label class="flex items-center gap-2 cursor-pointer p-3 border border-gray-200 rounded-xl hover:bg-gray-50">
                        <input type="checkbox" name="favorito" class="w-5 h-5 accent-red-500" @checked($libro->favorito)>
                        <span class="font-bold text-gray-700">Favorito ❤️</span>
                    </label>
                </div>

                <div class="mb-4">
                    <label class="block font-bold text-gray-700 mb-1">Opinión</label>
                    <textarea name="opinion" rows="3" class="w-full border-2 border-gray-200 p-3 rounded-xl focus:border-black outline-none">{{$libro->opinion}}</textarea>
                </div>

                <div class="bg-yellow-50 p-4 rounded-xl border border-yellow-200">
                    <p class="font-bold text-yellow-800 mb-2 text-sm uppercase">Préstamos</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" name="prestado_a" value="{{$libro->prestado_a}}" placeholder="Prestado a..." class="w-full border border-yellow-300 p-2 rounded-lg bg-white">
                        <input type="date" name="fecha_prestamo" value="{{$libro->fecha_prestamo}}" class="w-full border border-yellow-300 p-2 rounded-lg bg-white">
                    </div>
                </div>
            </div>

            <div class="flex gap-4 mt-8">
                <button type="submit" class="flex-1 bg-black text-white font-bold py-4 rounded-xl hover:bg-gray-800 transition shadow-lg">Actualizar Cambios</button>
                <a href="{{route('libros.index')}}" class="px-6 py-4 border-2 border-gray-200 font-bold rounded-xl text-gray-600 hover:bg-gray-100 transition">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
