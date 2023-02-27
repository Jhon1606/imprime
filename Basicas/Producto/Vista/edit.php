<!-- Modal -->
<div class="modal fade" id="myModalEditarProducto" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                <button type="button" onclick="CerrarModal('EditarProducto')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/edit.php" method="POST">
                <div class="modal-body">
                <input type="hidden" id="ideditar" name="id_producto">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Codigo: </label>
                                <input class="form-control" type="text" id="codigo" name="codigo" required="">
                            </div>
                            <div class="col">
                                <label class="form-label">Nombre: </label>
                                <input class="form-control" type="text" id="nombre" name="nombre" required="">
                            </div>
                        </div>   
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Categoria: </label>
                                <select class="form-select" id="categoria" name="categoria" required="">
                                    <option value="">Seleccione</option>
                                    <?php
                                    $categorias= $modeloProducto->getCategoria();

                                    if($categorias != null){
                                        foreach($categorias as $categoria){
                                        ?>
                                        <option value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['nombre_categoria']; ?></option>
                                        <?php
                                        }
                                    }
                                    ?>  
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">Precio Venta: </label>
                                <input class="form-control" type="number" id="precio_venta" name="precio_venta" required="">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Precio Costo: </label>
                                <input class="form-control" type="number" id="precio_costo" name="precio_costo" required="">
                            </div>
                            <div class="col">
                                <label class="form-label">Unidad: </label>
                                <select class="form-select" id="unidad" name="unidad" required="">
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
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">¿El producto es compuesto? </label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="prod_compuesto" name="prod_compuesto">
                            <label class="form-check-label">
                                Sí
                            </label>
                        </div>
                    </div>
                    <input type="hidden" id="usuario" name="user">
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="CerrarModal('EditarProducto')" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button> 
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>