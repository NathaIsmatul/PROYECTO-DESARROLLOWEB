<?php
require_once "parte_superior.php";

require_once '../controllers/ProductosController.php';

$ProductosController = new ProductController();

$products = $ProductosController->index();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <h1 class="h3 mb-3 text-gray-800">Productos</h1>
    </nav>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-lg-7">

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-bold text-primary">Listado de Productos</h6>
                    <Button class=" btn btn-sm btn-primary shadow-sm">
                        <i class="bx bxs-file-plus"></i>Agregar Productos
                    </Button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>    
                                    <th>ID</th>
                                    <th>Nombre de Producto</th>
                                    <th>Descripcion</th>
                                    <th>Tipo de Producto</th>
                                    <th>Laboratorio</th>
                                    <th>Costo</th>
                                    <th>Precio de venta</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td><?php echo $product['CODIGO_PRODUCTO']; ?></td>
                                        <td><?php echo $product['NOMBRE_PRODUCTO']; ?></td>
                                        <td><?php echo $product['DESCRIPCION']; ?></td>
                                        <td><?php echo $product['TIPO_PRODUCTO']; ?></td>
                                        <td><?php echo $product['LABORATORIO']; ?></td>
                                        <td><?php echo $product['COSTO']; ?></td>
                                        <td><?php echo $product['PRECIO_VENTA']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-circle btn-primary bx bxs-file-plus"></button>
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

<?php
require_once "parte_inferior.php";
?>
