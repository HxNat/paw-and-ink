<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Editar Registro</title>
</head>
<body>
    <h2>Editar Registro</h2>

    <!-- data-id guarda el ID del registro que se está editando -->
    <form id="form-editar" data-id="{{ $registro->id ?? '' }}">
        <div>
            <label>Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ $registro->nombre ?? '' }}" required>
        </div>
        <div>
            <label>Apellidos:</label>
            <input type="text" id="apellido" name="apellido" value="{{ $registro->apellido ?? '' }}" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" id="email" name="email" value="{{ $registro->email ?? '' }}" required>
        </div>
        <div>
            <label>Celular:</label>
            <input type="text" id="celular" name="celular" value="{{ $registro->celular ?? '' }}" required>
        </div>
        <div>
            <label>Tipo de Trámite:</label>
            <input type="text" id="tipo_tramite" name="tipo_tramite" value="{{ $registro->tipo_tramite ?? '' }}" required>
        </div>
        <div>
            <label>Sede de Emisión:</label>
            <input type="text" id="sede_emision" name="sede_emision" value="{{ $registro->sede_emision ?? '' }}" required>
        </div>

        <button type="button" id="btn-atras">Atrás</button>
        <button type="submit">Actualizar</button>
    </form>

    <div id="mensaje-error" style="color: red; display: none;"></div>

    @vite(['resources/js/app.js'])
</body>
</html>
