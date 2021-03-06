<?php

    include('conexion_db.php');

    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }

    $nombre = $_SESSION['nombreUsuario'];
    $tipo_usuario = $_SESSION['rol'];

    $db = new Db();

    $conexion = $db -> connect();
    $select = "SELECT * FROM ubicaciones";
    $ubicacion = $db-> Db_query($select);


    //echo '<pre>';
    //print_r($_POST);

    /*if (isset($_POST['submit'])){
        echo '123';
        
    }*/

    
 
    
?>

<!Doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!---->
        <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.  5/jquery.mCustomScrollbar.min.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!--CSS-->
        <link href="css/general-navbar-sidebar-menu-styles.css" rel="stylesheet" type="text/css">
        <link href="css/cambioUbicacion-styles.css" rel="stylesheet" type="text/css">

        <!--icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!--  Datatables  -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
        <!--  extension responsive  -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
        

        <title>Cambio de Ubicacion</title>
    </head>
    <body>
        <!--Navbar-->
        <?php include('navbar-menu.php'); ?>

        <div class="wrapper fixed-left">
            <!--Menu sidebar-->
            <?php include('sidebar-menu.php'); ?>

            
            <!--Contenido principal-->
            <div id="content" class="container tarjeta"> 
                <div class="container">
                    <!---->
                    <h1>Cambio de Ubicación</h1>
                    <div class="row">
                        <h2>Seleccionar Activo</h2>
                    </div>
                    <div class="row">
                        <form class="" action="procesarMovimiento.php" method="POST">
                            <div class="form-row">
                                <div class="form-group mr-2">
                                    <input type="text" class="form-control" id="" name="lista[]" placeholder="Ingresar No. Serial...">
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger buscar-btn" >
                                        Aceptar
                                        <i class="fas fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!--Tabla de usuarios registrados-->
                    <div class="row " id="tabla-de-activos">
                        <div class="col-lg-12">
                            <table id="example" class="table table-striped table-bordered tabla-activos" >
                                <thead class="">
                                    <tr>
                                       <!--<th scope="col">ID</th>-->
                                        <th scope="col">No. Serial</th>
                                        <th scope="col">No. Serial Disp</th>
                                        <th scope="col">No. TecNM</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Esatus</th>
                                        <th scope="col">Ubicacion Actual</th>
                                    </tr>
                                </thead>

                                    
                                <tbody> 
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                                

                            </table>
                            
                        </div>
                    </div>

                    <div class="row mt-3">
                        <!--Boton para seleccionar nueva ubicacion-->
                        <button href="" type="button"  id="ver_modal" class="btn btn-outline-secondary " data-toggle="modal" data-target="#modal-nuevaUbicacion" onclick="">
                            Seleccionar nueva ubicación
                        </button>
                        
                    </div>
                </div>
            </div>

        </div>
        
        <!-- Modal: Seleccionar nueva ubicacion-->
        <div class="modal fade" id="modal-nuevaUbicacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <H2 class="modal-title" id="exampleModalLongTitle">Nueva Ubicación</H2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form>
                                
                                <div class="form-row">
                                    <!--Informacion de ubicacion-->
                                    <div class="form-group col-md-12">
                                        <label for="tipoUbicacion">Ubicación</label> <!--Tipo/Nobre ubicacion-->
                                        <select class="form-control" id="tipoUbicacion" name="tipoUbicacion" >
                                            <?php // TODO ESTA LINEA DE CODIGO SOLO ES PARA TRAER LOS DATOS DE MIS TABLAS CON LA LLAVE FORANEA
                                                $get_ubicaciones = "SELECT * FROM ubicaciones";
                                                $consulta = $db -> Db_query($get_ubicaciones);
                                                while($fila=$consulta->fetch_array()){ //recorre el arreglo
                                                    echo "<option value ='".$fila['id_ubicacion']."'>".$fila['tipo_ubicacion']." ".$fila['nombre_ubicacion']."</option>"; //muestra los datos de la tabla externa
                                                }
                                            ?>
                                        <option value="">No especificado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-btns-acciones">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" href="" value="" name="action" id="" class="btn btn-success">Aceptar</button>
                                
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
            
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
        <!--   Datatables-->
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>  
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>  
        <!-- extension responsive y de bootstrap 4-->
        <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
        
         <!--SweetAlert-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>   
 
        <script src="script.js">
            /*Archivo js*/ 
        </script>

    </body>
</html>

<script src="js/datatables.js">
    /*Archivo js para plugin datatables*/ 
</script>

<script src="js/funciones.js">
    /*Archivo js para plugin datatables*/ 
</script>

<!--FUNCIONAMIENTO PARA MENU NAVBAR-->
<script>
    const menuBtn = document.querySelector(".menu-navbar span");
    const logoutBtn = document.querySelector(".logout-icon-navbar");
    const cancelBtn = document.querySelector(".cancel-icon");
    const items = document.querySelector(".nav-items");
    const form = document.querySelector("form");

    menuBtn.onclick = ()=>{
        items.classList.add("active");
        menuBtn.classList.add("hide");
        logoutBtn.classList.add("hide");
        cancelBtn.classList.add("show");    
    }
    cancelBtn.onclick = ()=>{
        items.classList.remove("active");
        menuBtn.classList.remove("hide");
        logoutBtn.classList.remove("hide");
        cancelBtn.classList.remove("show");
        
        cancelBtn.style.color = "#ff3d00";
    }
    searchBtn.onclick = ()=>{
        logoutBtn.classList.add("hide");
        cancelBtn.classList.add("show");
    }

</script>