<?php 
require_once "parte_superior.php";
require_once '../controllers/lotesController.php';
$loteController = new loteController();
$lotes = $loteController->index();
?>

<div class="container-fluid">
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <h1 class="h3 mb-3 text-gray-800">Gestión de Lotes</h1>
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
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($lotes as $lote): ?>
                                    <tr class="<?php echo $lote['ESTADO'] == 'Vencido' ? 'table-dangercolor' : ($lote['ESTADO'] == 'Pronto a vencer' ? 'table-warningcolor' : ''); ?>">
                                        <td><?php echo $lote['CODIGO_LOTE']; ?></td>
                                        <td><?php echo $lote['UNID_ENTRANTES']; ?></td>
                                        <td><?php echo $lote['VENCIMIENTO']; ?></td>
                                        <td><?php echo $lote['PRODUCTO']; ?></td>
                                        <td><?php echo $lote['LAB']; ?></td>
                                        <td><?php echo $lote['PROVEEDOR']; ?></td>
                                        <td><?php echo $lote['COMENTARIO']; ?></td>
                                        <td><?php echo $lote['ESTADO']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-circle btn-warning bx bx-edit"
                                                data-toggle="modal" data-target="#editStock"
                                                data-lote="<?php echo $lote['CODIGO_LOTE']; ?>"
                                                data-stock="<?php echo $lote['UNID_ENTRANTES']; ?>"  
                                                onclick="editProduct(this)"></button>
                                            <button type="button" class="btn btn-sm btn-circle btn-danger bx bx-trash"
                                                data-toggle="modal" data-target="#deleteUser"
                                                data-lote="<?php echo $lote['CODIGO_LOTE']; ?>"></button>
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
    const loteID = button.getAttribute('data-lote');

    document.getElementById('editstock').value = stock;
    document.getElementById('id_lote_edit').value = loteID;
    document.getElementById('id_lote').textContent = loteID;
}

</script>

<!-- Modal para editar unidades del lote -->
<div class="modal fade" id="editStock" tabindex="-1" role="dialog" aria-labelledby="BotonEditar" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="BotonEditar">Editar Unidades del Lote</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                Código de Lote: <span id="id_lote"></span>
            </div>
            <form method="post" action="../controllers/lotesController.php">
                <input type="hidden" name="action" value="update_units">
                <input type="hidden" id="id_lote_edit" name="id">
                <div class="form-group">
                    <label>Unidades</label>
                    <input type="text" class="form-control" id="editstock" name="unidades" placeholder="Ingresa nuevo stock">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para confirmar eliminación de lote -->
<div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="btnEliminar" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="btnEliminar">¿Estás seguro de realizar esta acción?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Selecciona "Confirmar" para eliminar el lote deseado.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger" href="../controllers/lotesController.php?action=delete&id=" id="confirmDelete">Confirmar</a>
            </div>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.bx-trash').forEach(button => {
    button.addEventListener('click', function () {
        const loteID = this.getAttribute('data-lote');
        document.getElementById('confirmDelete').setAttribute('href', `../controllers/lotesController.php?action=delete&id=${loteID}`);
    });
});
</script>


<?php 
require_once "parte_inferior.php";
?>
