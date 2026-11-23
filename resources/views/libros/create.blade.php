<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Libro</title>
</head>
<body>
    <h1>Crear Libro</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('libros.store') }}" method="POST">
        @csrf

        <div>
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
        </div>

        <div>
            <label for="autor">Autor</label>
            <input type="text" id="autor" name="autor" value="{{ old('autor') }}" required>
        </div>

        <div>
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock', 0) }}" min="0" required>
        </div>

        <button type="submit">Guardar</button>
        <a href="{{ route('libros.index') }}">Cancelar</a>
    </form>
</body>
</html>