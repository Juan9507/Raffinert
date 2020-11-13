<?php
session_start();
if ($_SESSION['rol_idrol'] != 2) {
  header("Location:../index.php");
}
require_once("../Database/consult.php");
require_once("../Database/connection.php");
$objmarca = new Crud();
$datamarca = $objmarca->setMarca();

$objgenero = new Crud();
$datagenero = $objgenero->setGenero();

$objproveedor = new Crud();
$dataproveedor = $objproveedor->setProveedor();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Raffinert Actualizar producto</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script> 
    <!-- plugins:css -->
    <!-- <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/Logo/favicon.ico" /> 
    <style>
    body{
      background: #f2edf3;
      background-attachment: fixed;
      background-size: cover;
      background-position: center;
      height:100vh;
      /* width: 100%; */
      min-height: 100vh;
      padding-top:55px;
      margin-left:30px;
      margin-right:30px;
    }
    label{
      color:black;
    }

    .form-control {
    border: 1px solid #ced4da;
    font-family: "ubuntu-regular", sans-serif;
    font-size: 0.8125rem;
    }
    select.form-control {
    padding: .4375rem .75rem;
    border: 0;
    outline: 1px solid #ced4da;
    color: #c9c8c8;
   }
    .container{
      /* background: linear-gradient(rgba(15,32,39), rgba(32,58,67), rgba(44,83,100)); */
      background: #f2edf3;
      box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.28), 0 4px 3px -4px rgba(0, 0, 0, 0.2), 0 3px 7px 0 rgba(0, 0, 0, 0.12);
      padding-bottom: 22px;
      border-radius:10px;
     }
   @media (min-width: 1200px){
    .container {
      max-width: 500px;
    }
   }
  </style>
