<?php 
require_once "parte_superior.php";
require_once '../controllers/atributoController.php';
$atributoController = new atributoController();
$laboratorio = $atributoController->LAB();
$tipo = $atributoController->TIP()
?>
<div class="container-fluid">

    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <h1 class="h3 mb-3 text-gray-800">Gestion de Atributos</h1>
    </nav>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-lg-7">

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-bold text-primary">Listado de Laboratorios</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>CODIGO DE LABORATORIO</th>    
                                    <th>LABORATORIO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($laboratorio as $lab): ?>
                                    <tr>
                                        <td><?php echo $lab['CODIGO_LABORATORIO']; ?></td>
                                        <td><?php echo $lab['NOMBRE']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    <div class="row">

        <div class="col-xl-12 col-lg-7">

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-bold text-primary">Listado de Tipo de Productos</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>    
                                    <th>TIPO DE PRODUCTO</th>
                                    <th>DESCRIPCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tipo as $tipo): ?>
                                    <tr>
                                        <td><?php echo $tipo['CODIGO_TPRODUCTO']; ?></td>
                                        <td><?php echo $tipo['TIP']; ?></td>
                                        <td><?php echo $tipo['DESCRIPCION']; ?></td>
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
<?php 
require_once "parte_inferior.php"
?>