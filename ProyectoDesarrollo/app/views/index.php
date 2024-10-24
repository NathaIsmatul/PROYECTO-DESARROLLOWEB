<?php 
require_once "parte_superior.php"
?>

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" data-toggle="modal" data-target="#logoutModal""
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <button class=" btn btn-primary mr-2 d-none d-lg-inline big">Cerrar Sesion</button>
            </a>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro de Cerrar Sesion?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona "Cerrar Sesion" si deseas salir de la pagina</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="../../public/login.php">Cerrar Sesion</a>
                </div>
            </div>
        </div>
    </div>

<div class="container">
    <h1>Contenido Principal</h1>
</div>
<?php 
require_once "parte_inferior.php"
?>