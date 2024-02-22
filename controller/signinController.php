<?php 

namespace Controllers;

use MVC\Router;
use Model\Admin;

/**
 * Clase signinController
 *
 * Controlador para el registro de usuarios.
 */
class signinController {
    /**
     * Método estático para el registro de usuarios.
     *
     * @param Router $router Instancia del enrutador.
     * @return void
     */
    public static function signin(Router $router) {
        $errores=[];

        // Establecer variables para almacenar los datos del formulario
        $nombre='';
        $email= '';
        $password = '';

        // Verificar si se ha enviado un formulario de registro
        if ($_SERVER['REQUEST_METHOD']==="POST"){
            // Obtener los datos del formulario
            $nombre= $_POST['username'];
            $email= $_POST['email'];
            $password= $_POST['password'];

            // Validar los campos del formulario
            if (!$nombre) {
                $errores[]="Debes añadir un nombre";
            } else if (!$email) {
                $errores[]="Debes añadir un email";
            } else if (!$password) {
                $errores[]="Debes añadir una contraseña";
            }

            // Si no hay errores, proceder con el registro del usuario
            if(empty($errores)){
                // Generar un hash de la contraseña
                $passwordHash=password_hash($password,PASSWORD_DEFAULT);
                // Establecer conexión con la base de datos (suponiendo que la función conectarDB() esté definida en otro lugar)
                $db=conectarDB();
                // Query para insertar el nuevo usuario en la base de datos
                $query="INSERT INTO clientes (nombre, email, pasword) VALUES ('$nombre', '$email', '$passwordHash');";
                // Ejecutar la consulta
                $resultado=mysqli_query($db,$query);
            }
        }
        // Renderizar la vista de registro con los errores (si los hay)
        $router->render('auth/signin', [
            'errores' => $errores
        ]);         
    }
}
