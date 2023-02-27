<!-- Modal -->
<div class="modal fade" id="myModalEstado" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Estado</h5>
                <button type="button" onclick="CerrarModal('Estado')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/add.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Descripción: </label>
                        <input class="form-control" type="text" name="descripcion" required="">
                    </div>
                    <input type="hidden" id="usuario" name="user">
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="CerrarModal('Estado')" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button> 
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>