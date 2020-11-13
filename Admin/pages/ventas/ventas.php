<?php
session_start();
if ($_SESSION['rol_idrol'] != 2) {
  header("Location:../../../index.php");
}
require_once("../../../Database/consult.php");
require_once("../../../Database/connection.php");

// $objmarca = new Crud();
// $datamarca = $objmarca->setMarca();

// $objproveedor = new Crud();
// $dataproveedor = $objproveedor->setProveedor();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Raffinert Admin-ventas</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script> 
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../../assets/Logo/favicon.ico" />
  </head>
  <body>
    <div class=" container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="../../index.php"><img src="../../assets/images/logo.png" alt="logo" /></a>
          <!-- <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a> -->
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?=$_SESSION['nombre_usuario'];?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../../Controller/signOff.php">
                  <i class="mdi mdi-logout mr-2 text-primary"></i> Cerrar sesión </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="https://img.icons8.com/bubbles/2x/admin-settings-male.png" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?=$_SESSION['nombre_usuario'];?></span>
                  <span class="text-secondary text-small">Gerente de proyecto</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../index.php">
                <span class="menu-title">Productos</span>
                <i class="mdi mdi-shopping menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../genero/genero.php">
                <span class="menu-title">Género</span>
                <i class="mdi mdi-human-male-female menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../marca/marca.php">
                <span class="menu-title">Marca</span>
                <i class="mdi mdi-emoticon menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../proveedor/proveedor.php">
                <span class="menu-title">Proveedor</span>
                <i class="mdi mdi-truck menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../usuario/usuario.php">
                <span class="menu-title">Usuarios</span>
                <i class="mdi mdi-account menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ventas.php">
                <span class="menu-title">Ventas</span>
                <i class="mdi mdi-cash-multiple menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="container">
              <div class="row">
                <div class="col-md-12 mb-2">
                  <div class="alert alert-info" role="alert">
                    El reporte solo se puede hacer de las ventas de un plazo hasta 8 días, ejemplo : <span class="ml-3">01/10/2020</span> <span class="ml-3">al</span> <span class="ml-3">09/10/2020</span>.
                  </div>
                </div>
              </div>
            </div>
            <div class="page-header">
                <div class="container">
                    <form action="../../report-pdf/reportventas.php" method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label for="inicial" class="col-2 col-form-label">Inicial</label>
                                    <div class="col-10">
                                        <input class="form-control" type="date" value="2020-08-19" name="inicial" id="inicial">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label for="final" class="col-2 col-form-label">Final</label>
                                    <div class="col-10">
                                        <input class="form-control" type="date" value="2020-08-19" name="final" id="final">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" name="submit" class="btn btn-gradient-info"><i class="mdi mdi-file-pdf menu-icon"></i>- Generar reporte de las ventas</button>
                                <!-- <a href="../../report-pdf/reportproveedores.php" target="_blank" class="btn btn-gradient-dark btn-fw">
                                    <i class="mdi mdi-file-pdf menu-icon"></i>
                                    - Generar reporte de las ventas
                                </a> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Ventas</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> ID </th>
                            <th> Fecha </th>
                            <th> Cantidad </th>
                            <th> Valor </th>
                            <th> Talla </th>
                            <th> Nombre producto </th>
                            <th> Nombre usuario </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $objusuario = new Crud();
                            $datausuario = $objusuario->ventas();
                          ?>
                          <?php foreach($datausuario as $f){ ?>
                          <tr>
                            <td>
                              <?=$f['idventas']; ?>
                            </td>
                            <td> 
                              <?=$f['fecha_venta']; ?>
                            </td>
                            <td> 
                              <?=$f['cantidad_venta']; ?>
                            </td>
                            <td> 
                              <?=$f['valor_venta']; ?>
                            </td>
                            <td> 
                              <?=$f['venta_talla']; ?>
                            </td>
                            <td> 
                              <?=$f['nombre_producto']; ?>
                            </td>
                            <td> 
                              <?=$f['nombre_usuario']; ?>
                            </td>
                            <td> 
                              <a href="" data-toggle="modal" data-target="#exampleModal<?=$f['idventas'];?>">
                                <i  class="mdi mdi-delete-circle menu-icon" style="cursor: pointer; font-size:20px; color: #047edf;" data-toggle="tooltip" data-placement="right" title="Eliminar venta"></i>
                              </a>
                            </td>
                          </tr>
                          <!-- Modal de verificacion delete-->
                          <div class="modal fade" id="exampleModal<?=$f['idventas'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Verificación de eliminación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <i>¿Estas seguro de eliminar este dato?</i>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    <a class="btn btn-primary" href="ventas.php?id=<?=$f['idventas'];?>">
                                      Aceptar
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php
                            } 
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>  
              </div>
            </div>
              <!-- LOGICA PARA ELIMINAR VENTA -->
              <?php 
                if(isset($_GET['id'])){
                  $objDelete = new Crud;
                  $dataDelete = $objDelete->getVentasDelete($_GET['id']);
                  if($dataDelete == true){
                    echo "<script> 
                            setTimeout(function() { 
                                swal({ 
                                    title: 'Producto eliminado!', 
                                    text: 'Message!', 
                                    type: 'success', 
                                    confirmButtonText: 'OK'
                                }, 
                                function(isConfirm){ 
                                    if (isConfirm) { 
                                        window.location.href = 'ventas.php'; 
                                } 
                            }); }, 1000);
                        </script>";
                }else{
                    echo '<script> 
                            swal({
                                title: "Error al eliminar el producto!",
                                text: "You clicked the button!",
                                type: "error",
                                button: "Ok!",
                            });
                        </script>';
                }
                }
              ?>
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer mt-5">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Raffiniert <i class="mdi mdi-heart text-danger"></i></span>
              </div>
            </footer>
            <!-- partial -->
          </div>
        </div>
      </div>
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>