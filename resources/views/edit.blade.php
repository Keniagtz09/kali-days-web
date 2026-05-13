<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Vlog | Kali Days</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body style="padding: 50px;">
    <h2>Editar Entrada: {{ $vlog->titulo }}</h2>
    
    <form action="{{ route('vlogs.update', $vlog->id) }}" method="POST">
        @csrf
        @method('PUT') <div style="margin-bottom: 15px;">
            <label>Título:</label><br>
            <input type="text" name="titulo" value="{{ $vlog->titulo }}" style="width: 100%;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Descripción:</label><br>
            <textarea name="descripcion" style="width: 100%;" rows="5" required>{{ $vlog->descripcion }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label>URL Video:</label><br>
            <input type="url" name="url_video" value="{{ $vlog->url_video }}" style="width: 100%;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Fecha:</label><br>
            <input type="date" name="fecha_publicacion" value="{{ $vlog->fecha_publicacion }}" required>
        </div>

        <button type="submit" style="background: #2ecc71; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">
            Actualizar Cambios
        </button>
        <a href="{{ route('vlogs.index') }}">Cancelar</a>
    </form>
</body>
</html>