<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar libro</title>
</head>
<body>
    <h1>Editar libro</h1>

    <a href="{{ route('libros.index') }}">Volver al listado</a>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('libros.update', $libro) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $libro->titulo) }}" required>
        </div>

        <div>
            <label for="autor">Autor</label>
            <input type="text" id="autor" name="autor" value="{{ old('autor', $libro->autor) }}" required>
        </div>

        <div>
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock', $libro->stock) }}" min="0" required>
        </div>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>