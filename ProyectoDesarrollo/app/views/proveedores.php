<?php 
require_once "parte_superior.php";

require_once '../controllers/ProveedoresController.php';

$ProveeController = new ProveeController();

$provees = $ProveeController->index();

?>
<div class="container-fluid">

    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <h1 class="h3 mb-3 text-gray-800">Proveedores</h1>
    </nav>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-lg-7">

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-bold text-primary">Listado de Proveedores</h6>
                    <Button class=" btn btn-sm btn-primary shadow-sm">
                        <i class="bx bxs-file-plus"></i>Agregar Proveedor
                    </Button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>    
                                    <th>Nombre de Proveedor</th>
                                    <th>Telefono</th>  <!-- Esta columna está oculta, pero aún debe estar presente en el <thead> -->
                                    <th>Direccion</th>  <!-- Esta columna está oculta, pero aún debe estar presente en el <thead> -->
                                    <th>Correo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($provees as $provee): ?>
                                        <tr>
                                            <td><?php echo $provee['CODIGO_PROVEEDOR']; ?></td>
                                            <td><?php echo $provee['NOMBRE_PROVEEDOR']; ?></td>
                                            <td><?php echo $provee['TELEFONO']; ?></td>
                                            <td><?php echo $provee['DIRECCION']; ?></td>
                                            <td><?php echo $provee['CORREO']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-circle btn-warning bx bx-edit"></button>
                                                <button type="button" class="btn btn-sm btn-circle btn-danger bx bx-trash"></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<?php 
require_once "parte_inferior.php"
?>