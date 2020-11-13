<?php
    session_start();
    if (!$_SESSION['idusuario']) {
    header("Location:../../index.php");
    }
    require_once("../../Database/consult.php");
    require_once("../../Database/connection.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>Mi datos</title>

  <!-- Bootstrap core CSS -->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--

    TemplateMo 546 Sixteen Clothing

    https://templatemo.com/tm-546-sixteen-clothing

    -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../../assets/css/fontawesome.css">
  <link rel="stylesheet" href="../../assets/css/templatemo-sixteen.css">
  <link rel="stylesheet" href="../../assets/css/owl.css">
  <link rel="stylesheet" href="../../assets/css/seeProduts.css">
  <link rel="stylesheet" href="mydata.css">
</head>
<body>
  <!-- Header -->
  <header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="../../index.php">
          <h2><em>Raffiniert</em></h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
            <!-- <img src="assets/Logo/favicon.ico" alt=""/> -->
          </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="../../index.php">Inicio
                <span class="sr-only">(current)</span>
              </a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="../../products.php">Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../about.php">Sobre nosotros</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li> -->
            <!-- USUARIO LOGUEADO -->
            <?php
            if(isset($_SESSION['idusuario'])) {?>
              <!-- <li class="nav-item">
                <a class="nav-link" href=""><?php echo $_SESSION['nombre_usuario'];?></a>
              </li> -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i>
                  <?php echo $_SESSION['nombre_usuario'];?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <p class="dropdown-item"><i class="fa fa-check"></i> Hola <?php echo $_SESSION['nombre_usuario'];?></p>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="myShopping.php">Compras</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Mis datos</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../../Controller/signOff.php">Salir</a>
                </div>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="Controller/signOff.php">Cerrar sesión</a>
              </li> -->
            <?php
            }else{?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ingresar</a>
                <form class="dropdown-menu p-5" id="formLogin" name="formLogin" method="post">
                  <div class="form-group">
                    <label for="email">Correo electronico</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
                    <div class="alert alert-danger" role="alert" id="mensajeAlert" style="display:none;">
                        
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="contraseña">Contraseña</label>
                    <input type="password" class="form-control" id="contrasenia" name="contrasenia" placeholder="Password">
                    <div class="alert alert-danger" role="alert" id="mensajeContraseña" style="display:none;">
                        
                    </div>
                  </div>
                  <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Login" />
                </form>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="contact.php">Crea tu cuenta</a>
              </li> -->
            <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <?php 

  $obj = new Crud();
  $data=$obj->setUsuario($_SESSION['idusuario']);
  ?>

    <!-- Mis datos -->
    <div class="position">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Mis datos</h2>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <!-- DATOS DE MI CUENTA TITULO -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                <h5>Datos de mi cuenta</h5>
            </div>
        </div>
    </div>
  <!-- DATOS DE MI CUENTA CONTENEDORES -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <span class="label">Usuario:</span>
                    <span class="labelPrincipal"><?=$data['nombre_usuario'];?></span>
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <div class="card">
                    <span class="label">E-mail:</span>
                    <span class="labelPrincipal"><?=$data['correo_usuario'];?></span>
                </div>
            </div>
        </div>
    </div>
  <!-- DATOS PERSONALES TITULO -->
  <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h5>Datos personales</h5>
            </div>
        </div>
  </div>
  <!-- DATOS PERSONALES CONTENEDORES -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <span class="label">Nombre:</span>
                    <span class="labelPrincipal"><?=$data['nombre_usuario'];?> <?=$data['apellido_usuario'];?></span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <span class="label">Dirección:</span>
                    <span class="labelPrincipal"><?=$data['direccion_usuario'];?></span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <span class="label">Telefono:</span>
                    <span class="labelPrincipal"><?=$data['telefono_usuario'];?></span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <span class="label">Ciudad:</span>
                    <span class="labelPrincipal"><?=$data['ciudad_usuario'];?></span>
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <div class="card">
                    <span class="label">E-mail:</span>
                    <span class="labelPrincipal"><?=$data['correo_usuario'];?></span>
                </div>
            </div>
        </div>
    </div>
  <!-- DATOS DE DOMICILIO TITULO -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h5>Domicilio</h5>
            </div>
        </div>
    </div>
    <!-- DATOS DE DOMICILIO CONTENEDORES -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card" style="flex-direction: column !important;">
                    <span class="domicilio"><?=$data['direccion_usuario'];?></span>
                    <span class="domicilio"><?=$data['telefono_usuario'];?></span>
                    <span class="domicilio"><?=$data['ciudad_usuario'];?></span>
                    <span class="domicilio"><?=$data['nombre_usuario'];?> <?=$data['apellido_usuario'];?></span>
                </div>
            </div>
        </div>
    </div>
    <!-- BOTONES DE ACTUALIZAR -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <a href="updatedata.php" class="btn btn-primary btn-sm float-right ml-3">Actualizar mis datos</a>
                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">Actualizar mi contraseña</button>
            </div>
        </div>
    </div>
    <!-- MODAL PARA ACTUALIZAR CONTRASEÑA -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar contraseña</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="myData.php" method="post">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="contraseniaActual">Digite su contraseña actual</label>
                                <input class="form-control" type="password" required name="contraseniaactual" id="contraseniaActual">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="contraseniaNueva">Digite su contraseña nueva</label>
                                <input class="form-control" type="password" required name="contrasenianueva" id="contraseniaNueva">
                            </div>
                            <div class="col mb-3">
                                <label for="contraseniaRepetir">Vuelva a escribir la contraseña</label>
                                <input class="form-control" type="password" required name="contraseniarepetir" id="contraseniaRepetir">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="hidden" name="idusuario" value="<?=$data['idusuario'];?>" >
                                <input class="btn btn-primary btn-sm btn-block mb-4" type="submit" name="submit" value="Actualizar">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGICA PARA VALIDAR LA CONTRASEÑA -->
    <?php 
        if (isset($_POST['submit'])) {
            $idusuario= $_POST['idusuario'];
            $contraseniaactual=$_POST['contraseniaactual'];
            $contrasenianueva=$_POST['contrasenianueva'];
            $contraseniarepetir= $_POST['contraseniarepetir'];

            if($contraseniaactual == $data['contrasenia_usuario']){
                if ($contrasenianueva==$contraseniarepetir) {
                    $objContrasenia = new Crud();
                    $res= $objContrasenia->actualizarContrasenia($contrasenianueva,$idusuario);
                    if($res !== ""){
                        echo '<script> 
                                swal({
                                    title: "Contraseña actualizada correctamente!",
                                    text: "You clicked the button!",
                                    type: "success",
                                    button: "Ok!",
                                });
                              </script>';
                    }else{
                        echo '<script> 
                                swal({
                                    title: "Error al modificar la contraseña!",
                                    text: "You clicked the button!",
                                    type: "error",
                                    button: "Ok!",
                                });
                            </script>';
                    }
                }else{
                    echo '<script> 
                            swal({
                                title: "No coinciden las contraseñas!",
                                text: "You clicked the button!",
                                type: "info",
                                button: "Ok!",
                            });
                          </script>';
                }
            }else{
                echo '<script> 
                swal({
                    title: "Contraseña invalidad!",
                    text: "You clicked the button!",
                    type: "error",
                    button: "Ok!",
                  });
              </script>';
                
            }
        }

    ?>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <p>Copyright &copy; 2020.</p>
          </div>
        </div>
      </div>
    </div>
  </footer> 
  
  <!-- Bootstrap core JavaScript -->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Additional Scripts -->
  <script src="../../assets/js/custom.js"></script>
  <script src="../../assets/js/owl.js"></script>
  <!-- / * ctx: "btoa (encodeURIComponent (initialContext))" raw: "btoa (encodeURIComponent (script))" * / -->
  <script src="../../assets/js/slick.js"></script>
  <script src="../../assets/js/isotope.js"></script>
  <!-- / * ctx: "btoa (encodeURIComponent (initialContext))" raw: "btoa (encodeURIComponent (script))" * / -->
  <script src="../../assets/js/accordions.js"></script>
  <!-- <script src="../--/assets/js/login.js"></script> -->
  

  <script language = "text/Javascript"> 
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t){                   //declaring the array outside of the
    if(! cleared[t.id]){                      // function makes it static and global
        cleared[t.id] = 1;  // you could use true and false, but that's more typing
        t.value='';         // with more chance of typos
        t.style.color='#fff';
        }
     }
    </script>

</body>
</html>