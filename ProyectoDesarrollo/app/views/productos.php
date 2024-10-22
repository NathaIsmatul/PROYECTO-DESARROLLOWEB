<?php
require_once "parte_superior.php";

require_once '../controllers/ProductosController.php';

$ProductosController = new ProductController();

$products = $ProductosController->index();


?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Productos</h1>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-8 col-lg-7">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Listado de Productos</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="productosTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>    
                                    <th>Código</th>
                                    <th>Nombre de Producto</th>
                                    <th>Descripcion</th>
                                    <th>Tipo de Producto</th>
                                    <th>Laboratorio</th>
                                    <th>Costo</th>
                                    <th>Precio de venta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td><?php echo $product['CODIGO_PRODUCTO']; ?></td>
                                        <td><?php echo $product['NOMBRE_PRODUCTO']; ?></td>
                                        <td><?php echo $product['DESCRIPCION']; ?></td>
                                        <td><?php echo$product['TIPO_PRODUCTO']; ?></td>
                                        <td><?php echo $product['LABORATORIO']; ?></td>
                                        <td><?php echo $product['COSTO']; ?></td>
                                        <td><?php echo $product['PRECIO_VENTA']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                        </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- Donut Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detalles del Producto</h6>
                </div>
                <div class="card-body" id="productoDetalles">
                    <!-- Aquí se llenará la información del producto -->
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>

<?php
require_once "parte_inferior.php";
?>
