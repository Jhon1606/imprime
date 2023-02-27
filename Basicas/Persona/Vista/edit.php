<!-- Modal -->
<div class="modal fade" id="myModalEditarPersona" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Persona</h5>
                <button type="button" onclick="CerrarModal('EditarPersona')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/edit.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="ideditar" name="id_persona">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Identificación: </label>
                                <input class="form-control" type="number" id="identificacion" name="identificacion" required="">
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
                                <label class="form-label">Telefono: </label>
                                <input class="form-control" type="number" id="telefono" name="telefono" required="">
                            </div>
                            <div class="col">
                                <label class="form-label">Correo: </label>
                                <input class="form-control" type="text" id="correo" name="correo" required="">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Proceso: </label>
                        <select class="form-select" id="proceso" name="proceso" required="">
                            <option value="">Seleccione</option>
                            <?php
                            $procesos= $modeloPersona->getProceso();

                            if($procesos != null){
                                foreach($procesos as $proceso){
                                ?>
                                <option value="<?php echo $proceso['id_proceso']; ?>"><?php echo $proceso['nombre_proceso']; ?></option>
                                <?php
                                }
                            }
                            ?>  
                        </select>
                    </div>
                  
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="CerrarModal('EditarPersona')" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>