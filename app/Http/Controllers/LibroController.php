<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        $libros = Libro::query()
            ->when($buscar, function ($query, $buscar) {
                $query->where('titulo', 'ilike', "%{$buscar}%")
                      ->orWhere('autor', 'ilike', "%{$buscar}%");
            })
            ->orderBy('titulo')
            ->get();

        return view('libros.index', compact('libros', 'buscar'));
    }
}
