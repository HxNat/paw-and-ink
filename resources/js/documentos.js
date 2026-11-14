// ==========================================
// 1. CONFIGURACIÓN INICIAL Y CSRF
// ==========================================
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// URLs de ejemplo (El Compañero 4 las cambiará por las rutas reales de Laravel)
const URLS = {
    crear: '/api/documentos',          // POST
    actualizar: '/api/documentos/',    // PUT (se le concatena el ID)
    eliminar: '/api/documentos/'       // DELETE (se le concatena el ID)
};

// ==========================================
// 2. UTILIDADES (Mostrar errores y Validar)
// ==========================================
function mostrarError(mensaje) {
    const errorDiv = document.getElementById('mensaje-error');
    if (errorDiv) {
        errorDiv.textContent = mensaje;
        errorDiv.style.display = 'block';
    } else {
        alert(mensaje);
    }
}

function limpiarError() {
    const errorDiv = document.getElementById('mensaje-error');
    if (errorDiv) errorDiv.style.display = 'none';
}

// Validación básica de campos vacíos
function validarFormulario(formData) {
    for (let [key, value] of formData.entries()) {
        if (value.trim() === '') {
            return `El campo ${key} no puede estar vacío.`;
        }
    }
    return null; // null significa que todo está bien
}

// ==========================================
// 3. LÓGICA DE AGREGAR (CREAR)
// ==========================================
const formAgregar = document.getElementById('form-agregar');

if (formAgregar) {
    formAgregar.addEventListener('submit', async (e) => {
        e.preventDefault();
        limpiarError();

        const formData = new FormData(formAgregar);
        const errorValidacion = validarFormulario(formData);

        if (errorValidacion) {
            mostrarError(errorValidacion);
            return;
        }

        try {
            const response = await fetch(URLS.crear, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(Object.fromEntries(formData))
            });

            if (response.ok) {
                alert('Registro creado exitosamente');
                window.location.href = '/documentos/listar'; // Redirigir a la lista
            } else {
                const data = await response.json();
                mostrarError(data.message || 'Error al crear el registro');
            }
        } catch (error) {
            mostrarError('Error de conexión: ' + error.message);
        }
    });
}

// ==========================================
// 4. LÓGICA DE EDITAR (ACTUALIZAR)
// ==========================================
const formEditar = document.getElementById('form-editar');

if (formEditar) {
    formEditar.addEventListener('submit', async (e) => {
        e.preventDefault();
        limpiarError();

        const id = formEditar.getAttribute('data-id');
        const formData = new FormData(formEditar);
        const errorValidacion = validarFormulario(formData);

        if (errorValidacion) {
            mostrarError(errorValidacion);
            return;
        }

        try {
            const response = await fetch(URLS.actualizar + id, {
                method: 'PUT', // Laravel acepta PUT o PATCH
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(Object.fromEntries(formData))
            });

            if (response.ok) {
                alert('Registro actualizado correctamente');
                window.location.href = '/documentos/listar';
            } else {
                const data = await response.json();
                mostrarError(data.message || 'Error al actualizar');
            }
        } catch (error) {
            mostrarError('Error de conexión: ' + error.message);
        }
    });
}

// ==========================================
// 5. LÓGICA DE LISTAR (BUSCADOR EN TIEMPO REAL)
// ==========================================
const buscador = document.getElementById('buscador');

if (buscador) {
    buscador.addEventListener('keyup', function() {
        const filtro = this.value.toLowerCase();
        const filas = document.querySelectorAll('#tabla-documentos tbody tr');

        filas.forEach(fila => {
            // Busca en todo el texto de la fila
            const textoFila = fila.textContent.toLowerCase();
            if (textoFila.includes(filtro)) {
                fila.style.display = '';
            } else {
                fila.style.display = 'none';
            }
        });
    });
}

// ==========================================
// 6. LÓGICA DE ELIMINAR (MODAL + FETCH)
// ==========================================
const modal = document.getElementById('modal-eliminar');
const modalNombre = document.getElementById('modal-nombre-registro');
const btnCancelar = document.getElementById('btn-cancelar-modal');
const btnAceptar = document.getElementById('btn-aceptar-modal');
let idParaEliminar = null;

// Abrir modal al hacer clic en cualquier botón de eliminar
document.querySelectorAll('.btn-eliminar').forEach(btn => {
    btn.addEventListener('click', function() {
        idParaEliminar = this.getAttribute('data-id');
        const nombre = this.getAttribute('data-nombre');
        
        if (modalNombre) modalNombre.textContent = nombre;
        if (modal) modal.style.display = 'block';
    });
});

// Cerrar modal al cancelar
if (btnCancelar) {
    btnCancelar.addEventListener('click', () => {
        modal.style.display = 'none';
        idParaEliminar = null;
    });
}

// Confirmar eliminación (Fetch DELETE)
if (btnAceptar) {
    btnAceptar.addEventListener('click', async () => {
        if (!idParaEliminar) return;

        try {
            const response = await fetch(URLS.eliminar + idParaEliminar, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                // Eliminar la fila de la tabla visualmente sin recargar
                const fila = document.querySelector(`tr[data-id="${idParaEliminar}"]`);
                if (fila) fila.remove();
                
                modal.style.display = 'none';
                alert('Registro eliminado');
            } else {
                alert('Error al eliminar el registro');
            }
        } catch (error) {
            alert('Error de conexión: ' + error.message);
        } finally {
            idParaEliminar = null;
        }
    });
}
