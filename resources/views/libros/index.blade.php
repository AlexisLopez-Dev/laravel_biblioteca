@extends('layout')
@section('content')
    <div class="max-w-7xl mx-auto">

        <div class="bg-gray-100 p-6 rounded-2xl mb-8 border border-gray-200">
            <form action="{{route('libros.index')}}" method="get" class="flex flex-wrap gap-4 items-end">

                <div class="flex-1 min-w-[200px]">
                    <label class="block font-bold text-gray-700 text-sm mb-1">Búsqueda</label>
                    <input type="text" name="busqueda" value="{{ request('busqueda') }}" placeholder="Título o autor..." class="w-full border-2 border-gray-300 p-2 rounded-lg focus:border-black outline-none">
                </div>

                <div>
                    <label class="block font-bold text-gray-700 text-sm mb-1">Estado</label>
                    <select name="estado" class="border-2 border-gray-300 p-2 rounded-lg focus:border-black outline-none bg-white">
                        <option value="todos">Todos</option>
                        <option value="pendiente" {{ request('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="leyendo" {{ request('estado') == 'leyendo' ? 'selected' : '' }}>Leyendo</option>
                        <option value="leido" {{ request('estado') == 'leido' ? 'selected' : '' }}>Leído</option>
                        <option value="abandonado" {{ request('estado') == 'abandonado' ? 'selected' : '' }}>Abandonado</option>
                    </select>
                </div>

                <div>
                    <label class="block font-bold text-gray-700 text-sm mb-1">Formato</label>
                    <select name="formato" class="border-2 border-gray-300 p-2 rounded-lg focus:border-black outline-none bg-white">
                        <option value="todos">Todos</option>
                        <option value="fisico" {{ request('formato') == 'fisico' ? 'selected' : '' }}>Físico</option>
                        <option value="ebook" {{ request('formato') == 'ebook' ? 'selected' : '' }}>Ebook</option>
                        <option value="pdf" {{ request('formato') == 'pdf' ? 'selected' : '' }}>PDF</option>
                    </select>
                </div>

                <div>
                    <label class="block font-bold text-gray-700 text-sm mb-1">Género</label>
                    <select name="genero" class="border-2 border-gray-300 p-2 rounded-lg focus:border-black outline-none bg-white">
                        <option value="todos">Todos</option>
                        <option value="ciencia_ficcion" {{ request('genero') == 'ciencia_ficcion' ? 'selected' : '' }}>Ciencia Ficción</option>
                        <option value="fantasia" {{ request('genero') == 'fantasia' ? 'selected' : '' }}>Fantasía</option>
                        <option value="ensayo" {{ request('genero') == 'ensayo' ? 'selected' : '' }}>Ensayo</option>
                        <option value="biografia" {{ request('genero') == 'biografia' ? 'selected' : '' }}>Biografía</option>
                        <option value="historia" {{ request('genero') == 'historia' ? 'selected' : '' }}>Historia</option>
                        <option value="terror" {{ request('genero') == 'terror' ? 'selected' : '' }}>Terror</option>
                        <option value="misterio" {{ request('genero') == 'misterio' ? 'selected' : '' }}>Misterio</option>
                        <option value="drama" {{ request('genero') == 'drama' ? 'selected' : '' }}>Drama</option>
                        <option value="romance" {{ request('genero') == 'romance' ? 'selected' : '' }}>Romance</option>
                        <option value="poesia" {{ request('genero') == 'poesia' ? 'selected' : '' }}>Poesía</option>
                    </select>
                </div>

                <div class="pb-3 px-2">
                    <label class="font-bold cursor-pointer flex items-center gap-2 select-none">
                        <input type="checkbox" name="favorito" value="1" {{ request('favorito') ? 'checked' : '' }} class="w-5 h-5 accent-yellow-500">
                        Solo Favoritos ⭐
                    </label>
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-lg font-bold hover:bg-black transition">🔍 Buscar</button>
                    <a href="{{route('libros.index')}}" class="bg-white border-2 border-gray-300 text-gray-600 px-4 py-2 rounded-lg font-bold hover:bg-gray-50 transition">Limpiar</a>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($libros as $libro)
                <div class="group bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 overflow-hidden flex flex-col">

                    <div class="h-48 bg-gray-200 overflow-hidden relative">
                        <img src="{{$libro->portada}}" alt="Portada" class="w-full h-full object-cover">

                        <div class="absolute top-2 right-2 z-10">
                            <form action="{{ route('libros.toggleFav', $libro->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                        title="{{ $libro->favorito ? 'Quitar de favoritos' : 'Añadir a favoritos' }}"
                                        class="bg-white/90 backdrop-blur text-xl p-1.5 rounded-full shadow hover:scale-110 transition-all duration-300 {{ $libro->favorito ? 'opacity-100' : 'opacity-0 group-hover:opacity-100' }}">
                                    <span class="{{ $libro->favorito ? '' : 'grayscale opacity-50 inline-block' }}">⭐</span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="p-5 flex-1">
                        <h2 class="font-black text-xl text-gray-800 mb-1 leading-tight">{{$libro->titulo}}</h2>
                        <p class="text-gray-500 font-medium mb-4">{{$libro->autor}}</p>

                        <div class="flex flex-wrap gap-2 text-xs font-bold uppercase tracking-wide text-gray-500 mb-4">
                            <span class="bg-gray-100 px-2 py-1 rounded">{{$libro->genero}}</span>
                            <span class="bg-gray-100 px-2 py-1 rounded">{{$libro->formato}}</span>
                            <span class="bg-{{ $libro->estado_lectura == 'leido' ? 'green' : ($libro->estado_lectura == 'leyendo' ? 'yellow' : 'gray') }}-100 text-{{ $libro->estado_lectura == 'leido' ? 'green' : ($libro->estado_lectura == 'leyendo' ? 'yellow' : 'gray') }}-800 px-2 py-1 rounded">
                                {{$libro->estado_lectura}}
                            </span>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-4 border-t border-gray-100 flex justify-between items-center">
                        <a href="{{route('libros.show', $libro->id)}}" class="text-blue-600 font-bold hover:underline">Ver detalles</a>

                        <div class="flex gap-2">
                            <form action="{{route('libros.edit', $libro->id)}}" method="get">
                                <button type="submit" class="p-2 text-gray-500 hover:text-yellow-600 hover:bg-yellow-50 rounded-lg transition" title="Editar">
                                    ✏️
                                </button>
                            </form>

                            <form action="{{route('libros.destroy', $libro->id)}}" method="post">
                                @csrf @method('delete')
                                <button type="submit" class="p-2 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Borrar" onclick="return confirm('¿Seguro que quieres borrar este libro?')">
                                    🗑️
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if(count($libros) == 0)
            <div class="text-center py-20 text-gray-400">
                <p class="text-2xl font-bold">No se encontraron libros 😢</p>
                <p>Prueba a cambiar los filtros</p>
            </div>
        @endif

    </div>
@endsection
