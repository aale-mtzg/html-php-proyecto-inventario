<?php

include('conexion_db.php');

$select = "SELECT * FROM activos";
$activo = mysqli_query($conexion, $select);

?>

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

		<title>Inicio</title>

		
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
					<div class="header-logos">
						<img src="img/itcj-escudo-rojo.png"  class="" alt="">
						<img src="img/logo-TNM.png"  class="" alt="">
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
						<i class="fas fa-user-check"></i>
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
				<H1>Inventario:</H1>
				<table class="table table-dark">
					<thead>
						<tr>
							<th scope="col">No.Serial</th>
							<th scope="col">Estatus</th>
							<th scope="col">Ubicacion</th>
							<th scope="col">No. Serial Disp</th>
							<th scope="col">No. Serial TecNM</th>
							<th scope="col">Tipo Activo</th>
							<th scope="col">Nombre</th>
							<th scope="col">Fecha Alta</th>
							<th scope="col">Marca</th>
							<th scope="col">Modelo</th>
							<th scope="col">Color</th>
							<th scope="col">Descripcion</th>
							<th scope="col">Imagen</th>
							<th scope="col">QR</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($getresultado = $activo->fetch_assoc()) { ?>
							<tr>
								<th scope="row"> <?php echo $getresultado['idx_numeroSerial'] ?> </th>
								<td><?php echo $getresultado['idx_estatus'] ?></td>
								<td><?php echo $getresultado['idx_ubicacion'] ?></td>
								<td><?php echo $getresultado['numero_serial_dispositivo'] ?></td>
								<td><?php echo $getresultado['numero_serial_tecNM'] ?></td>
								<td><?php echo $getresultado['tipo_activo'] ?></td>
								<td><?php echo $getresultado['nombre_activo'] ?></td>
								<td><?php echo $getresultado['fecha_alta'] ?></td>
								<td><?php echo $getresultado['marca'] ?></td>
								<td><?php echo $getresultado['modelo'] ?></td>
								<td><?php echo $getresultado['color'] ?></td>
								<td><?php echo $getresultado['descripcion_activo'] ?></td>
								<td>
									<img src="data/:image/jpeg:base64, <?php echo base64_encode($getresultado['imagen_activo']) ?>">
									
								</td>
								<td><?php echo $getresultado['imagen_codigo_qr'] ?></td>
								
								
							</tr>
						<?php } ?>
					</tbody>
				</table>
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
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

		<script type="text/javascript">
		$(document).ready(function(){
			$(".sidebar-btn").click(function(){
				$(".wrapper").toggleClass("collapse");
			});
		});
		</script>
	</body>
</html>