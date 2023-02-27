<!-- Modal -->
<div class="modal fade" id="myModalPersona" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Persona</h5>
                <button type="button" onclick="CerrarModal('Persona')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/add.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Identificación: </label>
                                <input class="form-control" type="number" name="identificacion" required="">
                            </div>
                            <div class="col">
                                <label class="form-label">Nombre: </label>
                                <input class="form-control" type="text" name="nombre" required="">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Telefono: </label>
                                <input class="form-control" type="number" name="telefono" required="">
                            </div>
                            <div class="col">
                                <label class="form-label">Correo: </label>
                                <input class="form-control" type="text" name="correo" required="">
                            </div>
                        </div>               
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Proceso: </label>
                        <select class="form-select" name="proceso" required="">
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
                    <input type="hidden" id="usuario" name="user">
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="CerrarModal('Persona')" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button> 
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>