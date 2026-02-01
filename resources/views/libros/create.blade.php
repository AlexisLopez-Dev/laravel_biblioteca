@extends('layout')
@section('content')
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-3xl shadow-lg border border-gray-100">
        <h1 class="text-3xl font-black text-gray-800 mb-6">✨ Añadir nuevo libro</h1>

        @if(session('mensaje'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p class="font-bold">¡Éxito!</p>
                <p>{{session('mensaje')}}</p>
            </div>
        @endif

        <form action="{{route('libros.store')}}" method="post" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="col-span-2">
                    <label class="block font-bold text-gray-700 mb-1">Título</label>
                    <input type="text" placeholder="Ej: El Señor de los Anillos" name="titulo" class="w-full border-2 border-gray-200 p-3 rounded-xl focus:border-black outline-none transition">
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block font-bold text-gray-700 mb-1">Autor</label>
                    <input type="text" placeholder="Ej: J.R.R. Tolkien" name="autor" class="w-full border-2 border-gray-200 p-3 rounded-xl focus:border-black outline-none transition">
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label class="block font-bold text-gray-700 mb-1">Año</label>
                    <input type="number" placeholder="Ej: 1954" name="anyo_publicacion" class="w-full border-2 border-gray-200 p-3 rounded-xl focus:border-black outline-none transition">
                </div>

                <div class="col-span-2">
                    <label class="block font-bold text-gray-700 mb-1">URL Portada</label>
                    <input type="text" placeholder="https://..." name="portada" class="w-full border-2 border-gray-200 p-3 rounded-xl focus:border-black outline-none transition">
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-1">Género</label>
                    <select name="genero" class="w-full border-2 border-gray-200 p-3 rounded-xl focus:border-black outline-none bg-white">
                        <option value="" disabled selected>-- Seleccionar --</option>
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
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-1">Formato</label>
                    <select name="formato" class="w-full border-2 border-gray-200 p-3 rounded-xl focus:border-black outline-none bg-white">
                        <option value="" disabled selected>-- Seleccionar --</option>
                        <option value="fisico">Físico</option>
                        <option value="ebook">Ebook</option>
                        <option value="pdf">PDF</option>
                    </select>
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-1">Estado</label>
                    <select name="estado_lectura" class="w-full border-2 border-gray-200 p-3 rounded-xl focus:border-black outline-none bg-white">
                        <option value="" disabled selected>-- Seleccionar --</option>
                        <option value="pendiente">Pendiente</option>
                        <option value="leyendo">Leyendo</option>
                        <option value="leido">Leído</option>
                        <option value="abandonado">Abandonado</option>
                    </select>
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-1">Puntuación (1-10)</label>
                    <input type="number" name="puntuacion" min="1" max="10" class="w-full border-2 border-gray-200 p-3 rounded-xl focus:border-black outline-none transition">
                </div>
            </div>

            <div class="border-t border-gray-100 pt-6 mt-6">
                <div class="mb-4">
                    <label class="flex items-center gap-2 cursor-pointer p-3 border border-gray-200 rounded-xl hover:bg-gray-50">
                        <input type="checkbox" name="favorito" class="w-5 h-5 accent-red-500">
                        <span class="font-bold text-gray-700">Marcar como Favorito ❤️</span>
                    </label>
                </div>

                <div class="mb-4">
                    <label class="block font-bold text-gray-700 mb-1">Opinión personal</label>
                    <textarea name="opinion" rows="3" class="w-full border-2 border-gray-200 p-3 rounded-xl focus:border-black outline-none transition"></textarea>
                </div>

                <div class="bg-yellow-50 p-4 rounded-xl border border-yellow-200">
                    <p class="font-bold text-yellow-800 mb-2 text-sm uppercase tracking-wide">Zona de Préstamos</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" placeholder="Prestado a..." name="prestado_a" class="w-full border border-yellow-300 p-2 rounded-lg focus:border-yellow-600 outline-none bg-white">
                        <input type="date" name="fecha_prestamo" class="w-full border border-yellow-300 p-2 rounded-lg focus:border-yellow-600 outline-none bg-white">
                    </div>
                </div>
            </div>

            <div class="flex gap-4 mt-8">
                <button type="submit" class="flex-1 bg-black text-white font-bold py-4 rounded-xl hover:bg-gray-800 transition shadow-lg transform hover:-translate-y-1">Guardar Libro</button>
                <a href="{{route('libros.index')}}" class="px-6 py-4 border-2 border-gray-200 font-bold rounded-xl text-gray-600 hover:bg-gray-100 transition">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
