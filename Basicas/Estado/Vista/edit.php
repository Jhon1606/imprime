<!-- Modal -->
<div class="modal fade" id="myModalEditarEstado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Estado</h5>
                <button type="button" onclick="CerrarModal('EditarEstado')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/edit.php" method="POST">
                <div class="modal-body">       
                    <!-- atributo readonly para que solo se pueda leer y se envia -->
                    <input class="form-control" type="hidden" id="ideditar" name="id_estado">

                    <div class="mb-3">
                        <label class="form-label">Descripción: </label>
                        <input class="form-control" type="text" id="descripcion" name="descripcion">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="CerrarModal('EditarEstado')" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button> 
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>