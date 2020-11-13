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

    <title>Raffiniert-index.php</title>

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
              <li class="nav-item active">
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

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <!-- <h4>Adidas</h4>
            <h2>Nuevas coleciones</h2> -->
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <!-- <h4>Flash Deals</h4>
            <h2>Get your best products</h2> -->
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <!-- <h4>Last Minute</h4>
            <h2>Grab last minute deals</h2> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Nuevos productos</h2>
              <a href="products.php">Ver todos los productos <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <?php
            $obj = new Crud();
            $data=$obj->setProductosLimit();
          ?>
          <?php foreach($data as $f){ ?>
            <div class="col-md-4">
              <div class="product-item">
                <img src="assets/products/<?=$f['img_producto'];?>" alt="">
                <div class="down-content">
                  <h4><?=$f['nombre_producto'];?></h4>
                  <h6>$<?=$f['precio_producto'];?></h6>
                  <p><?=$f['descripcion_producto'];?></p>
                  <?php 
                    if($f['cantidad_producto'] < 1){
                  ?>
                    <i class="mb-3" style="color: red;">Producto agotado</i>
                  <?php
                  }else{
                  ?>
                    <i class="mb-3" style="color: green;">Producto disponible</i>
                  <?php
                    }
                  ?>       
                  <ul class="stars">
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                  </ul>
                  <span><a href="seeProducts.php?idproducto=<?php echo $f['idproductos'];?>">Ver producto</a></span>
                </div>
              </div>
            </div>
          <?php
            } 
          ?>
        </div>
      </div>
    </div>

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Sobre Nosotros</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Raffiniert</h4>
              <p>
                  Raffiniert es una empresa dedicada a ventas de calzado y accesorios para hombre 
                  y mujer, con la finalidad de sastifacer las necesidades de los clientes
                  ofreciendoles productos sofisticados, con diseño y comodidad.
                  <br></br>
                  Te ofrecemos la mejor garantia en tus productos...
              </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/Logo/Raffinier(blancoIcono1).png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="team-members">
      <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
              <div class="section-heading">
                <h2>Catálogo Instagram</h2>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="team-member">
            <div class="thumb-container">
              <a href="https://www.instagram.com/raffiniert_shopping/?hl=es-la" target="_blank"><img src="assets/products/catalogo(1).jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><i class="fa fa-instagram" style="color:#FFFFFF; font-size: 52px; height=6;"></i></li>
                    </ul>
                  </div>
                </div>
              </img></a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="team-member">
            <div class="thumb-container">
             <a href="https://www.instagram.com/raffiniert_shopping/?hl=es-la" target="_blank"><img src="assets/products/catalogo(2).jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><i class="fa fa-instagram" style="color:#FFFFFF; font-size: 52px; height=6;"></i></li>
                    </ul>
                  </div>
                </div>
              </img></a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="team-member">
            <div class="thumb-container">
             <a href="https://www.instagram.com/raffiniert_shopping/?hl=es-la" target="_blank"><img src="assets/products/catalogo(3).jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><i class="fa fa-instagram" style="color:#FFFFFF; font-size: 52px; height=6;"></i></li>
                    </ul>
                  </div>
                </div>
              </img></a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="team-member">
            <div class="thumb-container">
             <a href="https://www.instagram.com/raffiniert_shopping/?hl=es-la" target="_blank"><img src="assets/products/catalogo(4).jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><i class="fa fa-instagram" style="color:#FFFFFF; font-size: 52px; height=6;"></i></li>
                    </ul>
                  </div>
                </div>
              </img></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.</p>
                </div>
                <div class="col-md-4">
                  <a href="#" class="filled-button">Purchase Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    
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

    <!-- ENVION AJAX A REGISTROTITULAR.PHP -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <!-- / * ctx: "btoa (encodeURIComponent (initialContext))" raw: "btoa (encodeURIComponent (script))" * / -->
    <script src="assets/js/owl.js"></script>
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
