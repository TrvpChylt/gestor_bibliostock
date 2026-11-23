<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestor de Biblioteca')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 text-slate-800 min-h-screen flex flex-col antialiased">
    <header class="bg-slate-900 text-stone-100 shadow-sm">
        <div class="max-w-5xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="{{ route('libros.index') }}" class="flex items-center gap-2.5 font-semibold text-lg tracking-tight">
                <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-amber-500 text-slate-950 font-bold">B</span>
                <span>Gestor de Biblioteca</span>
            </a>

            <nav class="flex items-center gap-3 text-sm">
                <a href="{{ route('libros.index') }}" class="px-3 py-1.5 rounded-md hover:bg-slate-800 transition">
                    Catálogo
                </a>
                <a href="{{ route('libros.create') }}" class="px-3.5 py-1.5 rounded-md bg-amber-500 text-slate-950 font-medium hover:bg-amber-400 transition">
                    + Nuevo libro
                </a>
            </nav>
        </div>
    </header>

    <main class="flex-1 max-w-5xl w-full mx-auto px-4 py-8">
        @if (session('success'))
            <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-800">
                <p class="font-semibold mb-1">Revisa los siguientes campos:</p>
                <ul class="list-disc list-inside space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="border-t border-stone-200 bg-white py-4 text-center text-xs text-slate-500">
        Gestor de Biblioteca · Laravel CRUD
    </footer>
</body>
</html>