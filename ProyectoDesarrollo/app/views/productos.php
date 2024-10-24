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
                    <Button class=" btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addModal">
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
                                            <button type="button" class="btn btn-sm btn-circle btn-primary bx bxs-file-plus" 
                                                data-toggle="modal" data-target="#addLotes"
                                                data-nombre="<?php echo $product['NOMBRE_PRODUCTO']; ?>" 
                                                onclick="setProductName(this)"></button>
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

<script>
function setProductName(button) {
    const productName = button.getAttribute('data-nombre');
    document.getElementById('nombreProducto').textContent = productName;
}
</script>
<!-- /.container-fluid -->
<!-- Formulario para agregar productos-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="BotonAgregar"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="BotonAgregar">Agregar Productos</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center">Datos del Producto</div>
                    <form class="user">
                        <div>
                            <div class="form-group"> Nombre
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="prodNombre"
                                    placeholder="Nombre del Producto">
                            </div>
                            <div class="form-group"> Descripcion
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="prodDescrip"
                                    placeholder="Descripcion del Producto">
                            </div>
                            <div class="form-group"> Tipo de Producto
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="prodTipo"
                                    placeholder="Tipo">
                            </div>
                            <div class="form-group"> Laboratorio
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="prodLab"
                                    placeholder="Laboratorio de Origen">
                            </div>
                            <div class="form-group"> Costo
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="prodCosto"
                                    placeholder="Ingrese Costo">
                            </div>
                            <div class="form-group"> Precio de Venta
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="prodVenta"
                                    placeholder="Ingrese Precio">
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

<!-- Formulario para agregar lotes-->
<div class="modal fade" id="addLotes" tabindex="-1" role="dialog" aria-labelledby="BotonAgregar"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="BotonAgregar">Crear Lote</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center">Producto: <span id="nombreProducto"></span></div>
                    <form class="user">
                        <div>
                            <div class="form-group"> Proveedor
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="loteProv"
                                    placeholder="Nombre del Proveedor">
                            </div>
                            <div class="form-group"> Stock
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="loteStock"
                                    placeholder="Ingrese stock">
                            </div>
                            <div class="form-group"> Vencimiento
                                <input type="date" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="loteVenc"
                                    placeholder="dd/mm/aaaa">
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
require_once "parte_inferior.php";
?>
