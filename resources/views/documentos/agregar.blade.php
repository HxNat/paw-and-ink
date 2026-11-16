<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Agregar Registro</title>
</head>
<body>
    <h2>Agregar Registro</h2>

    <form id="form-agregar">
        <div>
            <label>Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
            <label>Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label>Celular:</label>
            <input type="text" id="celular" name="celular" required>
        </div>

        <button type="button" id="btn-atras">Atrás</button>
        <button type="submit">Registrar</button>
    </form>

    <div id="mensaje-error" style="color: red; display: none;"></div>

    @vite(['resources/js/app.js'])
</body>
</html>
