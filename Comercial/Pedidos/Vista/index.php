<?php
session_start();
error_reporting(0);
require_once('../../../Helpers/alert.php');
require_once('../Modelo/pedidos.php');

$modeloPedidos = new pedidos();
$usuario = $_SESSION['Usuario'];
$num_pedido = $_GET['numero_pedido'];
$fechaP = $_GET['fecha'];
$pedidos = $modeloPedidos->get($num_pedido);
$pedidosNumeros = $modeloPedidos->getPedidoPorNumero($num_pedido);
if (isset($_SESSION['Nombre'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Pedidos</title>

        <?php
        require_once("../../../General/Scripts/links.php");
        ?>

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <?php require_once('../../../General/Nav/sidebar.php'); ?>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <?php require_once('../../../General/Nav/topbar.php'); ?>

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <h2>Pedidos</h2>
                        <form action="../Controlador/add.php" method="POST">
                            <?php
                                if($pedidosNumeros != null){
                                    foreach($pedidosNumeros as $pedidosNumero){
                                        $idPedido = $pedidosNumero['id'];
                                        $clientePedido = $pedidosNumero['cliente'];
                                        $fechaPedido = $pedidosNumero['fecha'];
                                        $fechaEntregaPedido = $pedidosNumero['fecha_entrega'];
                                        $observacionesPedido = $pedidosNumero['observaciones'];
                                    }
                                }
                            ?>
                            <?php 
                                if($num_pedido){
                            ?>
                            <div class="row">
                                <div class="buscar col mb-2">
                                    <label class="form-label" for="">Numero</label>
                                    <input class="form-control" name="numero_pedido" id="numero_pedido" type="text" value="<?php echo $num_pedido; ?>" readonly>  
                                </div>
                                
                                <div class="col mb-8">
                                    <label class="form-label" for="">Cliente</label>
                                    <select class="form-select" name="cliente" id="cliente" required="">
                                        <option value=""><?php echo $clientePedido ?></option>
                                        <?php
                                        $clientes = $modeloPedidos->getCliente();
                                        if ($clientes != null) {
                                            foreach ($clientes as $cliente) {
                                        ?>
                                            <option value="<?php echo $cliente['id_cliente'] ?>"><?php echo $cliente['nombre'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col mb-2">
                                    <label class="form-label" for="">Fecha:</label>
                                    <?php $fecha = date('Y-m-d');
                                        if($fechaP){
                                    ?>
                                    <input class="form-control" name="fecha" id="fecha" type="date" value="<?php echo $fechaPedido ?>">
                                    <?php
                                        }else{
                                    ?>
                                    <input class="form-control" name="fecha" id="fecha" type="date" value="<?php echo $fecha ?>">
                                    <?php 
                                        }
                                    ?>
                                    
                                </div>
                                <div class="col mb-2">
                                    <label class="form-label" for="">Fecha de entrega</label>
                                    <input class="form-control" name="fecha_entrega" id="fecha_entrega" type="date" value="<?php echo $fechaEntregaPedido; ?>" required="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-10">
                                    <label class="form-label">Observaciones:</label>            
                                    <textarea class="form-control" name="observaciones" id="observaciones" required=""><?php echo $observacionesPedido ?></textarea> 
                                </div>
                                <div class="col mb-2 my-5">
                                    <input type="hidden" value="<?php echo $usuario ?>" name="user">
                                    <button type="button" class="btn btn-info" id='nuevoPedido'>Nuevo Pedido</button>
                                    <button type="submit" class="btn btn-success">Guardar Pedido</button>
                                    <button type="button" class="btn btn-primary" id='buscarPedido'>Buscar</button>
                                </div>
                            </div>
                            <?php 
                                } else {
                            ?>
                            <div class="row">
                                <div class="col mb-2">
                                    <label class="form-label" for="">Numero</label>
                                    <input class="form-control" name="numero_pedido" id="numero_pedido" type="text" readonly>  
                                </div>
                                
                                <div class="col mb-8">
                                    <label class="form-label" for="">Cliente</label>
                                    <select class="form-select" name="cliente" id="cliente" required="">
                                        <option value="">Seleccione</option>
                                        <?php
                                        $clientes = $modeloPedidos->getCliente();
                                        if ($clientes != null) {
                                            foreach ($clientes as $cliente) {
                                        ?>
                                            <option value="<?php echo $cliente['id_cliente'] ?>"><?php echo $cliente['nombre'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col mb-2">
                                    <label class="form-label" for="">Fecha:</label>
                                    <?php $fecha = date('Y-m-d') ?>
                                    <input class="form-control" name="fecha" id="fecha" type="date" value="<?php echo $fecha ?>">
                                </div>
                                <div class="col mb-2">
                                    <label class="form-label" for="">Fecha de entrega</label>
                                    <input class="form-control" name="fecha_entrega" id="fecha_entrega" type="date" required="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-10">
                                    <label class="form-label">Observaciones:</label>            
                                    <textarea class="form-control" name="observaciones" id="observaciones" required=""></textarea> 

                                </div>
                                <div class="col mb-2 my-5">
                                    <input type="hidden" value="<?php echo $usuario ?>" name="user">
                                    <button type="button" class="btn btn-info" id='nuevoPedido'>Nuevo Pedido</button>
                                    <button type="submit" class="btn btn-success">Guardar Pedido</button>
                                    <button type="button" class="btn btn-primary" id='buscarPedido'>Buscar</button>
                                </div>
                            </div>
                            <?php 
                                } 
                            ?>
                        </form>
                        <hr>

                        <div class="table-responsive" style='overflow-x: hidden;'>
                            <div class="mb-3">
                                <form action="../Controlador/addDetalle.php" method="POST">
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label" for="">Producto:</label>
                                            <select class="form-select" name="producto" id="producto" onchange="cargarPrecio(this.value)" required="">
                                                <option value="">Seleccione</option>
                                                <?php
                                                $productos = $modeloPedidos->getProducto();
                                                if ($productos != null) {
                                                    foreach ($productos as $producto) {
                                                ?>
                                                    <option value="<?php echo $producto['id_producto'] ?>"><?php echo $producto['nombre'] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="form-label" for="">Cantidad: </label>
                                            <input class="form-control" onchange="CalcularTotal()" type="number" name="cantidad" id="cantidad" required="">
                                        </div>
                                        <div class="col" id="crearPrecio">

                                        </div>
                                        <div class="col">
                                            <label class="form-label" for="">Total:</label>
                                            <input class="form-control" type="text" id="total" disabled>
                                        </div>
                                        <?php 
                                            if($fechaP) {
                                        ?>
                                            <input type="hidden" name="numero_pedido" value="<?php echo $num_pedido; ?>">
                                            <input type="hidden" name="fecha_pedido" value="<?php echo $fechaP; ?>">
                                            <input type="hidden" name="id_pedido" value="<?php echo $idPedido; ?>">
                                        <?php 
                                            }else{
                                        ?>
                                            <input type="hidden" name="numero_pedido" value="<?php echo $num_pedido; ?>">
                                            <input type="hidden" name="id_pedido" value="<?php echo $idPedido; ?>">
                                        <?php 
                                            }
                                        ?>
                                        
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-5 mt-4">
                                                    <button class="btn btn-primary btn-sm my-2" type="submit">Agregar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col" style="text-align: right">Precio</th>
                                        <th scope="col" style="text-align: right">Total</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if ($pedidos != null) {
                                        foreach ($pedidos as $pedido) {
                                    ?>
                                            <tr>
                                                <td><?php echo $pedido['producto'] ?></td>
                                                <td><?php echo $pedido['cantidad'] ?></td>
                                                <td align="right">$<?php echo number_format($pedido['precio_venta'], 2); ?></td>
                                                <td align="right">$<?php echo number_format($pedido['totalpedido'], 2) ?></td>
                                                <td style="text-align:right;">
                                                    <a href="javascript:void(0);" onclick="modalEliminar(<?php echo $pedido['id_detalle']; ?>)"><button type="button" class="btn btn-sm btn-danger" title="Eliminar"><i class="bi bi-trash3"></i> </button></a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- /.container-fluid -->

                </div>

                <!-- End of Main Content -->

                <!-- Footer -->
                <?php require_once('../../../General/Nav/footer.php'); ?>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <?php
        require_once('../../../General/Modals/modalsalir.php')
        ?>

        <?php
        require_once('add.php');
        ?>

        <?php
        require_once('edit.php');
        ?>

        <?php
        require_once('delete.php');
        ?>

        <?php
        require_once('../../../General/Scripts/scripts.php');
        ?>

        <?php show_flash_messages() ?>

    </body>

    </html>

<?php } else {
    header('Location: ../../../index.php');
} ?>