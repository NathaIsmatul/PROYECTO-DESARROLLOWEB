<?php
require_once "parte_superior.php";

require_once '../controllers/ProductosController.php';

$ProductosController = new ProductController();

$products = $ProductosController->index();
$Ptipo = $ProductosController->Tproducto();
$laboratorio = $ProductosController->laboratorio();
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
                    <Button class=" btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addProd">
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
                                    <th>Stock</th>
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
                                        <td><?php echo $product['STOCK']; ?></td>
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

                                            <button type="button" class="btn btn-sm btn-circle btn-warning bx bx-edit"
                                                data-toggle="modal" data-target="#editProd"
                                                data-id="<?php echo $product['CODIGO_PRODUCTO']; ?>"
                                                data-nombre="<?php echo $product['NOMBRE_PRODUCTO']; ?>" 
                                                data-descripcion="<?php echo $product['DESCRIPCION']; ?>" 
                                                data-tipo="<?php echo $product['TIPO_PRODUCTO']; ?>" 
                                                data-laboratorio="<?php echo $product['LABORATORIO']; ?>" 
                                                data-costo="<?php echo $product['COSTO']; ?>" 
                                                data-precio="<?php echo $product['PRECIO_VENTA']; ?>" 
                                                onclick="editProduct(this)">
                                            </button>
                                            <button type="button" class="btn btn-sm btn-circle btn-danger bx bx-trash"
                                                data-toggle="modal" data-target="#deleteProd"
                                                data-id="<?php echo $product['CODIGO_PRODUCTO']; ?>" 
                                                onclick="confirmDelete(this)">
                                            </button>
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
<!-- Formulario para agregar productos-->
<div class="modal fade" id="addProd" tabindex="-1" role="dialog" aria-labelledby="BotonAgregar" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="BotonAgregar">Crear Perfil</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">Datos del perfil</div>
            <form action="../controllers/ProductosController.php" method="POST">
                <input type="hidden" name="action" value="add"> <!-- Este campo es importante -->
                <div class="form-group">
                    <label for="addNombre">Nombre</label>
                    <input type="text" class="form-control" id="addNombre"
                           name="nombre" placeholder="Nombre del Producto" required>
                </div>
                <div class="form-group">
                    <label for="addDescripcion">Descripcion</label>
                    <input type="text" class="form-control" id="addDescrip"
                           name="descripcion" placeholder="Descripcion del Producto" required>
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo del Producto</label>
                    <input type="text" class="form-control" id="addTipo"
                           name="tipo" placeholder="Ingrese el tipo" required>        
                </div>
                
                <div class="form-group">
                    <label for="addLab">Laboratorio</label>
                    <input type="text" class="form-control" id="addLab"
                           name="laboratorio" placeholder="Laboratorio de Origen" required>
                </div>
                <div class="form-group">
                    <label for="addCosto">Costo</label>
                    <input type="text" class="form-control" id="addCosto"
                           name="costo" placeholder="Ingrese Costo" required>
                </div>
                <div class="form-group">
                    <label for="addVenta">Precio de Venta</label>
                    <input type="text" class="form-control" id="addVenta"
                           name="venta" placeholder="Ingrese Precio" required>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button> <!-- El botón debe ser type="submit" -->
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Funcion para tomar nombre del producto-->
<script>
function setProductName(button) {
    const productName = button.getAttribute('data-nombre');
    document.getElementById('nombreProducto').textContent = productName;
}
</script>

<!-- Formulario para agregar lotes-->
<div class="modal fade" id="addLotes" tabindex="-1" role="dialog" aria-labelledby="BotonAgregarL"
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

<!-- Modal para Editar Productos -->
<div class="modal fade" id="editProd" tabindex="-1" role="dialog" aria-labelledby="BotonEditar" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="BotonEditar">Editar Producto</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">Datos del Producto</div>
            <form action="../controllers/ProductosController.php" method="POST">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" id="editId">
                <div class="form-group">
                    <label for="editNombre">Nombre</label>
                    <input type="text" class="form-control" id="editNombre" name="nombre" placeholder="Nombre del Producto">
                </div>
                <div class="form-group">
                    <label for="editDescrip">Descripcion</label>
                    <input type="text" class="form-control" id="editDescrip" name="descripcion" placeholder="Descripcion del Producto">
                </div>
                <div class="form-group">
                    <label for="editTipo">Tipo de Producto</label>
                    <input type="text" class="form-control" id="editTipo" name="tipo" placeholder="Tipo">
                </div>
                <div class="form-group">
                    <label for="editLab">Laboratorio</label>
                    <input type="text" class="form-control" id="editLab" name="laboratorio" placeholder="Laboratorio de Origen">
                </div>
                <div class="form-group">
                    <label for="editCosto">Costo</label>
                    <input type="text" class="form-control" id="editCosto" name="costo" placeholder="Ingrese Costo">
                </div>
                <div class="form-group">
                    <label for="editVenta">Precio de Venta</label>
                    <input type="text" class="form-control" id="editVenta" name="precio" placeholder="Ingrese Precio">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editProduct(button) {
    const id = button.getAttribute('data-id');
    const nombre = button.getAttribute('data-nombre');
    const descripcion = button.getAttribute('data-descripcion');
    const tipo = button.getAttribute('data-tipo');
    const laboratorio = button.getAttribute('data-laboratorio');
    const costo = button.getAttribute('data-costo');
    const precio = button.getAttribute('data-precio');

    document.getElementById('editId').value = id;
    document.getElementById('editNombre').value = nombre;
    document.getElementById('editDescrip').value = descripcion;
    document.getElementById('editTipo').value = tipo;
    document.getElementById('editLab').value = laboratorio;
    document.getElementById('editCosto').value = costo;
    document.getElementById('editVenta').value = precio;
}
</script>


<!-- Modal para Confirmar Eliminación -->
<div class="modal fade" id="deleteProd" tabindex="-1" role="dialog" aria-labelledby="botonEliminar" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="botonEliminar">Eliminar Producto</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">¿Estás seguro de que deseas eliminar este producto?</div>
            <form action="../controllers/ProductosController.php" method="POST">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" id="deleteProductId">
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function confirmDelete(button) {
    const productId = button.getAttribute('data-id');
    document.getElementById('deleteProductId').value = productId;
}
</script>

<?php
require_once "parte_inferior.php";
?>
