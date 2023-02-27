<!-- Modal -->
<div class="modal fade" id="myModalUnidades" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Unidad</h5>
                <button type="button" onclick="CerrarModal('Unidades')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/add.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input class="form-control" type="text" name="nombre_unidad" required="">
                    </div>
                    <input type="hidden" id="usuario" name="user">
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="CerrarModal('Unidades')" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>