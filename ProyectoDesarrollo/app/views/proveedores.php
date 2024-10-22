<?php 
require_once "parte_superior.php"
?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Proveedores</h1>

<!-- Content Row -->
<div class="row">

    <div class="col-xl-10 col-lg-7">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Listado de Proveedores</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="productosTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>    
                                <th>Nombre de Proveedor</th>
                                <th>Telefono</th>  <!-- Esta columna está oculta, pero aún debe estar presente en el <thead> -->
                                <th>Direccion</th>  <!-- Esta columna está oculta, pero aún debe estar presente en el <thead> -->
                                <th>Correo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí se llenará la tabla dinámicamente -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
<!-- /.container-fluid -->

</div>
<?php 
require_once "parte_inferior.php"
?>