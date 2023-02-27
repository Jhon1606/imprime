<!-- Modal -->
<div class="modal fade" id="myModalUsuario" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Usuario</h5>
                <button type="button" onclick="CerrarModal('Usuario')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/add.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nombre de usuario: </label>
                        <input class="form-control" type="text" name="user_id" required="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input class="form-control" type="text" name="user_nombre" required="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Perfil: </label>
                        <select class="form-select" name="perfil" required="">
                            <option value="">Seleccione</option>
                            <option value="AD">Administrador</option>
                            <option value="CO">Comercial</option>
                            <option value="PO">Producción</option>
                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Clave: </label>
                        <input class="form-control" type="password" name="clave" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="CerrarModal('Usuario')" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button> 
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>