</head>
<body>
    <div class="container">
        <?php 
            if(isset($_GET['idproductos'])){
                $objUpdate= new Crud();
                $dataUpdate= $objUpdate->setProductosId($_GET['idproductos']);
            }
        ?>
        <form action="indexform.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="veri" value="<?= $dataUpdate['idproductos'];?>">
            <div class="row">
                <div class="col-md-6 mt-3 mb-3">
                    <label for="nombre">Actualizar nombre</label>
                    <input type="text" class="form-control shadow-sm bg-white rounded" name="nombre" value="<?= $dataUpdate['nombre_producto'];?>" placeholder="Digite nombre del producto" required id="nombre">
                </div>
                <div class="col-md-6 mt-3 mb-3">
                    <label for="descripcion">Actualizar descripción</label>
                    <input type="text" class="form-control shadow-sm bg-white rounded"  name="descripcion" value="<?= $dataUpdate['descripcion_producto'];?>" placeholder="Digite la descripcion del producto" required id="descripcion">
                </div>
                <div class="col-md-6">
                    <label for="precio">Actualizar precio</label>
                    <input type="number" class="form-control shadow-sm bg-white rounded" name="precio" value="<?= $dataUpdate['precio_producto'];?>" placeholder="Digite precio del producto" required id="precio">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cantidad">Actualizar cantidad</label>
                    <input type="number" class="form-control shadow-sm bg-white rounded"  name="cantidad" value="<?= $dataUpdate['cantidad_producto']; ?>" placeholder="Digite la cantidad del producto" required id="cantidad">
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Actualizar imagen del producto</label>
                        <input type="file" name="imagen" class="file-upload-default" accept="image/jpeg">
                        <div class="input-group col-xs-12">
                            <input type="text" value="<?= $dataUpdate['img_producto'] ?>" name="imagen" class="form-control file-upload-info shadow-sm bg-white rounded" readonly placeholder="Subir imagen">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-info" type="button">subir</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="marca">Actualizar marca</label>
                        <select class="form-control shadow-sm bg-white rounded" id="marca" name="marca">
                            <?php foreach($datamarca as $f){ ?>
                                <?php 
                                    if($dataUpdate['marca_idmarca'] == $f['idmarca']) {
                                ?>
                                   <option value="<?=$dataUpdate['marca_idmarca']?>" selected><?=$dataUpdate['nombre_marca'] ?></option>
                                <?php 
                                    }else{
                                ?>
                                <option value="<?=$f['idmarca'] ?>"><?=$f['nombre_marca'] ?></option>
                                <?php 
                                  }
                                ?>
                            <?php 
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="genero">Actualizar genero</label>
                        <select class="form-control shadow-sm bg-white rounded" id="genero" name="genero">
                            <?php foreach($datagenero as $f){ ?>
                            <?php 
                                if($dataUpdate['genero_idgenero'] == $f['idgenero'] ){
                            ?>
                            <option value="<?=$dataUpdate['genero_idgenero']?>" selected><?=$dataUpdate['nombre_genero'] ?></option>
                            <?php 
                                }else{
                            ?>
                            <option value="<?=$f['idgenero'] ?>"><?=$f['nombre_genero'] ?></option>
                            <?php 
                                }
                            ?>
                            <?php 
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="proveedor">Actualizar proveedor</label>
                        <select class="form-control shadow-sm bg-white rounded" id="proveedor" name="proveedor">
                            <?php foreach($dataproveedor as $f){ ?>
                            <?php 
                              if($dataUpdate['proveedor_idproveedor'] == $f['idproveedor']) { 
                            ?>
                            <option value="<?=$dataUpdate['proveedor_idproveedor'] ?>" selected><?=$dataUpdate['nombre_proveedor'] ?></option>
                            <?php 
                              }else{
                            ?>
                            <option value="<?=$f['idproveedor'] ?>"><?=$f['nombre_proveedor'] ?></option>
                            <?php 
                              }
                            ?>
                            <?php 
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
                <button type="submit" name="submit" class="btn btn-gradient-info btn-block">Actualizar</button>
        </form>
    </div>
    <?php 
        if(isset($_POST['submit'])){
            $nombre=$_POST['nombre'];
            $descripcion=$_POST['descripcion'];
            $precio=$_POST['precio'];
            $cantidad=$_POST['cantidad'];
            if($_FILES['imagen']['error'] == 0){
                $imagenNormal=$_FILES['imagen'];
                // get details of the uploaded file
                $fileTmpPath = $_FILES['imagen']['tmp_name'];
                $fileName = $_FILES['imagen']['name'];
                $imagen = time().$fileName;
                // directory in which the uploaded file will be moved
                $uploadFileDir = './../assets/products/';
                $dest_path = $uploadFileDir.$imagen;
                move_uploaded_file($fileTmpPath, $dest_path);
            }else{
                $imagen=$_POST['imagen'];
            }
            $marca=$_POST['marca'];
            $genero=$_POST['genero'];
            $proveedor=$_POST['proveedor'];
            $veri=$_POST['veri'];

            $objEviarUpdate = new Crud;
            $dataEnviarUpdate= $objEviarUpdate->getProductoUpdate($nombre,$descripcion,$precio,$cantidad,$imagen,$marca,$genero,$proveedor,$veri);
            if($dataEnviarUpdate == true){
                echo "<script> 
                        setTimeout(function() { 
                            swal({ 
                                title: 'Actualizado exitosamente!', 
                                text: 'Message!', 
                                type: 'success', 
                                confirmButtonText: 'OK'
                            }, 
                            function(isConfirm){ 
                                if (isConfirm) { 
                                    window.location.href = 'index.php'; 
                            } 
                        }); }, 1000);
                    </script>";
            }else{
                echo '<script> 
                        swal({
                            title: "Error al actualizar!",
                            text: "You clicked the button!",
                            type: "error",
                            button: "Ok!",
                        });
                    </script>';
            }
            
        }
    ?>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- Custom js for this page -->
    <script src="assets/js/file-upload.js"></script>
</body>
</html>