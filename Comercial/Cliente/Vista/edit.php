<!-- Modal -->
<div class="modal fade" id="myModalEditarCliente" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
                <button type="button" onclick="CerrarModal('EditarCliente')" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario -->
            <form action="../Controlador/edit.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="ideditar" name="id_cliente">
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
                                <label class="form-label">Marca: </label>
                                <input class="form-control" type="text" id="marca" name="marca" required="">
                            </div>
                            <div class="col">
                                <label class="form-label">Telefono: </label>
                                <input class="form-control" type="number" id="telefono" name="telefono" required="">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Correo: </label>
                                <input class="form-control" type="text" id="correo" name="correo" required="">
                            </div>
                            <div class="col">
                                <label class="form-label">Dirección: </label>
                                <input class="form-control" type="text" id="direccion" name="direccion" required="">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <!-- Select de Departamento -->
                            <div class="col">
                                <label class="form-label">Departamento: </label>
                                <select class="form-select" id="departamento" name="departamento" required="" onchange="cargarCiudad(this.value)">
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
                            <div class="col" id="editarCiudad">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="CerrarModal('EditarCliente')" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>