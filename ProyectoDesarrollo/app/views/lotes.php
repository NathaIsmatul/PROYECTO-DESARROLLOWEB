<?php 
require_once "parte_superior.php"
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
                                <!----foreach --->
                                    <tr>
                                        <!------llamada de datos ----->
                                        
                                        <td> <!--Esta debe quedar de ultimo para las acciones  ---->
                                            <button type="button" class="btn btn-sm btn-circle btn-warning bx bx-edit"></button>
                                            <button type="button" class="btn btn-sm btn-circle btn-danger bx bx-trash"></button>
                                        </td>
                                    </tr>
                                <!-- fin de foreach---->
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