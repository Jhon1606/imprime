<!-- Modal -->
<div class="modal fade" id="myModalEliminarPrecio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Precio</h5>
                <button type="button" onclick="CerrarModalPrecio()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/preciodelete.php" method="POST" >
                <input type="hidden" id="idprecio" name="id">
                <div class="modal-body">
                    ¿Está seguro que desea eliminar el precio?
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="CerrarModalPrecio()" class="btn btn-secondary"> Cancelar</button> 
                    <button type="submit" class="btn btn-primary">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>