<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::all();
        return view('libros.index', compact('libros'));
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index')->with('success', 'Libro eliminado correctamente.');
    }

    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'autor'  => ['required', 'string', 'max:255'],
            'stock'  => ['required', 'integer', 'min:0'],
        ]);

        Libro::create($validated);

        return redirect()
            ->route('libros.index')
            ->with('success', 'Libro creado correctamente.');
    }

    public function edit(Libro $libro)
    {
        return view('libros.edit', compact('libro'));
    }

    public function update(Request $request, Libro $libro)
    {
        $validated = $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'autor'  => ['required', 'string', 'max:255'],
            'stock'  => ['required', 'integer', 'min:0'],
        ]);

        $libro->update($validated);

        return redirect()
            ->route('libros.index')
            ->with('success', 'Libro actualizado correctamente.');
    }
}