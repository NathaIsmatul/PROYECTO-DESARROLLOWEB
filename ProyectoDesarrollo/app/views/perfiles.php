<?php 
require_once "parte_superior.php";
require_once '../controllers/perfilControllers.php';
$PerfilController = new PerfilController();
$perfil = $PerfilController->index();
?>
<div class="container-fluid">

    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <h1 class="h3 mb-3 text-gray-800">Gestion de Perfiles</h1>
    </nav>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-lg-7">

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-bold text-primary">Pefiles</h6>
                    <Button class=" btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addPerfil">
                        <i class="bx bxs-file-plus"></i>Agregar Perfil
                    </Button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>    
                                    <th>Perfil</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($perfil as $perfil): ?>
                                    <tr>
                                        <td><?php echo $perfil['CODIGO_PERFIL']; ?></td>
                                        <td><?php echo $perfil['DESCRIPCION']; ?></td>
                                        <td> <!--Esta debe quedar de ultimo para las acciones  ---->
                                            <button type="button" class="btn btn-sm btn-circle btn-warning bx bx-edit"
                                                data-toggle="modal" data-target="#editPerfil"
                                                data-id="<?php echo $perfil['CODIGO_PERFIL']; ?>"
                                                data-descripcion="<?php echo $perfil['DESCRIPCION']; ?>" 
                                                onclick="editPerfil(this)"></button>
                                            <button type="button" class="btn btn-sm btn-circle btn-danger bx bx-trash"
                                                data-toggle="modal" data-target="#deletePerfil"
                                                data-id="<?php echo $perfil['CODIGO_PERFIL']; ?>"
                                                onclick="confirmDelete(this)"></button>
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
 <!-- Agregar perfiles - Btn -->
 <div class="modal fade" id="addPerfil" tabindex="-1" role="dialog" aria-labelledby="BotonAgregar" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="BotonAgregar">Crear Perfil</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">Datos del perfil</div>
            <form action="../controllers/perfilControllers.php" method="POST">
                <input type="hidden" name="action" value="add"> <!-- Este campo es importante -->
                <div class="form-group">
                    <label for="addPerfil">Perfil</label>
                    <input type="text" class="form-control" id="addPerfil"
                           name="descripcion" placeholder="Agregue un perfil nuevo" required>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button> <!-- El botón debe ser type="submit" -->
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editPerfil(button) {
    const Idperfil = button.getAttribute('data-id');
    const descripcion = button.getAttribute('data-descripcion');

    document.getElementById('editId').value = Idperfil;
    document.getElementById('edit-perfil').value = descripcion;
}
</script>

<!-- Formulario para editar productos Btn-->
<div class="modal fade" id="editPerfil" tabindex="-1" role="dialog" aria-labelledby="BotonEditar" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="BotonEditar">Editar Producto</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">Datos del Producto</div>
            <form action="../controllers/perfilControllers.php" method="POST">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" id="editId">
                <div class="form-group">
                    <label for="editNombre">Perfil</label>
                    <input type="text" class="form-control" id="edit-perfil" name="descripcion"
                    placeholder="Asigne Perfil">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Funcion para la toma de datos -->
<script>
function confirmDelete(button) {
    const perfilId = button.getAttribute('data-id');
    document.getElementById('deletePerfilId').value = perfilId;
}
</script>

<!-- Modal para Confirmar Eliminación -->
<div class="modal fade" id="deletePerfil" tabindex="-1" role="dialog" aria-labelledby="botonEliminar" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="botonEliminar">Eliminar Producto</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">¿Estás seguro de que deseas eliminar este producto?</div>
            <form action="../controllers/perfilControllers.php" method="POST">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" id="deletePerfilId">
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>


</div>
<?php 
require_once "parte_inferior.php"
?>