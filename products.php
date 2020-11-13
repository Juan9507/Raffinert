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

    <title>Raffiniert-Products</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <!-- <link rel="stylesheet" href="assets/css/products.css"> -->

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
              <li class="nav-item">
                <a class="nav-link" href="index.php">Inicio
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item active">
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
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="filters">
              <ul>
                  <li class="filter-genero" data-filter="all">Todos las zapatillas</li>
                  <li class="filter-genero" data-filter="Hombre">Hombre</li>
                  <li class="filter-genero" data-filter="Mujer">Mujer</li>
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="filters-content">
                <div class="row">
                  <?php
                    $obj = new Crud();
                    $data=$obj->setProductos();
                  ?>
                  <?php foreach($data as $f){ ?>
                    <div class="col-lg-4 col-md-4 filter <?=$f['nombre_genero'];?>">
                      <div class="product-item">
                        <img src="assets/products/<?=$f['img_producto'];?>" alt="">
                        <div class="down-content">
                          <a href="#"><h4><?=$f['nombre_producto'];?></h4></a>
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
        </div>
      </div>
    </div>
    
    <!-- <div class="container">
      <div class="">
        <h2>Filtering divs</h2>
      </div>
        
        <div>
            <button class="btn btn-primary filter-button" data-filter="all">All</button>
            <button class="btn btn-default filter-button" data-filter="photo">Photo</button>
            <button class="btn btn-default filter-button" data-filter="graphic">Graphic</button>
            <button class="btn btn-default filter-button" data-filter="webdesign">Web design</button>
        </div>
        <br/>
        
        <div class="row">
            <div class="col-md-3 filter photo">
                <div class="each-item">
                    <img class="port-image" src="http://www.templates4all.com/wp-content/uploads/2011/09/Engon-Joomla-Corporate-Portfolio-Template.jpg"/>
                    <div class="cap1">
                        <h3>Car show</h3>
                        <p>A car showroom for all verities of cars to display</p>
                    </div>
                    <div class="cap2">
                        <p class="text-center">Visit</p>
                    </div>
                    
                </div>
                
            </div>
            
            <div class="col-md-3 filter graphic photo">
                <div class="each-item">
                    <img class="port-image" src="https://assets.adidas.com/images/w_600,f_auto,q_auto/459ff194c35e45ea91b1a8ba00fc4876_9366/Tenis_NMD_R1_Negro_B42200_01_standard.jpg"/>
                    <div class="cap1">
                        <h3>Car show</h3>
                        <p>A car showroom for all verities of cars to display</p>
                    </div>
                    <div class="cap2">
                        <p class="text-center">Visit</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 filter webdesign">
                <div class="each-item">
                    <img class="port-image" src="http://danielsitek.cz/pic/small/daniel-sitek-portfolio_small.jpg"/>
                    <div class="cap1">
                        <h3>Car show</h3>
                        <p>A car showroom for all verities of cars to display</p>
                    </div>
                    <div class="cap2">
                        <p class="text-center">Visit</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 filter graphic photo">
                <div class="each-item">
                    <img class="port-image" src="https://www.zapatillascolombia.com/wp-content/uploads/2020/04/adidas-forum-negras.jpg"/>
                    <div class="cap1">
                        <h3>Car show</h3>
                        <p>A car showroom for all verities of cars to display</p>
                    </div>
                    <div class="cap2">
                        <p class="text-center">Visit</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 filter webdesign graphic">
                <div class="each-item">
                    <img class="port-image" src="http://paperhaus.com/images/products/shrapnel-design-handmade-double-thick-screwpost-portfolio-cover-11x14-landscape-black-anodized-aluminum-14231_detail.jpg"/>
                    <div class="cap1">
                        <h3>Car show</h3>
                        <p>A car showroom for all verities of cars to display</p>
                    </div>
                    <div class="cap2">
                        <p class="text-center">Visit</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 filter photo">
                <div class="each-item">
                    <img class="port-image" src="http://4.bp.blogspot.com/_IDQ_mBDYk9I/SsON_Or-mGI/AAAAAAAAAEs/0AchAjEekYU/s400/Portfolio-idea-3.jpg"/>
                    <div class="cap1">
                        <h3>Car show</h3>
                        <p>A car showroom for all verities of cars to display</p>
                    </div>
                    <div class="cap2">
                        <p class="text-center">Visit</p>
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

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <!-- / * ctx: "btoa (encodeURIComponent (initialContext))" raw: "btoa (encodeURIComponent (script))" * / -->
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <!-- / * ctx: "btoa (encodeURIComponent (initialContext))" raw: "btoa (encodeURIComponent (script))" * / -->
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/login.js"></script>
    <!-- FUNCTION SECTION PRODUCTOS -->
    <script src="Components/Products/sectionProducts.js"></script>
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
