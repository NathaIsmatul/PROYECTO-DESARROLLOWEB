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
                                                data-perfil="<?php echo $perfil['DESCRIPCION']; ?>" 
                                                onclick="editPerfil(this)"></button>
                                            <button type="button" class="btn btn-sm btn-circle btn-danger bx bx-trash"
                                                data-toggle="modal" data-target="#deletePerfil"></button>
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
 <!-- Agregar Proveedores - Btn -->
<div class="modal fade" id="addPerfil" tabindex="-1" role="dialog" aria-labelledby="BotonAgregar"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="BotonAgregar">Crear Perfil</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center">Datos del perfil</div>
                    <form class="user">
                        <div>
                            <div class="form-group"> Perfil
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="provNombre"
                                    placeholder="Agregue un perfil nuevo">
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

<script>
function editPerfil(button) {
    const perfil = button.getAttribute('data-perfil');
    document.getElementById('editperfil').value = perfil;
}
</script>

<!-- Formulario para editar productos Btn-->
<div class="modal fade" id="editPerfil" tabindex="-1" role="dialog" aria-labelledby="BotonEditar"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="BotonEditar">Editar datos de Perfil</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center">Datos del perfil</div>
                    <form class="user">
                        <div>
                            <div class="form-group"> Perfil
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="editperfil"
                                    placeholder="Ingrese el nuevo perfil">
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
<div class="modal fade" id="deletePerfil" tabindex="-1" role="dialog" aria-labelledby="btnEliminar"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="btnEliminar">¿Estas seguro de realizar esta accion?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Selecciona "Confirmar" para eliminar el Perfil deseado </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger" action="">Confirmar</a>
            </div>
        </div>
    </div>
</div>

</div>
<?php 
require_once "parte_inferior.php"
?>