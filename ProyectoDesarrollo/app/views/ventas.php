<?php 
require_once "parte_superior.php";
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <!-- Sección de encabezado "Toma de Pedidos" -->
                        <div class="col-md-6">
                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800">Toma de Pedidos</h1>
                            <p class="mb-4">Complete el formulario para registrar un nuevo pedido.</p>
                        </div>
                    
                        <!-- Tarjeta con número de pedido y fecha -->
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <p class="card-text"><strong>Número de Pedido: </strong><span id="numeroPedido"></span></p>
                                    <p class="card-text"><strong>Estado: </strong><span id="estadoPedido">Abierto</span></p>
                                    <p class="card-text"><strong>Fecha: </strong><span id="fechaPedido"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Formulario de Toma de Pedidos -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Formulario de Toma de Pedidos</h6>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="codigoCliente"><strong>Código de Cliente</strong></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="codigoCliente" placeholder="0000" maxlength="6">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#clientesModal">Buscar</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label for="nombreCliente"><strong>Nombre de Cliente</strong></label>
                                        <input type="text" class="form-control" id="nombreCliente" placeholder="Nombre del cliente">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nombreNegocio"><strong>Nombre Negocio</strong></label>
                                        <input type="text" class="form-control" id="nombreNegocio" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nitCliente"><strong>NIT</strong></label>
                                        <input type="text" class="form-control" id="nitCliente" maxlength="15">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="direccionCliente"><strong>Dirección</strong></label>
                                        <input type="text" class="form-control" id="direccionCliente" placeholder="Dirección del cliente">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="productos">Productos</label>
                                    <table class="table table-bordered" id="productosTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Producto</th>
                                                <th>Presentacion</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>Total</th>
                                                <th>Acciones</th>
                                                <th style="display:none;">Stock</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" id="codigoProducto" placeholder="Codigo"></td>
                                                <td><input type="text" class="form-control" id="producto" name="producto" placeholder="Producto"></td>
                                                <td><input type="text" class="form-control" id="presentacion" name="presentacion" placeholder="Presentacion"></td>
                                                <td><input type="number" class="form-control" id="cantidadProducto" placeholder="Cantidad"></td>
                                                <td><input type="number" class="form-control" id="precioProducto" placeholder="Precio"></td>
                                                <td><input type="number" class="form-control" id="totalProducto" placeholder="Total" readonly></td>
                                                <td><button type="button" id="agregarProducto" class="btn btn-primary">Agregar</button></td>
                                                <td><input type="hidden" id="stockDisponible" value=""></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <table id="detalleOrden" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Producto</th>
                                            <th>Presentación</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Total</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                                <!-- Aquí es donde agregas el total general -->
                                <div class="d-flex justify-content-end">
                                    <strong>Total General: </strong><span id="totalGeneral">0.00</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="comentarios">Comentarios:</label>
                                    <textarea id="comentarios" class="form-control" rows="3"></textarea>
                                </div>

                                <button type="submit" class="btn btn-success">Registrar Pedido</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Distribuidora Sebaot 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


     <!-- Modal para Listado de Clientes -->
     <div class="modal fade" id="clientesModal" tabindex="-1" role="dialog" aria-labelledby="clientesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="clientesModalLabel">Listado de Clientes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id="buscarCliente" class="form-control mb-3" placeholder="Buscar cliente...">
                    <table class="table table-bordered" id="clientesTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Nombre Negocio</th>
                                <th>NIT</th>
                                <th>Dirección</th>
                                <th>Municipio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Los datos se llenarán aquí dinámicamente -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
     

    <?php 
require_once "parte_inferior.php"
?>