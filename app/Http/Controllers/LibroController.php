<?php

namespace App\Http\Controllers;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller {

    public function index(Request $request) {

        $query = Libro::query();

        if($request->busqueda) {
            $query->where('titulo', 'LIKE', '%' . $request->busqueda . '%')
                ->orWhere('autor', 'LIKE', '%' . $request->busqueda . '%');
        }

        if($request->genero && $request->genero!=='todos'){
            $query->where('genero', '=',  $request->genero);
        }

        if($request->estado && $request->estado!=='todos'){
            $query->where('estado_lectura', '=', $request->estado);
        }

        if($request->formato && $request->formato!=='todos'){
            $query->where('formato', '=', $request->formato);
        }

        if($request->has('favorito')){
            $query->where('favorito', '=', 1);
        }

        $libros = $query->get();

        return view('libros.index', compact('libros'));
    }

    public function create(){
        return view('libros.create');
    }

    public function store(Request $request){
        $libro = new Libro();
        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->portada = $request->portada;
        $libro->genero = $request->genero;
        $libro->anyo_publicacion = $request->anyo_publicacion;
        $libro->formato = $request->formato;
        $libro->estado_lectura = $request->estado_lectura;
        $libro->puntuacion = $request->puntuacion;
        $libro->favorito = $request->has('favorito');
        $libro->opinion = $request->opinion;
        $libro->prestado_a = $request->prestado_a;
        $libro->fecha_prestamo = $request->fecha_prestamo;

        $libro->save();
        return back()->with('mensaje', '¡Libro añadido!');
    }

    public function destroy($id){
        $libro = Libro::find($id);
        $libro->delete();

        return redirect()->route('libros.index');
    }

    public function edit($id) {
        $libro = Libro::find($id);
        return view('libros.edit', compact('libro'));
    }

    public function update($id, Request $request){
        $libro = Libro::find($id);

        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->portada = $request->portada;
        $libro->genero = $request->genero;
        $libro->anyo_publicacion = $request->anyo_publicacion;
        $libro->formato = $request->formato;
        $libro->estado_lectura = $request->estado_lectura;
        $libro->puntuacion = $request->puntuacion;
        $libro->favorito = $request->has('favorito');
        $libro->opinion = $request->opinion;
        $libro->prestado_a = $request->prestado_a;
        $libro->fecha_prestamo = $request->fecha_prestamo;

        $libro->save();
        return back()->with('mensaje', '¡Libro editado!');
    }

    public function show($id) {
        $libro = Libro::find($id);
        return view('libros.show', compact('libro'));
    }

}
