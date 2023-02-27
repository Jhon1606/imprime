<?php
    session_start();
    error_reporting(0);
    require_once('../../../Helpers/alert.php');
    require_once('../Modelo/usuarios.php');

    $modeloUsuario= new usuarios();
    $usuarios = $modeloUsuario->get();
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

    <title>Usuarios</title>
    
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
                    <h2>Usuarios</h2>
                    <div class="col p-2">
                        <a href="javascript:void(0);" onclick="modalAgregar('Usuario')" ><button type="button" class="btn btn-info" title="Añadir"><i class="bi bi-plus-lg"></i> Agregar Usuario </button></a> 
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Nombre</th> 
                                    <th scope="col">Perfil</th>    
                                    <th scope="col"></th> 
                                </tr>
                            </thead>

                            <tbody>
                            <?php         
                                if($usuarios != null){ 
                                    foreach($usuarios as $usuario){
                            ?>
                                <tr>
                                    <td><?php echo $usuario['user_id']; ?></td>
                                    <td><?php echo $usuario['user_nombre']; ?></td>
                                    <td><?php echo $usuario['perfil']; ?></td>
                                    <td style="text-align:right;">
                                        <a href="javascript:void(0);" onclick="modalEditarUsuario('<?php echo $usuario['user_id']; ?>')"><button type="button" class="btn btn-sm btn-success my-1" title="Editar"><i class="bi bi-pencil-fill"></i> </button></a>
                                        <a href="javascript:void(0);" onclick="modalEliminar('<?php echo $usuario['user_id']; ?>')"><button type="button" class="btn btn-sm btn-danger" title="Eliminar"><i class="bi bi-trash3"></i> </button></a>
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