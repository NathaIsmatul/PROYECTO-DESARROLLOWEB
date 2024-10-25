<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Distribuidora Sebaot</title>

    <!-- Custom fonts for this template -->
    <link href="static/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../static/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="static/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url_for('index') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3">Distribuidora Sebaot</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url_for('index') }}">
                    <i class="fa fa-home"></i>
                    <span>Principal</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Clientes</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="{{ url_for('clientes') }}">Clientes</a>
                        <a class="collapse-item" href="{{ url_for('pedidos') }}">Pedidos</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Modulos
            </div>

            

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url_for('productos') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Productos</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ url_for('pedidos') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Pedidos</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            
                        </li>



                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Jose Guillermo Sut</span>
                                <img class="img-profile rounded-circle"
                                    src="static/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

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
                                    <p class="card-text"><strong>Número de Pedido: </strong><span id="numeroPedido">12345</span></p>
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
                                    <div class="form-group col-md-6">
                                        <label for="municipioCliente"><strong>Municipio</strong></label>
                                        <input type="text" class="form-control" id="municipioCliente" placeholder="Municipio">
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
     

    <!-- Bootstrap core JavaScript-->
    <script src="static/vendor/jquery/jquery.min.js"></script>
    <script src="static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="static/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="static/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="static/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="static/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="static/js/demo/datatables-demo.js"></script>



    <!-- Script para consumir el API y llenar la tabla de clientes -->
    <script>

        jQuery.noConflict(); // Activa el modo no conflicto


        (function($) { 
        $(document).ready(function() {
            $('#clientesModal').on('shown.bs.modal', function () {
                $.ajax({
                    url: '/listado_clientes',
                    method: 'GET',
                    success: function(data) {
                        var clientesTable = $('#clientesTable tbody');
                        clientesTable.empty();
                        data.forEach(function(cliente) {
                            var row = '<tr>' +
                                '<td>' + cliente.Codigo + '</td>' +
                                '<td>' + cliente.Nombre + '</td>' +
                                '<td>' + cliente.Nombre_Negocio + '</td>' +
                                '<td>' + cliente.NIT + '</td>' +
                                '<td>' + cliente.Direccion + '</td>' +
                                '<td>' + cliente.Municipio + '</td>' +
                                '<td><button type="button" class="btn btn-primary seleccionar-cliente" data-codigo="' + cliente.Codigo + '" data-nombre="' + cliente.Nombre + '" data-nombre_negocio="' + cliente.Nombre_Negocio + '" data-nit="' + cliente.NIT + '" data-direccion="' + cliente.Direccion + '" data-municipio="' + cliente.Municipio + '">Seleccionar</button></td>' +
                                '</tr>';
                            clientesTable.append(row);
                        });
                    },
                    error: function() {
                        alert('Error al cargar los clientes');
                    }

                });
            });

            // Evento para seleccionar un cliente y llenar los campos del formulario
            $(document).on('click', '.seleccionar-cliente', function() {
                var codigo = $(this).data('codigo');
                var nombre = $(this).data('nombre');
                var nombreNegocio = $(this).data('nombre_negocio');
                var nit = $(this).data('nit');
                var direccion = $(this).data('direccion');
                var municipio = $(this).data('municipio');

                $('#codigoCliente').val(codigo);
                $('#nombreCliente').val(nombre);
                $('#nombreNegocio').val(nombreNegocio);
                $('#nitCliente').val(nit);
                $('#direccionCliente').val(direccion);
                $('#municipioCliente').val(municipio);

                $('#clientesModal').modal('hide');
            });

            // Evento para buscar clientes en la tabla
            $('#buscarCliente').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('#clientesTable tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    })(jQuery);
    </script>



<script>

    jQuery.noConflict(); // Activa el modo no conflicto  
    
    

    // Función para obtener el número de pedido desde el API
    async function obtenerNumeroPedido() {
        try {
            console.log('Solicitando número de pedido...');
            const response = await fetch('/numero_pedido');

            if (!response.ok) {
                console.error('Error en la respuesta:', response.statusText);
                return;
            }

            const data = await response.json();
            console.log('Datos recibidos:', data); // Muestra los datos recibidos

            if (data.ultimo_numero_pedido) {
                document.getElementById('numeroPedido').innerText = data.ultimo_numero_pedido;
                console.log('Número de pedido actualizado:', data.ultimo_numero_pedido);
            } else {
                console.error('No se recibió el número de pedido');
            }
        } catch (error) {
            console.error('Error al obtener el número de pedido:', error);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        obtenerNumeroPedido(); // Llamar a la función al cargar el DOM

    
    
    $(document).ready(function() {
        // Autocompletar para el campo de producto
        $("#producto").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "/buscar_productos",
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function(data) {
                        response(data.map(function(item) {
                            return {
                                label: item.Descripcion_producto, // Mostrar el nombre del producto
                                value: item.Descripcion_producto, // Mostrar el nombre del producto en el campo de producto
                                presentacion: item.Presentacion, // Presentación del producto
                                codigo: item.Codigo, // Código del producto
                                precio: item.Precio, // Precio del producto
                                stock: item.Stock // Stock del producto
                                
                            };
                        }));
                    },
                    error: function() {
                        response([]);
                    }
                });
            },
            minLength: 2, // Número mínimo de caracteres para activar la búsqueda
            select: function(event, ui) {
                var stockDisponible = ui.item.stock;
                // Validar si el stock es mayor a 0
                if (stockDisponible > 0) {
                    // Si el stock es mayor a 0, llenar los campos correspondientes
                    $("#codigoProducto").val(ui.item.codigo); // Código del producto
                    $("#producto").val(ui.item.label); // Nombre del producto
                    $("#presentacion").val(ui.item.presentacion); // Presentación del producto
                    $("#precioProducto").val(ui.item.precio); // Precio del producto
                    $("#stockDisponible").val(stockDisponible); // Guardar el stock disponible en un campo oculto


                    
                    // Asignar la cantidad por defecto = 1
                    $("#cantidadProducto").val(1);

                    // Calcular el total automáticamente
                    var total = 1 * ui.item.precio; // 1 por defecto * precio
                    $("#totalProducto").val(total); // Asignar el total
                } else {
                    // Mostrar mensaje si no hay suficiente stock
                    alert("No hay stock suficiente para este producto.");

                    $("#codigoProducto").val(''); // Limpiar campos si no hay stock
                    $("#producto").val('');
                    $("#presentacion").val('');
                    $("#precioProducto").val('');
                    $("#cantidadProducto").val('');
                    $("#totalProducto").val('');
                }
            }
        });

        // Actualizar el total y validar el stock al cambiar la cantidad
        $("#cantidadProducto").on('input', function() {
            var cantidad = parseInt($(this).val()); // Convertir la cantidad a entero
            var precio = parseFloat($("#precioProducto").val()); // Convertir el precio a número decimal
            var stockDisponible = parseInt($("#stockDisponible").val()); // Recuperar el stock disponible como número entero

            // Permitir que el campo esté vacío temporalmente
            if (cantidad === '' || isNaN(cantidad)) {
                $("#totalProducto").val(0); // Dejar el total en 0 temporalmente si está vacío
                return; // No validar si está vacío
            }

            cantidad = parseInt(cantidad); // Convertir a número una vez no esté vacío



            if (cantidad <= stockDisponible) {
                // Si la cantidad es menor o igual al stock disponible, actualizar el total
                var total = cantidad * precio;
                $("#totalProducto").val(total);
            } else {
                // Mostrar alerta si se supera el stock
                alert("No puedes pedir más cantidad de la disponible en stock.");
                $("#cantidadProducto").val(stockDisponible); // Ajustar la cantidad al máximo disponible
                var total = stockDisponible * precio;
                $("#totalProducto").val(total); // Ajustar el total
            }
        });


        // Función para totalizar la columna Total
        function totalizarOrden() {
            var totalGeneral = 0;
            $('#detalleOrden tbody tr').each(function() {
                var total = parseFloat($(this).find('td:nth-child(6)').text()); // 6 para Total
                if (!isNaN(total)) {
                    totalGeneral += total;
                }
            });
            $('#totalGeneral').text(' Q. ' + totalGeneral.toFixed(2)); // Actualiza el total general
        }



        // Agregar producto al detalle de la orden
        $('#agregarProducto').on('click', function() {
                var codigo = $("#codigoProducto").val();
                var producto = $("#producto").val();
                var presentacion = $("#presentacion").val();
                var cantidad = parseInt($("#cantidadProducto").val());
                var precio = parseFloat($("#precioProducto").val());
                var total = parseFloat($("#totalProducto").val());

                // Validar que todos los campos están llenos
                if (!codigo || !producto || !presentacion || !cantidad || !precio || !total) {
                    alert("Por favor completa todos los campos.");
                    return;
                }

                // Agregar una nueva fila al detalle de la orden
                var row = '<tr>' +
                    '<td>' + codigo + '</td>' +
                    '<td>' + producto + '</td>' +
                    '<td>' + presentacion + '</td>' +
                    '<td>' + cantidad + '</td>' +
                    '<td>' + precio.toFixed(2) + '</td>' +
                    '<td>' + total.toFixed(2) + '</td>' +
                    '<td><button type="button" class="btn btn-danger">Eliminar</button></td>' +
                    '</tr>';
                $('#detalleOrden tbody').append(row);

                // Limpiar los campos después de agregar el producto
                $("#codigoProducto").val('');
                $("#producto").val('');
                $("#presentacion").val('');
                $("#precioProducto").val('');
                $("#cantidadProducto").val('');
                $("#totalProducto").val('');
                $("#stockDisponible").val('');

                // Totalizar después de agregar un producto
                totalizarOrden();
            });


            // Evento para manejar la eliminación de filas
            $(document).on('click', '.btn-danger', function() {
                $(this).closest('tr').remove(); // Elimina la fila correspondiente
                
                // Totalizar después de eliminar un producto
                totalizarOrden();
            
            });


            // Obtener la fecha actual
            const fechaActual = new Date();
            // Formatear la fecha en formato dd/mm/aaaa
            const fechaFormateada = ("0" + fechaActual.getDate()).slice(-2) + "/" + 
                            ("0" + (fechaActual.getMonth() + 1)).slice(-2) + "/" + 
                            fechaActual.getFullYear();
            // Asignar la fecha formateada al elemento correspondiente
            document.getElementById('fechaPedido').textContent = fechaFormateada;
        });


        

        


    });
</script>


    




</body>

</html>