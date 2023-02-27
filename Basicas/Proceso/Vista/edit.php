<!-- Modal -->
<div class="modal fade" id="myModalEditarProceso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Proceso</h5>
                <button type="button" onclick="CerrarModal('EditarProceso')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/edit.php" method="POST">
                <div class="modal-body">       
                    <!-- atributo readonly para que solo se pueda leer y se envia -->
                    <input class="form-control" type="hidden" id="ideditar" name="id_proceso">

                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input class="form-control" type="text" id="nombre_proceso" name="nombre_proceso">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="CerrarModal('EditarProceso')" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button> 
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>