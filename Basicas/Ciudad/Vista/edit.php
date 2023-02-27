<!-- Modal -->
<div class="modal fade" id="myModalEditarCiudad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Ciudad</h5>
                <button type="button" onclick="CerrarModal('EditarCiudad')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/edit.php" method="POST">
                <div class="modal-body">       
                    <!-- atributo readonly para que solo se pueda leer y se envia -->
                    <input class="form-control" type="hidden" id="ideditar" name="id_ciudad">

                    <div class="mb-3">
                        <label class="form-label">Departamento: </label>
                        <select class="form-select" id="id_departamento" name="id_departamento" required="">
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
                        <input class="form-control" type="text" id="nombre_ciudad" name="nombre_ciudad">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="CerrarModal('EditarCiudad')" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>