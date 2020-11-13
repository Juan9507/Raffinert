<?php
    require_once("connection.php");
    class Crud extends conexion{
        // GESTION PRODUCTOS
        public function setProductosLimit(){
            $this->setNames();
            $sql="select * from productos where estado_producto=1 ORDER BY idproductos DESC LIMIT 6 ";
            $resul=mysqli_query($this->con,$sql);
            $data=NULL;
            while($fila=mysqli_fetch_assoc($resul)){
                $data[]=$fila;
            }
    
            return $data;
         }

         public function setProductos(){
            $this->setNames();
            $sql="select idproductos,nombre_producto,descripcion_producto,precio_producto,cantidad_producto,img_producto,nombre_marca,nombre_genero,nombre_proveedor from productos INNER JOIN marca,genero,proveedor where productos.marca_idmarca=marca.idmarca && productos.genero_idgenero=genero.idgenero && productos.proveedor_idproveedor=proveedor.idproveedor && estado_producto=1";
            $resul=mysqli_query($this->con,$sql);
            $data=NULL;
            while($fila=mysqli_fetch_assoc($resul)){
                $data[]=$fila;
            }
    
            return $data;
         }

        public function setProductosId($seleccion){
            $this->setNames();
            $sql="select idproductos,nombre_producto,descripcion_producto,precio_producto,cantidad_producto,img_producto,marca_idmarca,genero_idgenero,proveedor_idproveedor,nombre_marca,nombre_genero,nombre_proveedor from productos INNER JOIN marca,genero,proveedor WHERE productos.marca_idmarca=marca.idmarca && productos.genero_idgenero=genero.idgenero && productos.proveedor_idproveedor=proveedor.idproveedor && idproductos='$seleccion' && estado_producto=1";
            $result=mysqli_query($this->con,$sql);
            $f=mysqli_fetch_array($result);
            return $f;
        }

        public function getProductos($nombre,$descripcion,$precio,$cantidad,$imagen,$marca,$genero,$proveedor){
            try{
                $this->setNames();
                $sql="insert into productos (idproductos,nombre_producto,descripcion_producto,precio_producto,cantidad_producto,img_producto,estado_producto,marca_idmarca,genero_idgenero,proveedor_idproveedor) values ('','".$nombre."','".$descripcion."','".$precio."','".$cantidad."','".$imagen."','1','".$marca."','".$genero."','".$proveedor."')";
                if ($this->con->query($sql)==true){
                   return true;
                }else{
                    echo "Error: " . $sql . "<br>" . $this->con->error;
                }
             }catch(exception $ex){
                 throw $ex;
             }
        }

        public function getProductoUpdate($nombre,$descripcion,$precio,$cantidad,$imagen,$marca,$genero,$proveedor,$idproductos){
            try{
                $this->setNames();
                $sql= "update productos set nombre_producto='$nombre', descripcion_producto='$descripcion', precio_producto='$precio', cantidad_producto='$cantidad', img_producto='$imagen', marca_idmarca='$marca', genero_idgenero='$genero', proveedor_idproveedor='$proveedor' where idproductos='$idproductos'";
                if ($this->con->query($sql)==true){
                 return true;
                }else{
                  echo "Error: " . $sql . "<br>" . $this->con->error;
                }
             }catch(exception $ex){
                 throw $ex;
             }
        }

        public function getProductoUpdateBuy($cantidad,$id){
            try{
                $this->setNames();
                $sql= "update productos set cantidad_producto='$cantidad' where idproductos='$id'";
                if ($this->con->query($sql)==true){
                  return true;
                }else{
                  echo "Error: " . $sql . "<br>" . $this->con->error;
                }
             }catch(exception $ex){
                 throw $ex;
             }
        }

        public function getProductosDelete($id){
            try{
                $this->setNames();
                $sql= "update productos set estado_producto=0 where idproductos='$id'";
                if ($this->con->query($sql)==true){
                //  echo "Registro guardado";
                }else{
                  echo "Error: " . $sql . "<br>" . $this->con->error;
                }
             }catch(exception $ex){
                 throw $ex;
             }
        }

        // ***************************************************************************************************

        // GESTION MARCA

        public function setMarca(){
            $this->setNames();
            $sql="select * from marca where estado_marca=1";
            $resul=mysqli_query($this->con,$sql);
            $data=NULL;
            while($fila=mysqli_fetch_assoc($resul)){
                $data[]=$fila;
            }
    
            return $data;
        }

        public function getMarca($nombre){
            try{
                $this->setNames();
                $sql="insert into marca (idmarca,nombre_marca,estado_marca) values ('','".$nombre."','1')";
                if ($this->con->query($sql)==true){
                    //   echo "Registro guardado";
                }else{
                    echo "Error: " . $sql . "<br>" . $this->con->error;
                }
             }catch(exception $ex){
                 throw $ex;
             }

        }

        public function setMarcaId($id){
            $this->setNames();
            $sql="select * from marca where idmarca='$id' && estado_marca=1";
            $result=mysqli_query($this->con,$sql);
            $f=mysqli_fetch_array($result);
            return $f;
        }

        public function getMarcaUpdate($nombre, $id){
            try{
                $this->setNames();
                $sql= "update marca set nombre_marca='$nombre' where idmarca='$id'";
                if ($this->con->query($sql)==true){
                //  echo "Registro guardado";
                }else{
                  echo "Error: " . $sql . "<br>" . $this->con->error;
                }
             }catch(exception $ex){
                 throw $ex;
             }
        }

        public function getMarcaDelete($id){
            try{
                $this->setNames();
                $sql= "update marca set estado_marca=0 where idmarca='$id'";
                if ($this->con->query($sql)==true){
                //  echo "Registro guardado";
                }else{
                  echo "Error: " . $sql . "<br>" . $this->con->error;
                }
             }catch(exception $ex){
                 throw $ex;
             }
        }

        // ****************************************************************************************************************

        // GESTION GENERO

        public function setGenero(){
            $this->setNames();
            $sql="select * from genero where estado_genero=1";
            $resul=mysqli_query($this->con,$sql);
            $data=NULL;
            while($fila=mysqli_fetch_assoc($resul)){
                $data[]=$fila;
            }
    
            return $data;
        }

        public function setGeneroId($id){
            $this->setNames();
            $sql="select * from genero where idgenero='$id' && estado_genero=1";
            $result=mysqli_query($this->con,$sql);
            $f=mysqli_fetch_array($result);
            return $f;
        }

        public function getGenero($nombre){
            try{
                $this->setNames();
                $sql="insert into genero (idgenero,nombre_genero,estado_genero) values ('','".$nombre."','1')";
                if ($this->con->query($sql)==true){
                    //   echo "Registro guardado";
                }else{
                    echo "Error: " . $sql . "<br>" . $this->con->error;
                }
             }catch(exception $ex){
                 throw $ex;
             }

        }

        public function getGeneroUpdate($nombre, $id){
            try{
                $this->setNames();
                $sql= "update genero set nombre_genero='$nombre' where idgenero='$id'";
                if ($this->con->query($sql)==true){
                //  echo "Registro guardado";
                }else{
                  echo "Error: " . $sql . "<br>" . $this->con->error;
                }
             }catch(exception $ex){
                 throw $ex;
             }
        }
        public function getGeneroDelete($id){
            try{
                $this->setNames();
                $sql= "update genero set estado_genero=0 where idgenero='$id'";
                if ($this->con->query($sql)==true){
                //  echo "Registro guardado";
                }else{
                  echo "Error: " . $sql . "<br>" . $this->con->error;
                }
             }catch(exception $ex){
                 throw $ex;
             }
        }

        // ***************************************************************************************************************************

        // GESTION PROVEEDOR

        public function setProveedor(){
            $this->setNames();
            $sql="select * from proveedor where estado_proveedor=1";
            $resul=mysqli_query($this->con,$sql);
            $data=NULL;
            while($fila=mysqli_fetch_assoc($resul)){
                $data[]=$fila;
            }
    
            return $data;
        }

        public function setProveedorId($id){
            $this->setNames();
            $sql="select * from proveedor where idproveedor='$id' && estado_proveedor=1";
            $result=mysqli_query($this->con,$sql);
            $f=mysqli_fetch_array($result);
            return $f;
        }



        public function getproveedor($nombre,$direccion,$correo,$ciudad,$telefono){
            try{
                $this->setNames();
                $sql="insert into proveedor (idproveedor,nombre_proveedor,direccion_proveedor,correo_proveedor,ciudad_proveedor,telefono_proveedor,estado_proveedor) values ('','".$nombre."','".$direccion."','".$correo."','".$ciudad."','".$telefono."','1')";
                if ($this->con->query($sql)==true){
                    return true;
                }else{
                    echo "Error: " . $sql . "<br>" . $this->con->error;
                }
             }catch(exception $ex){
                 throw $ex;
             }

        }

        public function getProveedorUpdate($nombre,$direccion,$correo,$ciudad, $telefono, $id){
            try{
                $this->setNames();
                $sql= "update proveedor set nombre_proveedor='$nombre', direccion_proveedor='$direccion', correo_proveedor='$correo', ciudad_proveedor='$ciudad', telefono_proveedor='$telefono' where idproveedor='$id'";
                if ($this->con->query($sql)==true){
                    return true;
                }else{
                  echo "Error: " . $sql . "<br>" . $this->con->error;
                }
             }catch(exception $ex){
                 throw $ex;
             }
        }

        public function getProveedorDelete($id){
            try{
                $this->setNames();
                $sql= "update proveedor set estado_proveedor=0 where idproveedor='$id'";
                if ($this->con->query($sql)==true){
                   return true;
                }else{
                  echo "Error: " . $sql . "<br>" . $this->con->error;
                }
             }catch(exception $ex){
                 throw $ex;
             }
        }

        // GESTIÓN USUARIO

        public function setUsuarioTodo(){
            $this->setNames();
            $sql="select * from usuario where estado_usuario=1";
            $resul=mysqli_query($this->con,$sql);
            $data=NULL;
            while($fila=mysqli_fetch_assoc($resul)){
                $data[]=$fila;
            }
    
            return $data;
        }

        public function setUsuario($seleccion){
            $this->setNames();
            $sql="select * from usuario where idusuario='$seleccion' && estado_usuario=1";
            $result=mysqli_query($this->con,$sql);
            $f=mysqli_fetch_array($result);
            return $f;
        }

        public function setVeriGmail($seleccion){
            $this->setNames();
            $sql="select * from usuario where correo_usuario='$seleccion' && estado_usuario=1";
            $result=mysqli_query($this->con,$sql);
            if($f=mysqli_fetch_array($result) == true){
                return $f;
            }else{
                echo "";
            }
            
        }

        public function getRegistro($nombre,$apellido,$direccion,$telefono,$ciudad,$email,$contrasenia){
            try{
                $this->setNames();
                $sql="insert into usuario (idusuario,nombre_usuario,apellido_usuario,direccion_usuario,telefono_usuario,ciudad_usuario,correo_usuario,contrasenia_usuario,estado_usuario,rol_idrol) values ('','".$nombre."','".$apellido."','".$direccion."','".$telefono."','".$ciudad."','".$email."','".$contrasenia."','1','1')";
                if ($this->con->query($sql)==true){
                    //   echo "Registro guardado";
                }else{
                    echo "Error: " . $sql . "<br>" . $this->con->error;
                }
             }catch(exception $ex){
                 throw $ex;
             }
        }

        public function validarLogin($email,$contrasenia){
            $this->setNames();
            $sql="select * from usuario where correo_usuario='$email' && contrasenia_usuario='$contrasenia' && estado_usuario=1";
            $result=mysqli_query($this->con,$sql);
            $f=mysqli_fetch_array($result);
            return $f;
        }

        public function ventasProducts($validar){
            $this->setNames();
            $sql="select idventas,fecha_venta,cantidad_venta,valor_venta,venta_talla,nombre_producto,descripcion_producto,img_producto from ventas INNER JOIN productos where ventas.productos_idproductos=productos.idproductos && usuario_idusuario='$validar' && estado_venta=1";
            $result=mysqli_query($this->con,$sql);
            $data=NULL;
            while($fila=mysqli_fetch_assoc($result)){
                $data[]=$fila;
            }
            return $data;
        }

        public function ventas(){
            $this->setNames();
            $sql="select idventas,fecha_venta,cantidad_venta,valor_venta,venta_talla,nombre_producto,nombre_usuario from ventas INNER JOIN productos,usuario WHERE ventas.productos_idproductos=productos.idproductos && ventas.usuario_idusuario=usuario.idusuario && estado_venta=1";
            // $sql="select * from ventas where estado_venta=1";
            $resul=mysqli_query($this->con,$sql);
            $data=NULL;
            while($fila=mysqli_fetch_assoc($resul)){
                $data[]=$fila;
            }
    
            return $data;
        }

        public function ventasFecha($inicial,$final){
            $this->setNames();
            $sql="select idventas,fecha_venta,cantidad_venta,valor_venta,venta_talla,nombre_producto,nombre_usuario from ventas INNER JOIN productos,usuario WHERE ventas.productos_idproductos=productos.idproductos && ventas.usuario_idusuario=usuario.idusuario && fecha_venta BETWEEN '".$inicial."' and '".$final."'";
            $resul=mysqli_query($this->con,$sql);
            $data=NULL;
            while($fila=mysqli_fetch_assoc($resul)){
                $data[]=$fila;
            }
    
            return $data;
        }

        public function getVentasDelete($id){
            try{
                $this->setNames();
                $sql= "update ventas set estado_venta=0 where idventas='$id'";
                if ($this->con->query($sql)==true){
                   return true;
                }else{
                  echo "Error: " . $sql . "<br>" . $this->con->error;
                }
             }catch(exception $ex){
                 throw $ex;
             }
        }

        public function comprarProductos($fecha,$cantidad,$valorTotal,$talla,$idproductos,$idusuario){
            try{
                $this->setNames();
                $sql= "insert into ventas (fecha_venta,cantidad_venta,valor_venta,venta_talla,estado_venta,productos_idproductos,usuario_idusuario) values ('".$fecha."','".$cantidad."','".$valorTotal."','".$talla."','1','".$idproductos."','".$idusuario."')";
                if ($this->con->query($sql)==true){
                  return true;
                }else{
                  echo "Error: " . $sql . "<br>" . $this->con->error;
                }
             }catch(exception $ex){
                 throw $ex;
             }
        }

        public function actualizarContrasenia($validar, $idusuario){
            try{
                $this->setNames();
                $sql= "update usuario set contrasenia_usuario='$validar' where idusuario='$idusuario'";
                if ($this->con->query($sql)==true){
                //  echo "Registro guardado";
                }else{
                  echo "Error: " . $sql . "<br>" . $this->con->error;
                }
             }catch(exception $ex){
                 throw $ex;
             }
        }

        public function actualizarDatos($nombre,$apellido,$direccion,$telefono,$ciudad,$email,$contrasenia,$idusuario){
            try{
                $this->setNames();
                $sql= "update usuario set nombre_usuario='$nombre',apellido_usuario='$apellido', direccion_usuario='$direccion',telefono_usuario='$telefono',ciudad_usuario='$ciudad', correo_usuario='$email' where idusuario='$idusuario' && contrasenia_usuario='$contrasenia'";
                if ($this->con->query($sql)==true){
                //  echo "Registro guardado";
                }else{
                  echo "Error: " . $sql . "<br>" . $this->con->error;
                }
             }catch(exception $ex){
                 throw $ex;
             }
        }

    }
?>