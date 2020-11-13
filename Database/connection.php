<?php
 class Conexion{
      //Variables para la conexion
      protected $host="localhost";
      protected $db_name="raffiniert";
      protected $user="root";
      protected $password="";

     public function __construct(){
         try{
            
            //Cadena de la conexion
            $this->con=mysqli_connect($this->host,$this->user,$this->password) or die ("Error en la conexion");
            //seleccion de la base de datos
            mysqli_select_db($this->con,$this->db_name) or die ("No se encontro la base de datos");

         }catch(exception $ex){
            throw $ex;
         }
     }

     protected function setNames(){
         return $this->con->query("SET NAMES 'utf8'");
     }
 }

?>