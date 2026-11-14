<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Listado de Documentos</title>
</head>
<body>
    <h2>Tipos de Documentos</h2>

    <!-- Buscador -->
    <input type="text" id="buscador" placeholder="Buscar por tipo o abreviatura...">

    <!-- Botón Nuevo -->
    <a href="/documentos/agregar">+ Nuevo Tipo</a>

    <!-- Tabla -->
    <table id="tabla-documentos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo Documento</th>
                <th>Abreviatura</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <!-- Ejemplo de fila (El Compañero 4 las generará dinámicamente) -->
            <tr data-id="1">
                <td>1</td>
                <td>Cédula de Ciudadanía</td>
                <td>CC</td>
                <td>Activo</td>
                <td>
                    <a href="/documentos/editar/1">Editar</a>
                    <button class="btn-eliminar" data-id="1" data-nombre="Cédula de Ciudadanía">Eliminar</button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Modal de Confirmación (Oculto por defecto) -->
    <div id="modal-eliminar" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5);">
        <div style="background: white; margin: 20% auto; padding: 20px; width: 300px;">
            <h3>¿Estás seguro?</h3>
            <p>Vas a eliminar: <strong id="modal-nombre-registro"></strong></p>
            <button id="btn-cancelar-modal">Cancelar</button>
            <button id="btn-aceptar-modal">Aceptar</button>
        </div>
    </div>

    @vite(['resources/js/app.js'])
</body>
</html>
