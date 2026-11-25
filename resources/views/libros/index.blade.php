@extends('layouts.app')

@section('title', 'Catálogo de libros — Gestor de Biblioteca')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Catálogo de libros</h1>
            <p class="text-sm text-slate-500 mt-0.5">
                Total registrados: <span class="font-semibold text-slate-700">{{ $libros->count() }}</span>
            </p>
        </div>

        <a href="{{ route('libros.create') }}"
           class="inline-flex items-center justify-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800 transition">
            + Agregar libro
        </a>
    </div>

    <div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
        @if ($libros->isEmpty())
            <div class="p-10 text-center">
                <p class="text-slate-600 font-medium">Aún no hay libros registrados en la biblioteca.</p>
                <p class="text-sm text-slate-400 mt-1">Comienza agregando el primer ejemplar al catálogo.</p>
                <a href="{{ route('libros.create') }}"
                   class="mt-4 inline-flex items-center rounded-lg bg-amber-500 px-4 py-2 text-sm font-semibold text-slate-950 hover:bg-amber-400 transition">
                    Crear primer libro
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-stone-200 bg-stone-50 text-xs uppercase tracking-wider text-slate-500">
                            <th class="py-3 px-4">Título</th>
                            <th class="py-3 px-4">Autor</th>
                            <th class="py-3 px-4">Disponibilidad</th>
                            <th class="py-3 px-4 text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100 text-sm">
                        @foreach ($libros as $libro)
                            <tr class="hover:bg-stone-50/70 transition">
                                <td class="py-3.5 px-4 font-medium text-slate-900">{{ $libro->titulo }}</td>
                                <td class="py-3.5 px-4 text-slate-600">{{ $libro->autor }}</td>
                                <td class="py-3.5 px-4">
                                    @if ($libro->stock > 0)
                                        <span class="inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-0.5 text-xs font-medium text-emerald-700 border border-emerald-200">
                                            {{ $libro->stock }} en stock
                                        </span>
                                    @else
                                        <span class="inline-flex items-center rounded-full bg-amber-50 px-2.5 py-0.5 text-xs font-medium text-amber-800 border border-amber-200">
                                            Sin stock
                                        </span>
                                    @endif
                                </td>
                                <td class="py-3.5 px-4 text-right whitespace-nowrap">
                                    <div class="inline-flex items-center gap-2">
                                        <a href="{{ route('libros.edit', $libro) }}"
                                           class="rounded-md border border-stone-300 bg-white px-3 py-1.5 text-xs font-medium text-slate-700 hover:bg-stone-100 transition">
                                            Editar
                                        </a>

                                        <form action="{{ route('libros.destroy', $libro) }}"
                                              method="POST"
                                              class="inline"
                                              onsubmit="return confirm('¿Eliminar este libro?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="rounded-md border border-rose-200 bg-rose-50 px-3 py-1.5 text-xs font-medium text-rose-700 hover:bg-rose-100 transition">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection