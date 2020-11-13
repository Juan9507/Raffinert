<?php
session_start();
require_once("../Database/consult.php");
require_once("../Database/connection.php");

if (isset($_POST["email"])) {
    $email = $_POST['email'];
    $contrasenia = $_POST['contrasenia'];
    // VALIDAD EMAIL PARA VER SI EXISTE EL USARIO
    $objemail = new Crud();
    $dataemail=$objemail->setVeriGmail($email);
    // VALIDAR EMAIL Y CONTRASENIA PARA EL LOGUEO
    $objuser = new Crud();
    $datauser=$objuser->validarLogin($email,$contrasenia);
    // VALIDACION
    if($dataemail == ""){
        echo "Usuario no existe";
    }elseif($datauser == true ){
        if($contrasenia==$datauser['contrasenia_usuario'] && $datauser['rol_idrol']==2){
            $_SESSION['idusuario']=$datauser['idusuario'];
            $_SESSION['nombre_usuario']=$datauser['nombre_usuario'];
            $_SESSION['rol_idrol']=$datauser['rol_idrol'];
            echo $_SESSION['rol_idrol'];
            ?>
            
          <?php  
        }elseif($contrasenia==$datauser['contrasenia_usuario'] && $datauser['rol_idrol']==1){
                $_SESSION['idusuario']=$datauser['idusuario'];
                $_SESSION['nombre_usuario']=$datauser['nombre_usuario'];
                $_SESSION['rol_idrol']=$datauser['rol_idrol'];
                    echo $_SESSION['rol_idrol'];
                ?>
       
                
              <?php  
        }
    }else{
        echo "Contraseña incorrecta";
    }
    // if($data){
        
    // } 
}
?>