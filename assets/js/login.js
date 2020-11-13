$(document).ready(function () {
    $("#submit").on("click", (e) => {
        // Variables globales
        let correoValidado = "";
        let contraseniaValidado = "";

        e.preventDefault();
        let correo = document.getElementById("email").value;
        let contrasenia = document.getElementById("contrasenia").value;
        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        if(correo.length == 0) {
            $("#mensajeAlert").text('Campo requerido');
            $("#mensajeAlert").css({"display": "block"});
        }else if(emailRegex.test(correo)){
            // console.log("La dirección de email " + correo + " es correcta.");
            $("#mensajeAlert").removeClass('alert-danger');
            $("#mensajeAlert").addClass('alert-success');
            $("#mensajeAlert").text('Correo correcto');
            $("#mensajeAlert").css({"display": "block"});
            correoValidado = correo;
        }else{
            $("#mensajeAlert").removeClass('alert-success');
            $("#mensajeAlert").addClass('alert-danger');
            $("#mensajeAlert").text('correo invalido');
            $("#mensajeAlert").css({"display": "block"});
        }

        if(contrasenia.length == 0) {
            $("#mensajeContraseña").text('Campo requerido');
            $("#mensajeContraseña").css({"display": "block"});
        }else if(contrasenia.length > 0){
            contraseniaValidado = contrasenia;
        }

        if(correoValidado == "" && contraseniaValidado==""){
            console.log("vacio");
        }else if(correoValidado.length > 0 && contraseniaValidado.length > 0 ){
                e.preventDefault();
                let data=$("#formLogin").serialize();
                // var data=$(this).serialize();
                // console.log("desde la peticion",data);
                // alert('Datos serializados: '+data);
                //AJAX.
                $.ajax({  
                    type : 'POST',
                    url  : 'Controller/login.php',
                    data: data, 

                    success:function(data) {  
                        // $('#respuesta').html(data).fadeIn();
                        // document.getElementById("formLogin").reset();
                        document.getElementById("formLogin").reset();
                        $("#mensajeContraseña").css({"display": "none"});
                        $("#mensajeAlert").css({"display": "none"});
                        if(data==2){
                            window.location.href = 'Admin/index.php';
                        }else if(data == 1){
                            location.reload();
                        }else{
                            // window.location.href = 'index.php?id_usuario='+data;
                            alert(data);
                        }
                        
                    }  
                });
                return false;  
        }
        
    });
    
});