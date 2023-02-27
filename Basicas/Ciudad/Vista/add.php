<!-- Modal -->
<div class="modal fade" id="myModalCiudad" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Ciudad</h5>
                <button type="button" onclick="CerrarModal('Ciudad')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/add.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Departamento: </label>
                        <select class="form-select" name="id_departamento" required="">
                            <option value="">Seleccione</option>
                            <?php
                            $departamentos= $modeloCiudad->getDepartamento();

                            if($departamentos != null){
                                foreach($departamentos as $departamento){
                                ?>
                                <option value="<?php echo $departamento['id_departamento']; ?>"><?php echo $departamento['nombre_departamento']; ?></option>
                                <?php
                                }
                            }
                            ?>  
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ciudad: </label>
                        <input class="form-control" type="text" name="nombre_ciudad" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="CerrarModal('Ciudad')" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>