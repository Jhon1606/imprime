<!-- Modal -->
<div class="modal fade" id="myModalDepartamento" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Departamento</h5>
                <button type="button" onclick="CerrarModal('Departamento')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/add.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nombre del departamento: </label>
                        <input class="form-control" type="text" name="nombre_departamento" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="CerrarModal('Departamento')" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>