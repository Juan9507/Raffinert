<?php
session_start();
if (!$_SESSION['idusuario']) {
  header("Location:../../index.php");
}
require_once("../../Database/consult.php");
require_once("../../Database/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>Perfil</title>

  <!-- Bootstrap core CSS -->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--

    TemplateMo 546 Sixteen Clothing

    https://templatemo.com/tm-546-sixteen-clothing

    -->

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../../assets/css/fontawesome.css">
  <link rel="stylesheet" href="../../assets/css/templatemo-sixteen.css">
  <link rel="stylesheet" href="../../assets/css/owl.css">
  <link rel="stylesheet" href="../../assets/css/seeProduts.css">
  <link rel="stylesheet" href="myShoppingStyle.css">
</head>
<body>
    <!-- ***** Preloader Start ***** -->
  <div id="preloader">
      <div class="jumper">
          <div></div>
          <div></div>
          <div></div>
      </div>
  </div>  
  <!-- ***** Preloader End ***** -->

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
                  <a class="dropdown-item" href="#">Compras</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="myData.php">Mis datos</a>
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
                <a class="nav-link" href="../../Controller/register.php">Crea tu cuenta</a>
              </li> -->
            <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- MIS COMPRAS -->
  <div class="position">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <h2>Mis compras</h2>
            <hr>
        </div>
      </div>
    </div>
  </div>
  <?php
    $obj = new Crud();
    $data=$obj->ventasProducts($_SESSION['idusuario']);
    if($data > 0){?>
      <?php foreach($data as $f){ ?>
        <div class="container">       
          <div class="card mb-3" >
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="../../assets/products/<?=$f['img_producto'];?>" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $f['nombre_producto']; ?></h5>
                    <i class="card-text"><?= $f['descripcion_producto']; ?></i>
                    <p class="card-text">Talla: <?= $f['venta_talla']; ?></p>
                    <p class="card-text">Cantidad: <?= $f['cantidad_venta']; ?></p>
                    <p class="card-text">$<?= $f['valor_venta']; ?></p>
                    <p class="card-text"><small class="text-muted"><?= $f['fecha_venta']; ?></small></p>
                    <p style="color: red">Raffiniert pronto se comunicara con usted.</p>
                </div>
            </div>
          </div>
        </div>
    <?php 
      }
    }else{ 
    ?>
      <div class="col-12 text-center">
        <p>Todos los productos que compres los podras visualizar por este espacio.</p><p> No esperes más compra lo mejor de Raffiniert !</p>
        <hr>
        <p class="mb-0">Raffiniert.</p>
      </div>
    <?php
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