<?php 
require_once "parte_superior.php";
require_once '../controllers/lotesController.php';
$loteController = new loteController();
$lotes = $loteController->index();
?>

<div class="container-fluid">

    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <h1 class="h3 mb-3 text-gray-800">Gestion de Lotes</h1>
    </nav>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-lg-7">

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-bold text-primary">Listado de Lotes</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>    
                                    <th>Unidades</th>
                                    <th>Vencimiento</th> 
                                    <th>Producto</th>  
                                    <th>Laboratorio</th>
                                    <th>Proveedor</th>
                                    <th>Comentario</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($lotes as $lotes): ?>
                                    <tr class="<?php echo $lotes['ESTADO'] == 'Vencido' ? 'table-dangercolor' : ($lotes['ESTADO'] == 'Pronto a vencer' ? 'table-warningcolor' : ''); ?>">
                                        <td><?php echo $lotes['CODIGO_LOTE']; ?></td>
                                        <td><?php echo $lotes['UNID_ENTRANTES']; ?></td>
                                        <td><?php echo $lotes['VENCIMIENTO']; ?></td>
                                        <td><?php echo $lotes['PRODUCTO']; ?></td>
                                        <td><?php echo $lotes['LAB']; ?></td>
                                        <td><?php echo $lotes['PROVEEDOR']; ?></td>
                                        <td><?php echo $lotes['COMENTARIO']; ?></td>
                                        <td><?php echo $lotes['ESTADO']; ?></td>
                                        <td> <!--Esta debe quedar de ultimo para las acciones  ---->
                                            <button type="button" class="btn btn-sm btn-circle btn-warning bx bx-edit"
                                                data-toggle="modal" data-target="#editStock"
                                                data-lote="<?php echo $lotes['CODIGO_LOTE']; ?>"
                                                data-stock="<?php echo $lotes['UNID_ENTRANTES']; ?>"  
                                                onclick="editProduct(this)"></button>

                                            <button type="button" class="btn btn-sm btn-circle btn-danger bx bx-trash"
                                                data-toggle="modal" data-target="#deleteUser"></button>
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
<script>
function editProduct(button) {
    const stock = button.getAttribute('data-stock');

    document.getElementById('editstock').value = stock;

    const loteID = button.getAttribute('data-lote');
    document.getElementById('id_lote').textContent = loteID;
}
</script>

<!-- Formulario para editar productos Btn-->
<div class="modal fade" id="editStock" tabindex="-1" role="dialog" aria-labelledby="BotonEditar"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="BotonEditar">Editar Stock</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center">Codigo de Lote:<span id="id_lote"></span></div>
                    <form class="user">
                        <div>
                        <div class="form-group"> Stock
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="editstock"
                                    placeholder="Ingresa Stock nuevo">
                            </div>
                        </div>
                    </form>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" action="" >Editar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Btn alerta para eliminar producto-->
<div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="btnEliminar"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="btnEliminar">¿Estas seguro de realizar esta accion?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Selecciona "Confirmar" para eliminar el usuario deseado </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger" action="">Confirmar</a>
            </div>
        </div>
    </div>
</div>

<?php 
require_once "parte_inferior.php"
?>