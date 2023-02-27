<!-- Modal -->
<div class="modal fade" id="myModalCliente" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Cliente</h5>
                <button type="button" onclick="CerrarModal('Cliente')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <label class="form-label">Marca: </label>
                                <input class="form-control" type="text" name="marca" required="">
                            </div>
                            <div class="col">
                                <label class="form-label">Telefono: </label>
                                <input class="form-control" type="number" name="telefono" required="">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Correo: </label>
                                <input class="form-control" type="text" name="correo" required="">
                            </div>
                            <div class="col">
                                <label class="form-label">Dirección: </label>
                                <input class="form-control" type="text" name="direccion" required="">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <!-- Select de Departamento -->
                            <div class="col">
                                <label class="form-label">Departamento: </label>
                                <select class="form-select" name="departamento" required="" onchange="cargarCiudad(this.value)">
                                    <option value="">Seleccione</option>
                                    <?php
                                    $departamentos= $modeloCliente->getDepartamento();

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
                            <div class="col" id="crearCiudad">
                            </div>
                        </div>
                    </div>
                   
                    <input type="hidden" id="usuario" name="user">
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="CerrarModal('Cliente')" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button> 
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>