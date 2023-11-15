<?php session_start();
 function esAutentificado():bool{
        $auth=$_SESSION["login"]??NULL;
        if($auth){
            return true;
        }
        return false;
    }
?>