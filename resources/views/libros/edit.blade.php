@extends('layouts.app')

@section('title', 'Editar libro — Gestor de Biblioteca')

@section('content')
    <div class="max-w-xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('libros.index') }}" class="text-sm text-slate-500 hover:text-slate-800">
                ← Volver al catálogo
            </a>
            <h1 class="text-2xl font-bold text-slate-900 mt-2">Editar libro</h1>
            <p class="text-sm text-slate-500">Modifica la información de <span class="font-medium text-slate-700">{{ $libro->titulo }}</span>.</p>
        </div>

        <div class="bg-white rounded-xl border border-stone-200 shadow-sm p-6">
            <form action="{{ route('libros.update', $libro) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label for="titulo" class="block text-sm font-medium text-slate-700 mb-1">Título</label>
                    <input type="text"
                           id="titulo"
                           name="titulo"
                           value="{{ old('titulo', $libro->titulo) }}"
                           required
                           class="w-full rounded-lg border border-stone-300 px-3.5 py-2 text-sm text-slate-900 focus:border-slate-800 focus:outline-none">
                </div>

                <div>
                    <label for="autor" class="block text-sm font-medium text-slate-700 mb-1">Autor</label>
                    <input type="text"
                           id="autor"
                           name="autor"
                           value="{{ old('autor', $libro->autor) }}"
                           required
                           class="w-full rounded-lg border border-stone-300 px-3.5 py-2 text-sm text-slate-900 focus:border-slate-800 focus:outline-none">
                </div>

                <div>
                    <label for="stock" class="block text-sm font-medium text-slate-700 mb-1">Stock</label>
                    <input type="number"
                           id="stock"
                           name="stock"
                           value="{{ old('stock', $libro->stock) }}"
                           min="0"
                           required
                           class="w-full rounded-lg border border-stone-300 px-3.5 py-2 text-sm text-slate-900 focus:border-slate-800 focus:outline-none">
                </div>

                <div class="pt-2 flex items-center justify-end gap-3">
                    <a href="{{ route('libros.index') }}"
                       class="rounded-lg border border-stone-300 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-stone-50 transition">
                        Cancelar
                    </a>
                    <button type="submit"
                            class="rounded-lg bg-amber-500 px-4 py-2 text-sm font-semibold text-slate-950 hover:bg-amber-400 transition">
                        Actualizar libro
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection