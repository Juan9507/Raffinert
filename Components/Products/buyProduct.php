<?php
session_start();
error_reporting(0);
if (!$_SESSION['idusuario']) {
  header("Location:../../index.php");
}
require_once("../../Database/consult.php");
require_once("../../Database/connection.php");


// SELECT PARA TRAER LOS DATOS DE LOS PRODUCTOS Y LOGICA PARA LA FECHA
    date_default_timezone_set('America/Bogota');
    $fecha_actual=date("d-m-Y");
    $obj = new Crud();
    $data=$obj->setProductosId($_GET['idproductos']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <!-- Bootstrap core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <title>Comprar producto-Raffiniert</title>
    <style>
    body{
      background: linear-gradient(rgba(20,30,48,.8), rgba(36,59,85,.7)),url('../../assets/images/bg9.jpg') no-repeat;
      background-attachment: fixed;
      background-size: cover;
      background-position: center;
      /* height:100vh; */
      /* width: 100%; */
      /* min-height: 100vh;*/
      padding-top:55px;
      /* margin-left:30px;
      margin-right:30px; */ */
    }
    label{
      color:black;
    }
    /* .container{
      background: linear-gradient(rgba(15,32,39), rgba(32,58,67), rgba(44,83,100));
      background: white;
      box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.28), 0 4px 3px -4px rgba(0, 0, 0, 0.2), 0 3px 7px 0 rgba(0, 0, 0, 0.12);
      padding-bottom: 22px;
      border-radius:10px;
     } */
   /* @media (min-width: 1200px){
    .container {
      max-width: 500px;
    }
   } */
  </style>
  <script>
    const cambiar = () =>{
      let cantidad = document.getElementById("cantidad").value;
      let valorInicial = document.getElementById("valorInicial").value;
      let valorTotal = cantidad * valorInicial; 
      document.getElementById("valorTotal").value = valorTotal
    }
  </script>
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <div class="card w-100">
          <div class="card-body">
            <h5 class="card-title mt-2 mb-3">Datos de la compra</h5>
              <hr>
              <div class="container">
                <div class="row">
                  <div class="col-md-4 mb-3 mt-2">
                    <i style="font-weight: bold;">Marca :</i>
                  </div>
                  <div class="col-md-8 mt-2">
                    <i><?= $data['nombre_producto']; ?></i>
                  </div>
                </div>
              </div>
              <hr>
              <div class="container">
                <div class="row">
                  <div class="col-md-4 mb-3 mt-2">
                    <i style="font-weight: bold;">Género :</i>
                  </div>
                  <div class="col-md-8 mt-2">
                    <i><?= $data['nombre_genero']; ?></i>
                  </div>
                </div>
              </div>
              <hr>
              <div class="container">
                <div class="row">
                  <div class="col-md-4 mb-3 mt-2">
                    <i style="font-weight: bold;">Valor :</i>
                  </div>
                  <div class="col-md-8 mt-2">
                    <i><?= $data['precio_producto']; ?></i>
                  </div>
                </div>
              </div>
              <hr>
              <div class="container">
                <div class="row">
                  <div class="col-md-4 mb-3 mt-2">
                    <i style="font-weight: bold;">Fecha :</i>
                  </div>
                  <div class="col-md-8 mb-3 mt-2">
                    <i><?= $fecha_actual;?></i>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>

      <div class="col-md-7">
        <div class="card w-100">
          <div class="card-body">
            <h5 class="card-title">Datos necesarios</h5>
            <form action="buyProduct.php" method="post">
              <!-- Datos ocultos -->
              <input type="hidden" class="form-control" name="idproductos" id="idproductos" value="<?= $data['idproductos']; ?>">
              <input type="hidden" class="form-control" name="nombre_producto" id="nombre_producto" value="<?= $data['nombre_producto']; ?>">
              <input type="hidden" class="form-control" name="fecha" id="fecha" value="<?= $fecha_actual;?>">
              <input type="hidden" class="form-control" name="marca" id="marca" value="<?= $data['nombre_producto']; ?>">  
              <input type="hidden" class="form-control" name="genero" id="genero" value="<?= $data['nombre_genero']; ?>">
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="talla">Talla</label>
                  <select name="talla" id="talla" class="form-control">
                    <?php
                      for ($i=25; $i <= 43; $i++) { ?>
                        <option value="<?=$i?>"><?=$i?></option>
                    <?php   
                      }
                    ?>
                  </select>           
                </div>
                <div class="col-md-6 mb-3">
                  <label for="cantidad">Cantidad</label>
                  <select name="cantidad" id="cantidad" class="form-control" onChange='cambiar();'>
                    <?php
                      for ($i=1; $i <= $data['cantidad_producto']; $i++) { ?>
                        <option value="<?=$i?>"><?=$i?></option>
                    <?php   
                      }
                    ?>
                  </select>
                </div>
                <div class="col-md-12 mb-3">
                  <label for="valor">valor:</label>
                  <input type='hidden' class="form-control" value='<?=$data['precio_producto']; ?>' id='valorInicial' name='valorInicial'>
                  <input type='text' class="form-control" value='<?=$data['precio_producto']; ?>' id='valorTotal' name='valorTotal' readonly>
                </div>
                <h5 class="card-title ml-2">Pagar con tarjeta</h5>
                <i class="fab fa-cc-visa ml-4 mt-1" style="font-size:20px; color: blue;"></i>
                <i class="fab fa-cc-mastercard ml-2 mt-1" style="font-size:20px; color:red;"></i>
                <i class="fab fa-cc-paypal ml-2 mt-1" style="font-size:20px; color: blue;"></i>
                <div class="col-md-12 mb-2"></div>
                <div class="col-md-6">
                  <div class="form-group owner">
                    <label for="propietario">Propietario</label>
                    <input type="text" class="form-control" name="propietario" id="propietario" pattern="[A-Za-z\s]{1,40}" title="Solo letras" value="" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group CVV">
                    <label for="cvv">CVV</label>
                    <input type="text" class="form-control" name="cvv" id="cvv" value="" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group" id="card-number-field">
                    <label for="cardNumber">Número de tarjeta</label>
                    <input type="text" class="form-control" name="cardNumber" id="cardNumber" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <label>Fecha de caducidad</label>
                  <select class="form-control" name="fechacaducidad">
                      <option value="01">Enero</option>
                      <option value="02">Febrero </option>
                      <option value="03">Marzo</option>
                      <option value="04">Abril</option>
                      <option value="05">Mayo</option>
                      <option value="06">Junio</option>
                      <option value="07">Julio</option>
                      <option value="08">Augosto</option>
                      <option value="09">Septiembre</option>
                      <option value="10">Octobre</option>
                      <option value="11">Noviembre</option>
                      <option value="12">Diciembre</option>
                  </select>
                </div>
                <div class="col-md-3 mt-2">
                  <br>
                  <select class="form-control" name="fechacaducidadaño">
                      <option value="16"> 2016</option>
                      <option value="17"> 2017</option>
                      <option value="18"> 2018</option>
                      <option value="19"> 2019</option>
                      <option value="20"> 2020</option>
                      <option value="21"> 2021</option>
                  </select>
                </div>
              </div>
              <!-- <div class="col-md-12"> -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
                  Comprar
                </button>
              <!-- </div> -->
              <!-- Modal confirmacion compra-->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Confimación de compra</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      La compra de la zapatilla <?=$data['nombre_producto']; ?> se realizara.<br>
                      click en la (x) si no desea realizar la compra.
                    </div>
                    <div class="modal-footer">
                      <input type="submit" name="submit" class="btn btn-primary" value="Aceptar">
                    </div>
                  </div>
                </div>
              </div>
              <!-- FIN MODAL -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
      <!-- Logica de comprar -->
      <?php
        if (isset($_POST['submit'])) {
          $idusuario = $_SESSION['idusuario'];
          $nombre_producto= $_POST['nombre_producto'];
          $idproductos = $_POST['idproductos'];
          $marca = $_POST['marca'];
          $genero = $_POST['genero'];
          $talla = $_POST['talla'];
          $cantidad = $_POST['cantidad'];
          $valorTotal = $_POST['valorTotal'];
          $fecha = $_POST['fecha'];
          // DATOS DE TARJETA
          $propietario=$_POST['propietario'];
          $cvv=$_POST['cvv'];
          $cardNumber=$_POST['cardNumber'];
          $fechacaducidad=$_POST['fechacaducidad'];
          $fechacaducidadaño=$_POST['fechacaducidadaño'];
          if(strlen($cvv) < 4 or strlen($cardNumber) < 16 ){
            // echo '<script> 
            //         swal({
            //             title: "Tarjeta invalida!",
            //             text: "You clicked the button!",
            //             type: "info",
            //             button: "Ok!",
            //         });

            //     </script>';
            echo "<script> 
                    setTimeout(function() { 
                        swal({ 
                            title: 'Tarjeta inválida!', 
                            text: 'Message!', 
                            type: 'info', 
                            confirmButtonText: 'OK'
                        }, 
                        function(isConfirm){ 
                            if (isConfirm) { 
                                window.location.href = 'buyProduct.php?idproductos=$idproductos'; 
                              
                        } 
                    }); }, 1000);
                </script>";
          }else {
            $obj = new Crud();
            $data=$obj->comprarProductos($fecha,$cantidad,$valorTotal,$talla,$idproductos,$idusuario);

            if($data == true){
              $objProducto = new Crud();
              $dataProducto = $objProducto->setProductosId($idproductos);
              $cantidadPrincipal = $dataProducto['cantidad_producto'];
              $cantidadnueva = $cantidadPrincipal - $cantidad;
              if($dataProducto == true){
                $objProdutoUpdateBuy = new Crud();
                $dataProductoUpdateBuy = $objProdutoUpdateBuy -> getProductoUpdateBuy($cantidadnueva,$idproductos);
              }
            }

            $objUser= new Crud();
            $dataUser=$objUser->setUsuario($idusuario);

            require '../../SendEmail/Exception.php';
            require '../../SendEmail/PHPMailer.php';
            require '../../SendEmail/SMTP.php';

            $mail = new PHPMailer\PHPMailer\PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug  = 0;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'Raffiniert28@gmail.com';                     // SMTP username


                //https://support.google.com/mail/answer/185833?hl=es-419 POR ACA INGRESAN PARA CREAR LA CLAVE DE LA APP
                $mail->Password   = 'ybqiefpznkxtupzb';                               // SMTP password
                $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('Raffiniert28@gmail.com', 'Raffiniert');        
              

                $mail->addAddress($dataUser['correo_usuario'], $dataUser['correo_usuario']);     // Add a recipient

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Mensaje automatico';
                $mail->Body    = $f['nombre_usuario'].' <i>Su compra se ha realizado correctamente, pronto Raffiniert se comunicará con usted.<br> Su compra fue: '.$nombre_producto.'</i><img src="cid:logo"></img>';
                $mail->AddEmbeddedImage(dirname(__FILE__) . '/logo.png','logo');
                $mail->AltBody = 'Su compra se harealizado correctamente</b>';

                $mail->send();

                // echo 'Message has been sent';

            } catch (Exception $e) {
                echo "Error en el envio del correo: {$mail->ErrorInfo}";
            }
            echo "<script> 
                    setTimeout(function() { 
                        swal({ 
                            title: 'Compra realizada exitosamente!', 
                            text: 'Message!', 
                            type: 'success', 
                            confirmButtonText: 'OK'
                        }, 
                        function(isConfirm){ 
                            if (isConfirm) { 
                              window.location.href = '../Perfil/myShopping.php'; 
                            } 
                        }); }, 1000);
                  </script>";
            // echo "<script>window.location = '../../index.php';</script>";
          }
      }
      ?>

    <!-- Bootstrap core JavaScript -->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/jquery.payform.min.js" charset="utf-8"></script>
    
    <script>
      var owner = $('#owner'),
          cardNumber = $('#cardNumber'),
          CVV = $("#cvv");
          cardNumber.payform('formatCardNumber');
          CVV.payform('formatCardCVC');
    </script>
</body>
</html>