<?php
  // require_once("Database/consult.php");
  // require_once("Database/connection.php");
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    

    <title>Raffiniert-about</title>

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
              <li class="nav-item">
                <a class="nav-link" href="index.php">Inicio
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="products.php">Productos</a>
              </li>
              <li class="nav-item active">
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
    <div class="page-heading about-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <!-- <h4>about us</h4>
              <h2>our company</h2> -->
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="best-features about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Descripción Rafiniert</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/Logo/Raffinier(blancoIcono1).png" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>¿Quiénes somos y que hacemos?</h4>
              <br/>
              <p>Raffiniert es un emprendimiento que inició en el mes de Agosto del 2020 como alternativa de solución a la necesidad de las personas que no cuentan con el tiempo disponible para realizar sus compras de calzado para dama y caballero de manera presencial.<br/>  Su principal propósito es el 
                 de la creación de una página web que pueda agilizar y facilitar a las personas sin salir de casa, la compra segura de zapatillas nacionales de buena calidad, garantizando una excelente experiencia y garantía de éstas.</p>
              <!-- <ul class="social-icons">
                <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-behance"></i></a></li>
              </ul> -->
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="team-members">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Más sobre Raffiniert</h2>
            </div>
          </div>
          <!-- <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_01.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Johnny William</h4>
                <span>CO-Founder</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_02.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Karry Pitcher</h4>
                <span>Product Expert</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_03.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Michael Soft</h4>
                <span>Chief Marketing</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_04.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Mary Cool</h4>
                <span>Product Specialist</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_05.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>George Walker</h4>
                <span>Product Photographer</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_06.jpg" alt="">
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Kate Town</h4>
                <span>General Manager</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing itaque corporis nulla.</p>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>


    <div class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="service-item">
              <div class="icon">
                <img src="assets/Logo/Raffinier(blanco).jpg" style="width: 120px; height: 100px"/>
              </div>
              <div class="down-content">
                <h4>Misión</h4>
                <p>La misión de Rafiniert es aumentar la comercialización de productos del calzado, con la finalidad de satisfacer 
                   las necesidades de los clientes ofreciéndoles todos productos de una forma más rápida y segura..</p>
                <!-- <a href="#" class="filled-button">Read More</a> -->
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-item">
              <div class="icon">
                <img src="assets/Logo/Raffinier(blanco).jpg" style="width: 120px; height: 100px"/>
              </div>
              <div class="down-content">
                <h4>Visión</h4>
                <p>Raffiniert tiene como propósito dentro de 8 años, ser una empresa líder y de reconocimiento en la venta de calzado para caballero, dama a nivel nacional e internacional ofreciendo los productos a una mayor cantidad de lugares con envío inmediato, 
                   prestando el mejor servicio y calidad de nuestros productos.</p>
                <!-- <a href="#" class="filled-button">Details</a> -->
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-item">
              <div class="icon">
                <img src="assets/Logo/Raffinier(blanco).jpg" style="width: 120px; height: 100px"/>
              </div>
              <div class="down-content">
                <h4>Valores</h4>
                <p>Servicio al cliente<br/> Respeto al individuo<br/> Luchar por la excelencia<br/> Actuar con integridad y Capacidad de respuesta.</p>
                <!-- <a href="#" class="filled-button">Read More</a> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="happy-clients d-none d-sm-none d-md-block">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Las marcas que vendemos</h2>
            </div>
          </div>
          <!-- <div class="col-md-12"> -->
            <!-- <div class="d-none d-sm-none d-md-block"> -->
              <div class="col-md-3 mb-3">
                <div class="card" style="border: none !important">
                  <img src="assets/images/marcaNike.png" alt="1">
                </div>
              </div>
              
              <div class="col-md-3 mb-3">
                <div class="card" style="border: none !important">
                  <img src="assets/images/marcaAdidas.jpg" alt="2">
                </div>
              </div>
              
              <div class="col-md-3">
                <div class="card" style="border: none !important">
                  <img src="assets/images/marcaPuma.jpg" alt="3">
                </div>
              </div>
              
              <div class="col-md-3 mb-3">
                <div class="card" style="border: none !important">
                  <img src="assets/images/marcaNewbalance.jpg" alt="4">
                </div>
              </div>
              
              <!-- <div class="client-item">
                <img src="assets/images/client-01.png" alt="5">
              </div> -->
              
              <!-- <div class="client-item">
                <img src="assets/images/client-01.png" alt="6">
              </div> -->
            <!-- </div> -->
          <!-- </div> -->
        </div>
      </div>
    </div>

    <div class="team-members">
      <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
              <div class="section-heading">
                <h2>Comunícate con nosotros</h2>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-3" style="text-align: center;">
          <a href="https://api.whatsapp.com/send?phone=3173903067&text=Hola, quisiera tener información de los productos">
            <ul class="social-icons">
              <li><i class="fa fa-whatsapp" style="color:#49CD1F; font-size: 32px; height=6;"></i></li>
              <i>Cali: 3173903067</i>
            </ul>
          </a>
        </div>
        <div class="col-md-6 mb-3" style="text-align: center;">
          <a href="https://api.whatsapp.com/send?phone=3165750650&text=Hola, quisiera tener información de los productos">
            <ul class="social-icons">
              <li><i class="fa fa-whatsapp" style="color:#49CD1F; font-size: 32px; height=6;"></i></li>
              <i>Palmira: 3165750650</i>
            </ul>
          </a>
        </div>
      </div>
    </div>

    
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
