<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--CSS-->
		<link rel="stylesheet" href="css/inicio-style.css">
		<!---->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
		<!--Iconos-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
			crossorigin="anonymous">
        <!--Estilo de fuente-->
        
        <!--inventario
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>-->

		<title>Inventario</title>
	</head>
	<body>

		<!--wrapper start-->
		<div class="wrapper">
			<!--header menu start-->
			<div class="header">
				<div class="header-menu">
					<div class="title">Control de <span>Inventario</span></div>
					<div class="sidebar-btn">
						<i class="fas fa-bars"></i>
					</div>
					<ul>
						<!--Cerrar sesion-->
						<li><a href="index.php"><i class="fas fa-sign-out-alt"></i></a></li>
					</ul>
				</div>
			</div>
			<!--header menu end-->
			
			<!--sidebar start-->
			<div class="sidebar">
				<div class="sidebar-menu">
					<center class="profile">
						<img src="img/itcj-escudo-rojo.png.jpg" alt="">
						<p>Administrador</p>
					</center>
					<li class="item">
						<a href="inicio.php" class="menu-btn">
							<i class="fas fa-door-open"></i></i><span>Inicio</span>
						</a>
					</li>
					<!--Pendiente arreglar ligas "profile"-->
					<li class="item" id="profile">
						<a href="#profile" class="menu-btn">
							<i class="far fa-clipboard"></i><span>Movimientos<i class="fas fa-chevron-down drop-down"></i></span>
						</a>
						<div class="sub-menu">
							<a href="cambioUbicacion.php"><i class="fas fa-thumbtack"></i><span>Cambio de Ubicacion</span></a>
							<a href="prestamo.php"><i class="fas fa-people-carry"></i><span>Prestamo</span></a>
							<a href="bajas.php"><i class="fas fa-trash-alt"></i><span>Bajas</span></a>
						</div>
					</li>
					<!--Pendiente arreglar ligas"messages"-->
					<li class="item" id="messages">
						<a href="#messages" class="menu-btn">
							<i class="fas fa-plus"></i><span>Nuevo Registro<i class="fas fa-chevron-down drop-down"></i></span>
						</a>
						<div class="sub-menu">
							<a href="registroEquipo.php"><i class="fas fa-desktop"></i><span>Registro Equipo</span></a>
							<a href="registroMobiliario.php"><i class="fas fa-chair"></i><span>Registro Mobiliario</span></a>
							<a href="registroConsumibles.php"><i class="fas fa-microchip"></i></i><span>Registro Consumibles</span></a>
						</div>
					</li>
					<li class="item">
						<a href="inventario.php" class="menu-btn">
							<i class="fas fa-box-open"></i></i><span>Inventario</span>
						</a>
					</li>
					<li class="item">
						<a href="ubicaciones.php" class="menu-btn">
							<i class="fas fa-map-marked-alt"></i><span>Ubicaciones</span>
						</a>
					</li>
					<li class="item">
						<a href="reportes.php" class="menu-btn">
							<i class="fas fa-info-circle"></i><span>Reportes</span>
						</a>
					</li>
					<!--Pendiente arreglar ligas"settings"-->
					<li class="item" id="settings">
						<a href="#settings" class="menu-btn">
							<i class="fas fa-cog"></i><span>Configuraciones<i class="fas fa-chevron-down drop-down"></i></span>
						</a>
						<div class="sub-menu">
							<a href="usuarios.php"><i class="fas fa-users"></i><span>Usuarios</span></a>
							<a href="ubicaciones.php"><i class="fas fa-map-marker-alt"></i><span>Ubicaciones</span></a>
						</div>
					</li>
					
				</div>
			</div>
			<!--sidebar end-->


			<!--main container start-->
			<div class="main-container">
              <!--  <h3 align="center">How to use Tabledit plugin with jQuery Datatable in PHP Ajax</h3> -->
                <br />
                <div class="panel panel-default">
                    <div class="panel-heading">Inventario</div>
                    <div class="panel-body">
                    <div class="table-responsive">
                    <table id="sample_data" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th>Id_activo</th>
                        <th>Numero Serial</th>
                        <th>Numero Serial Dispositivo</th>
                        <th>Numero Serial TecNM</th>
                        <th>Tipo activo</th>
                        <th>Tipo ubicacion</th>
                        <th>nombre ubicacion</th>
                        <th>tipo estatus</th>
                        <th>marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                        <th>Descripcion</th>
                        <th>imagen</th>
                        <th>Qr</th>
                        
                        </tr>
                    </thead>
                    <tbody></tbody>
                    </table>
                    </div>
                    </div>
                </div>
               
			</div>
			<!--main container end-->
		</div>
		<!--wrapper end-->

		<!--JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
		<script type="text/javascript">
		$(document).ready(function(){
			$(".sidebar-btn").click(function(){
				$(".wrapper").toggleClass("collapse");
			});
		});
        </script>
        
        <!--SCRIPT INVENTARIO-->
        <script type="text/javascript" language="javascript" >
        $(document).ready(function(){

        var dataTable = $('#sample_data').DataTable({
        "processing" : true,
        "serverSide" : true,
        "order" : [],
        "ajax" : {
        url:"fetch.php",
        type:"POST"
        }
        });

        $('#sample_data').on('draw.dt', function(){
        $('#sample_data').Tabledit({
        url:'action.php',
        dataType:'json',
        columns:{
            identifier : [0, 'id'],
            editable:[[1, 'first_name'], [2, 'last_name'], [3, 'gender', '{"1":"Male","2":"Female"}']]
        },
        restoreButton:false,
        onSuccess:function(data, textStatus, jqXHR)
        {
            if(data.action == 'delete')
            {
            $('#' + data.id).remove();
            $('#sample_data').DataTable().ajax.reload();
            }
        }
        });
        });
        
        }); 
        </script>
	</body>
</html>
