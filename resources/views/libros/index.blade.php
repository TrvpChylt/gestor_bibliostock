<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libros</title>
</head>
<body>
    <h1>Listado de libros</h1>

    <a href="{{ route('libros.create') }}">Nuevo libro</a>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <ul>
        @foreach ($libros as $libro)
            <li>
                {{ $libro->titulo }} - {{ $libro->autor }} (Stock: {{ $libro->stock }})
                <a href="{{ route('libros.edit', $libro) }}">Editar</a>
                <form action="{{ route('libros.destroy', $libro) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar este libro?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>