<!-- Modal -->
<div class="modal fade" id="myModalEditarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                <button type="button" onclick="CerrarModal('EditarUsuario')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/edit.php" method="POST">
                <div class="modal-body">       
                    <!-- atributo readonly para que solo se pueda leer y se envia -->
                    <input class="form-control" type="hidden" id="ideditar" name="user_id">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input class="form-control" type="text" id="user_nombre" name="user_nombre">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Perfil: </label>
                        <select class="form-select" id="perfil" name="perfil" required="">
                            <option value="">Seleccione</option>
                            <option value="AD">Administrador</option>
                            <option value="CO">Comercial</option>
                            <option value="PO">Producción</option>       
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="CerrarModal('EditarUsuario')" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>