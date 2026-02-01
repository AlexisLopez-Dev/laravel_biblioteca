@extends('layout')

@section('content')

    <div class="max-w-5xl mx-auto">

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">

            <div class="grid grid-cols-1 md:grid-cols-3">

                <div class="bg-gray-100 relative min-h-[400px] md:h-full">
                    <img src="{{$libro->portada}}" alt="Portada" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>

                    @if($libro->favorito)
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur p-2 rounded-full shadow-lg" title="Es favorito">
                            ❤️
                        </div>
                    @endif
                </div>

                <div class="p-8 md:p-10 md:col-span-2 flex flex-col justify-between">

                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h1 class="text-4xl font-black text-gray-900 leading-tight mb-2">{{$libro->titulo}}</h1>
                                <p class="text-xl text-gray-500 font-medium">{{$libro->autor}}</p>
                            </div>
                            <div class="flex flex-col items-center bg-gray-50 px-4 py-2 rounded-xl border border-gray-100">
                                <span class="text-3xl font-black text-gray-900">{{$libro->puntuacion}}</span>
                                <span class="text-xs text-gray-400 font-bold uppercase">Puntos</span>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-3 mb-8">
                            <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-lg text-sm font-bold uppercase tracking-wide">
                                📂 {{$libro->genero}}
                            </span>
                            <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-lg text-sm font-bold uppercase tracking-wide">
                                📅 {{$libro->anyo_publicacion}}
                            </span>
                            <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-lg text-sm font-bold uppercase tracking-wide">
                                📖 {{$libro->formato}}
                            </span>

                            @php
                                $coloresEstado = [
                                    'pendiente' => 'bg-gray-100 text-gray-600',
                                    'leyendo' => 'bg-yellow-100 text-yellow-700',
                                    'leido' => 'bg-green-100 text-green-700',
                                    'abandonado' => 'bg-red-100 text-red-700',
                                ];
                                $claseEstado = $coloresEstado[$libro->estado_lectura] ?? 'bg-gray-100 text-gray-600';
                            @endphp
                            <span class="px-3 py-1 rounded-lg text-sm font-bold uppercase tracking-wide {{$claseEstado}}">
                                {{$libro->estado_lectura}}
                            </span>
                        </div>

                        @if($libro->opinion)
                            <div class="mb-6">
                                <h3 class="text-sm font-bold text-gray-400 uppercase mb-2">Mi Opinión</h3>
                                <div class="relative bg-gray-50 p-6 rounded-2xl border border-gray-100">
                                    <span class="absolute top-4 left-4 text-4xl text-gray-200 font-serif leading-none">“</span>
                                    <p class="text-gray-700 italic relative z-10">{{$libro->opinion}}</p>
                                </div>
                            </div>
                        @endif

                        @if($libro->prestado_a)
                            <div class="flex items-center gap-4 bg-orange-50 border border-orange-200 p-4 rounded-xl text-orange-800">
                                <div class="text-2xl">🤝</div>
                                <div>
                                    <p class="font-bold">Prestado a {{$libro->prestado_a}}</p>
                                    <p class="text-sm opacity-80">Fecha: {{$libro->fecha_prestamo}}</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="mt-8 pt-8 border-t border-gray-100 flex gap-4">
                        <a href="{{route('libros.edit', $libro->id)}}" class="flex-1 bg-black text-white text-center font-bold py-3 rounded-xl hover:bg-gray-800 transition shadow-lg">
                            ✏️ Editar Libro
                        </a>

                        <a href="{{route('libros.index')}}" class="px-6 py-3 border-2 border-gray-200 font-bold rounded-xl text-gray-600 hover:bg-gray-50 transition">
                            Volver
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
