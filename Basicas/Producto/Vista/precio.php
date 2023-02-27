<!-- Modal -->
<div class="modal fade" id="myModalPrecio" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Precio de venta</h5>
                <button type="button" onclick="CerrarModal('Precio')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/precioadd.php" method="POST">
                <div class="modal-body">
                <input class="form-control" type="hidden" id="id_producto" name="id_producto">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Referencia: </label>
                                <input class="form-control" type="text" name="referencia" required="">  
                            </div>
                            <div class="col">
                                <label class="form-label">Precio Venta: </label>
                                <input class="form-control" type="number" name="precio_venta" required=""> 
                            </div>
                        </div>                                  
                    </div>
                    <input type="hidden" id="user" name="user">
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="CerrarModal('Precio')" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button> 
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>

            <div class="table-responsive p-5">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Referencia</th>
                            <th scope="col">Precio</th>  
                            <th scope="col"></th> 
                        </tr>
                    </thead>

                    <tbody id="tablaPrecio">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>