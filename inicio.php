<?php

    include('conexion_db.php');

    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }

    $nombre = $_SESSION['nombreUsuario'];
    $tipo_usuario = $_SESSION['rol'];

?>

<!Doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!---->
        <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!--CSS-->
        <link href="css/general-navbar-sidebar-menu-styles.css" rel="stylesheet" type="text/css">
        <link href="css/inicio-styles.css" rel="stylesheet" type="text/css">
        <!--icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <title>Inicio</title>
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
                    <h1>Buscar</h1>

                    <div class="row">
                        <div class="col-md-6">
                            <form class="">
                                <div class="form-row">
                                    <div class="form-group col-8">
                                        <input type="text" class="form-control" id="" placeholder="Ingresar No. Serial...">
                                    </div>

                                    <div class="form-group col">
                                        <button type="button" class="btn btn-info camara-archivo-btn">
                                            
                                            <div class="icon"><i class="fas fa-camera"></i></div>
                                        </button>
                                    </div>
                                    <div class="form-group col">
                                        <button type="button" class="btn btn-info camara-archivo-btn">
                                            
                                            <div class="icon"><i class="fas fa-upload"></i></div>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <!--Subir -->
                                    <div class="form-group col-12">
                                        <div class="previewImagen ">
                                            <span class="delPhoto notBlock"><i class="fas fa-times"></i></span>
                                            <label for="archivoImagen"></label>
                                            <div>
                                                <div class="image-activo">
                                                    <img src="" alt="" id="img" class="oculto">
                                                </div>
                                                <div class="content" id="portada">
                                                    <i class="fas fa-qrcode icon"></i>
                                                    <div class="text">Código QR</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="upimg">
                                            <input type="file" name="archivoImagen" id="archivoImagen">
                                        </div>
                                        <div id="form_alert"></div>
                                    </div>
                                </div>
                                <div class="form-row center">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger buscar-btn">
                                            Buscar
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                    
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

        <script src="script.js">
            /*Archivo js*/ 
        </script> 

    </body>
</html>



<!--AGREGAR IMAGEN-->
<script type="text/javascript">
    $(document).ready(function(){

        //--------------------- SELECCIONAR FOTO ACTIVO ---------------------
        $("#archivoImagen").on("change",function(){
            var uploadFoto = document.getElementById("archivoImagen").value;
            var foto       = document.getElementById("archivoImagen").files;
            var nav = window.URL || window.webkitURL;
            var contactAlert = document.getElementById('form_alert');
            
                if(uploadFoto !='')
                {
                    var type = foto[0].type;
                    var name = foto[0].name;
                    if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png')
                    {
                        contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';                        
                        $("#img").remove();
                        $(".delPhoto").addClass('notBlock');
                        
                        $('#foto').val('');
                        return false;
                    }else{  
                            contactAlert.innerHTML='';
                            $("#img").remove();
                            document.getElementById("portada").style.display = "none";
                            $(".delPhoto").removeClass('notBlock');
                            var objeto_url = nav.createObjectURL(this.files[0]);
                            $(".previewImagen").append("<img id='img' src="+objeto_url+">");
                            $(".upimg label").remove();
                            
                        }
                }else{
                    alert("No selecciono foto");
                    $("#img").remove();
                }              
        });

        $('.delPhoto').click(function(){
            $('#foto').val('');
            $(".delPhoto").addClass('notBlock');
            document.getElementById("portada").style.display = "block";
            $("#img").remove();

        });

    });
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