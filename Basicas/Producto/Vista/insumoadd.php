<!-- Modal -->
<div class="modal fade" id="myModalInsumoAdd" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Insumo</h5>
                <button type="button" onclick="CerrarModal('InsumoAdd')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/insumoadd.php" method="POST">
                <div class="modal-body">
                    <label class="form-label"> <b><?php echo $producto ?></b> </label>
                    <input type="hidden" value="<?php echo $producto ?>" name="nombre">
                    <input class="form-control" type="hidden" value="<?php echo $id_producto ?>" name="producto">
                    <div class="mb-3">                                   
                        <label class="form-label">Insumo:</label>
                        <select class="form-select" name="id_insumo" required="">
                            <option value="">Seleccione</option>
                            <?php
                            $insumos= $modeloProducto->getInsumo();

                            if($insumos != null){
                                foreach($insumos as $insumo){
                                ?>
                                <option value="<?php echo $insumo['id_insumo']; ?>"><?php echo $insumo['nombre']; ?></option>
                                <?php
                                }
                            }
                            ?>  
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Unidad: </label>
                        <select class="form-select" name="id_unidad" required="">
                            <option value="">Seleccione</option>
                            <?php
                            $unidades= $modeloProducto->getUnidad();

                            if($unidades != null){
                                foreach($unidades as $unidad){
                                ?>
                                <option value="<?php echo $unidad['id_unidad']; ?>"><?php echo $unidad['nombre_unidad']; ?></option>
                                <?php
                                }
                            }
                            ?>  
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad: </label>
                        <input class="form-control" type="number" name="cantidad" required=""> 
                    </div>
                    <input type="hidden" value="<?php echo $usuario ?>" name="user">
                </div>
                <div class="modal-footer">
                    <a href="index.php"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cancelar</button></a>
                    <button type="submit" class="my-2 m-4 btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>