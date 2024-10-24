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
                    <Button class=" btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addModal">
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

<!-- Logout Modal-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="BotonAgregar"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="BotonAgregar">Agregar Producto</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Datos del proveedor</div>
                    <form class="user">
                        <div>
                            <div class="form-group"> Nombre
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="provNombre"
                                    placeholder="Nombre del Proveedor">
                            </div>
                            <div class="form-group"> Telefono
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="provTel"
                                    placeholder="Telefono del Proveedor">
                            </div>
                            <div class="form-group"> Direccion
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="provDireccion"
                                    placeholder="Direccion del Proveedor">
                            </div>
                            <div class="form-group"> Correo
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="provCorreo"
                                    placeholder="E-mail">
                            </div>
                            
                        </div>

                    </form>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" action="" >Agregar</a>
                </div>
            </div>
        </div>
    </div>

</div>
<?php 
require_once "parte_inferior.php"
?>