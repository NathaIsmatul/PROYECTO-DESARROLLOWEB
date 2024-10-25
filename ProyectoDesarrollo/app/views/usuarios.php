<?php 
require_once "parte_superior.php";
require_once '../controllers/userController.php';
$UserController = new UserController();
$user = $UserController->index();

?>
<div class="container-fluid">

    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <h1 class="h3 mb-3 text-gray-800">Gestion de Usuarios</h1>
    </nav>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-lg-7">

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-bold text-primary">Listado de Usuarios</h6>
                    <Button class=" btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addUser">
                        <i class="bx bxs-file-plus"></i>Agregar Usuario
                    </Button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>    
                                    <th>UserName</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Contraseña</th>
                                    <th>Fecha de Registro</th>
                                    <th>Perfil de Usuario</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($user as $usuario): ?>
                                    <tr>
                                        <td><?php echo $usuario['CODIGO_USUARIO']; ?></td>
                                        <td><?php echo $usuario['USUARIO']; ?></td>
                                        <td><?php echo $usuario['NOMBRE']; ?></td>
                                        <td><?php echo $usuario['APELLIDO']; ?></td>
                                        <td><?php echo $usuario['CLAVE']; ?></td>
                                        <td><?php echo $usuario['FECHA_REGISTRO']; ?></td>
                                        <td><?php echo $usuario['DES_PERFIL']; ?></td>
                                        <td> <!--Esta debe quedar de ultimo para las acciones  ---->
                                            <button type="button" class="btn btn-sm btn-circle btn-warning bx bx-edit"
                                                data-toggle="modal" data-target="#editUser"
                                                data-usuario="<?php echo $usuario['USUARIO']; ?>" 
                                                data-nombre="<?php echo $usuario['NOMBRE']; ?>" 
                                                data-apellido="<?php echo $usuario['APELLIDO']; ?>" 
                                                data-clave="<?php echo $usuario['CLAVE']; ?>"
                                                data-perfil="<?php echo $usuario['DES_PERFIL']; ?>"  
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
 <!-- Agregar Proveedores - Btn -->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="BotonAgregar"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="BotonAgregar">Agregar Usuario</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center">Datos del Usuario</div>
                    <form class="user">
                        <div>
                            <div class="form-group"> Username
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="usName"
                                    placeholder="Ingresa nombre de Usuario">
                            </div>
                            <div class="form-group"> Nombre
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="usNombre"
                                    placeholder="Nombre del Usuario">
                            </div>
                            <div class="form-group"> Apellido
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="usApellido"
                                    placeholder="Apellido del Usuario">
                            </div>
                            <div class="form-group"> Contraseña
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="usPass"
                                    placeholder="Ingrese Contraseña">
                            </div>
                            <div class="form-group"> Fecha de Registro
                                <input type="date" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="usFecha"
                                    placeholder="dd/mm/aaaa">
                            </div>
                            <div class="form-group"> Perfil
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="usPerfil"
                                    placeholder="Perfil del Usuario">
                            </div>
                        </div>
                    </form>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" action=""  >Agregar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function editProduct(button) {
    const username = button.getAttribute('data-usuario');
    const nombre = button.getAttribute('data-nombre');
    const apellido = button.getAttribute('data-apellido');
    const contraseña = button.getAttribute('data-clave');
    const perfil = button.getAttribute('data-perfil');;

    document.getElementById('editName').value = username;
    document.getElementById('editNombre').value = nombre;
    document.getElementById('editApellido').value = apellido;
    document.getElementById('editPass').value = contraseña;
    document.getElementById('editPerfil').value = perfil;
}

</script>

<!-- Formulario para editar productos Btn-->
<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="BotonEditar"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="BotonEditar">Editar datos de Usuario</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center">Datos del Producto</div>
                    <form class="user">
                        <div>
                        <div class="form-group"> Username
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="editName"
                                    placeholder="Ingresa nombre de Usuario">
                            </div>
                            <div class="form-group"> Nombre
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="editNombre"
                                    placeholder="Nombre del Usuario">
                            </div>
                            <div class="form-group"> Apellido
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="editApellido"
                                    placeholder="Apellido del Usuario">
                            </div>
                            <div class="form-group"> Contraseña
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="editPass"
                                    placeholder="Ingrese Contraseña">
                            </div>
                            <div class="form-group"> Perfil
                                <input type="text" class="form-control form-control-user col-sm-8 mb-3 mb-sm-0" id="editPerfil"
                                    placeholder="Perfil del Usuario">
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