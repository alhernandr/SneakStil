<?php
    function conectarDB(){
        $dns = 'mysql:dbname=sneakstil;host=localhost'; //DSN para la conexión a la base de datos.
        $user= 'root'; //Nombre de usuario para la conexión a la base de datos.
        $password = ''; //COntraseña para la conexión a la base de datos.

       
        $db = new PDO($dns, $user, $password);
        
        if (!$db){
            echo "Error: no se puede conectar a la base de datos.";
            exit;
        }else{
            return $db;
        }
    }
?>