<?php
session_start();
require_once("Database/consult.php");
require_once("Database/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>Ver producto</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/seeProduts.css">

</head>
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
          <a class="navbar-brand" href="index.php">
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
                <a class="nav-link" href="index.php">Inicio
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="products.php">Productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">Sobre nosotros</a>
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
                    <a class="dropdown-item" href="Components/Perfil/myShopping.php">Compras</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="Components/Perfil/myData.php">Mis datos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="Controller/signOff.php">Salir</a>
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
                <li class="nav-item">
                  <a class="nav-link" href="Controller/register.php">Crea tu cuenta</a>
                </li>
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
      $data=$obj->setProductosId($_GET['idproducto']);
    ?>
    <div class="position">
      <div class="container"></br>
        <div class="row">
          <div class="col-md-5">
            <img src="assets/products/<?=$data['img_producto'];?>" class="img-fluid" data-container="body" data-toggle="popover-hover"  title="<?=$data['nombre_producto'];?>"
            data-content=""><!--Acomoda la imagen al tamaño del contenedor--><!--<img src='imagenes/imagen_home.png' width='200' /><br>Toggle popover-->
          </div>
          <div class="col-md-6" style="margin-left: 17px;">
            <h2><?= $data['nombre_producto']; ?></h2><br/>
            <span class="genero">Género: <?= $data['nombre_genero']; ?></span>
            <span class="marca">Marca: <?= $data['nombre_marca']; ?></span>
            <div class="clearfix"></div> 
            <span class="original">Talla: 25-43 col <img src="assets/Logo/FlagofColombia_6558.ico" style="width:19px;"></span><br/>
            <span class="original">Precio: $<?= $data['precio_producto']; ?></span><br/>
            </p>
            <hr/>
            <div>
              <span>Tu pedido tiene un tiempo de entrega de un día si eres de Cali.</span></br>
              <span>Si eres de palmira tardará dos días.</span>
              <!-- <div class="down-content">
                <ul class="stars">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
              </div> -->
            </div>
            <hr/>
            <?php
              if (isset($_SESSION['idusuario'])) { ?>
                  <?php
                    if($data['cantidad_producto'] < 1){
                  ?>
                      <button type="button" class="btn btn-danger btn-sm btn-block" disabled>Agotado</button>
                  <?php
                    }else{
                  ?>
                      <h5><a class="btn btn-secondary btn-sm btn-block" href="Components/Products/buyProduct.php?idproductos=<?php echo $data['idproductos'];?>">Comprar</a></h5> 
                  <?php
                    }
                  ?>
                <?php
              }else{ ?>
                <?php 
                  if($data['cantidad_producto'] < 1){
                ?>
                  <button type="button" class="btn btn-danger btn-sm btn-block" disabled>Agotado</button>
                <?php 
                  }else{
                ?>
                <h5><a class="btn btn-secondary btn-sm btn-block" data-toggle="modal" data-target="#ModalCompra">Comprar</a></h5>
                <?php 
                  }
                ?>
                <?php
              }
            ?>
            <br/>
            <h4>Descripción:</h4><i><?= $data['descripcion_producto']; ?></i>
          </div>
        </div>
      </div>
    </div>
    <!-- MODAL PARA MOSTRAR MENSAJE SI NO HA INICIADO SESION -->
    <div class="modal fade" id="ModalCompra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Error en la petición.</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            Primero debes de registrarte e iniciar sesión para poder realizar la compra
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
        <!-- FIN MODAL PARA MOSTRAR MENSAJE DE NO HA INICIADO SESION -->

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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <!-- / * ctx: "btoa (encodeURIComponent (initialContext))" raw: "btoa (encodeURIComponent (script))" * / -->
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <!-- / * ctx: "btoa (encodeURIComponent (initialContext))" raw: "btoa (encodeURIComponent (script))" * / -->
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/login.js"></script>

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