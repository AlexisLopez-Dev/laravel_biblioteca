<?php

namespace App\Http\Controllers;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller {

    public function index(Request $request) {
        $query = Libro::query();

        if($request->busqueda) {
            $query->where(function($q) use ($request) {
                $q->where('titulo', 'LIKE', '%' . $request->busqueda . '%')
                    ->orWhere('autor', 'LIKE', '%' . $request->busqueda . '%');
            });
        }

        if($request->genero && $request->genero !== 'todos'){
            $query->where('genero', '=',  $request->genero);
        }
        if($request->estado && $request->estado !== 'todos'){
            $query->where('estado_lectura', '=', $request->estado);
        }
        if($request->formato && $request->formato !== 'todos'){
            $query->where('formato', '=', $request->formato);
        }
        if($request->has('favorito')){
            $query->where('favorito', '=', 1);
        }

        $libros = $query->get();

        return view('libros.index', compact('libros'));
    }

    public function create() {
        return view('libros.create');
    }

    public function store(Request $request) {

        $datosValidados = $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'portada' => 'required',
            'genero' => 'required',
            'anyo_publicacion' => 'required|integer',
            'formato' => 'required',
            'estado_lectura' => 'required',
            'puntuacion' => 'required|integer|min:1|max:10',
            'opinion' => 'nullable',
            'prestado_a' => 'nullable',
            'fecha_prestamo' => 'nullable'
        ]);

        $datosValidados['favorito'] = $request->has('favorito');

        Libro::create($datosValidados);

        return back()->with('mensaje', '¡Libro añadido!');
    }

    public function show($id) {
        $libro = Libro::find($id);
        return view('libros.show', compact('libro'));
    }

    public function edit($id) {
        $libro = Libro::find($id);
        return view('libros.edit', compact('libro'));
    }

    public function update($id, Request $request) {

        $datosValidados = $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'portada' => 'required',
            'genero' => 'required',
            'anyo_publicacion' => 'required|integer',
            'formato' => 'required',
            'estado_lectura' => 'required',
            'puntuacion' => 'required|integer|min:1|max:10',
            'opinion' => 'nullable',
            'prestado_a' => 'nullable',
            'fecha_prestamo' => 'nullable'
        ]);

        $datosValidados['favorito'] = $request->has('favorito');

        $libro = Libro::find($id);
        $libro->update($datosValidados);

        return back()->with('mensaje', '¡Libro editado!');
    }

    public function destroy($id) {
        $libro = Libro::find($id);
        $libro->delete();

        return redirect()->route('libros.index');
    }

    public function toggleFavorito($id) {
        $libro = Libro::find($id);
        $libro->favorito = !$libro->favorito;
        $libro->save();

        return back();
    }

}
