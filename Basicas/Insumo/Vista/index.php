<?php
    session_start();
    error_reporting(0);
    require_once('../../../Helpers/alert.php');
    require_once('../Modelo/insumo.php');

    $modeloInsumo= new insumo();
    $insumos = $modeloInsumo->get();
    $usuario = $_SESSION['Usuario'];
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

    <title>Insumos</title>
    
    <?php 
        require_once("../../../General/Scripts/links.php")
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
                    <h2>Insumos</h2>
                    <div class="col p-2">
                        <a href="javascript:void(0);" onclick="modalAgregar('Insumo','<?php echo $usuario ?>')" ><button type="button" class="btn btn-info" title="Añadir"><i class="bi bi-plus-lg"></i> Agregar Insumo </button></a> 
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Nombre</th> 
                                    <th scope="col">Categoria</th> 
                                    <th scope="col">Precio</th> 
                                    <th scope="col">Unidad</th> 
                                    <th scope="col">Estado</th> 
                                    <th scope="col"></th> 
                                </tr>
                            </thead>

                            <tbody>
                            <?php         
                                if($insumos != null){ 
                                    foreach($insumos as $insumo){
                            ?>
                                <tr>
                                    <td><?php echo $insumo['codigo']; ?></td>
                                    <td><?php echo $insumo['nombre']; ?></td>
                                    <td><?php echo $insumo['categoria']; ?></td>
                                    <td><?php echo $insumo['precio_costo']; ?></td>
                                    <td><?php echo $insumo['unidad']; ?></td>
                                    <td><?php echo $insumo['estado']; ?></td>
                                    <td style="text-align:right;">
                                        <a href="javascript:void(0);" onclick="modalEditarInsumo('<?php echo $insumo['id_insumo']; ?>')"><button type="button" class="btn btn-sm btn-success my-1" title="Editar"><i class="bi bi-pencil-fill"></i> </button></a>
                                        <a href="javascript:void(0);" onclick="modalEliminar('<?php echo $insumo['id_insumo']; ?>')"><button type="button" class="btn btn-sm btn-danger" title="Eliminar"><i class="bi bi-trash3"></i> </button></a>
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

<?php } else{
    header('Location: ../../../index.php');
} ?>