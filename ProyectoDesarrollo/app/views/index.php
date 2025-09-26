<?php 
require_once "parte_superior.php";
require_once '../controllers/vencimientoController.php';
$VencController = new VencController();
$Vencimiento = $VencController->index();
?>

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" data-toggle="modal" data-target="#logoutModal""
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <button class=" btn btn-primary mr-2 d-none d-lg-inline big">Cerrar Sesion</button>
            </a>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->

<div class="container-fluid">

    <h1 class="h3 mb-3 text-gray-800">Liquidaciones</h1>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-lg-7">

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-bold text-primary">Lotes en Riesgo</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>    
                                    <th>Producto</th>
                                    <th>Stock</th> 
                                    <th>Laboratorio</th> 
                                    <th>Proveedor</th>
                                    <th>Vencimiento</th>
                                    <th>ESTADO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($Vencimiento as $venc): ?>
                                    <tr class="<?php echo $venc['ESTADO'] == 'Vencido' ? 'table-dangercolor' : ($venc['ESTADO'] == 'Pronto a vencer' ? 'table-warningcolor' : ''); ?>">
                                        <td><?php echo $venc['CODIGO_PRODUCTO']; ?></td>
                                        <td><?php echo $venc['PRODUCTO']; ?></td>
                                        <td><?php echo $venc['STOCK']; ?></td>
                                        <td><?php echo $venc['LAB']; ?></td>
                                        <td><?php echo $venc['PROVEEDOR']; ?></td>
                                        <td><?php echo $venc['VENCIMIENTO']; ?></td>
                                        <td><?php echo $venc['ESTADO']; ?></td>
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

<!-- Modelo Cerrar Sesion-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="ModalCerrar"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalCer">¿Estas seguro de Cerrar Sesion?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona "Cerrar Sesion" si deseas salir de la pagina</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="../../public/login.php">Cerrar Sesion</a>
                </div>
            </div>
        </div>
    </div>

<?php 
require_once "parte_inferior.php"
?>