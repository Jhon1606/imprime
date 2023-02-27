<?php
    session_start();
    error_reporting(0);
    require_once('../../../Helpers/alert.php');
    require_once('../Modelo/producto.php');

    $modeloProducto= new producto();
    $usuario = $_SESSION['Usuario'];
    $id_producto = $_GET['id_producto'];
    $producto = $_GET['producto'];
    $productoInsumos = $modeloProducto->getInsumos($id_producto);
    
    if (isset($_SESSION['Nombre'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Productos</title>
    
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
                    <h3><?php echo $producto ?></h3>
                    <div class="col p-2">
                        <a href="javascript:void(0);" onclick="modalAgregar('InsumoAdd')" ><button type="button" class="btn btn-sm btn-info" title="Añadir"><i class="bi bi-plus-lg"></i> Agregar Insumo </button></a> 
                        <a href="index.php" ><button type="button" class="btn btn-sm btn-primary" title="Regresar"><i class="bi bi-arrow-counterclockwise"></i> Regresar</button></a> 
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Insumo</th>
                                    <th scope="col">Unidad</th>  
                                    <th scope="col">Cantidad</th>  
                                    <th scope="col"></th> 
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                    if($productoInsumos != null){
                                        foreach($productoInsumos as $productoInsumo){
                                ?>
                                <tr>
                                    <td><?php echo $productoInsumo['insumo'] ?></td>
                                    <td><?php echo $productoInsumo['unidad'] ?></td>
                                    <td><?php echo $productoInsumo['cantidad'] ?></td>  
                                    <td>
                                        <a href="javascript:void(0);" onclick="modalEliminarInsumo('<?php echo $productoInsumo['id_compuesto']; ?>')"><button type="button" class="btn btn-sm btn-danger" title="Eliminar"><i class="bi bi-trash3"></i> </button></a>
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
        require_once('insumoadd.php');
    ?>

    <?php
        require_once('insumodelete.php');
    ?>

    <?php
        require_once('../../../General/Scripts/scripts.php');
    ?>

    <?php show_flash_messages() ?> 
    
</body>

</html>

<?php } else{
    header('Location: ../../../index.php');
} ?>
