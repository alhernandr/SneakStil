<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

/**
 * Clase LoginController
 *
 * Controlador para la autenticación de usuarios.
 */
class LoginController {
    /**
     * Método estático para la página de inicio de sesión.
     *
     * @param Router $router Instancia del enrutador.
     * @return void
     */
    public static function login(Router $router) {
        $errores = [];

        // Verificar si se ha enviado un formulario de inicio de sesión
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Crear una instancia de Usuario con los datos del formulario
            $auth = new Usuario($_POST);
            // Validar los datos del formulario
            $errores = $auth->validar();
        
            // Si no hay errores de validación, proceder con la autenticación
            if (empty($errores)) { 
                // Verificar si el usuario existe en la base de datos
                $resultado = $auth->existeUsuario();
                
                if (!$resultado) {
                    // Si el usuario no existe, obtener los errores de Usuario
                    $errores = Usuario::getErrores();
                } else {
                    // Obtener el objeto de usuario
                    $usuario = $resultado->fetchObject();
                    // Comprobar la contraseña proporcionada con la almacenada en la base de datos
                    $autenticado = $auth->comprobarPassword($usuario);

                    if ($autenticado) {
                        // Si la contraseña es correcta, autenticar al usuario
                        $user = Usuario::find($usuario->id);
                        $user->autenticar();
                    } else {
                        // Si la contraseña no es correcta, obtener los errores de Usuario
                        $errores = Usuario::getErrores();
                    }
                }
            }
        }

        // Renderizar la vista de inicio de sesión con los errores (si los hay)
        $router->render('auth/login', [
            'errores' => $errores
        ]); 
    }

    /**
     * Método estático para cerrar sesión.
     *
     * @return void
     */
    public static function logout() {
        // Iniciar sesión y limpiar todas las variables de sesión
        session_start();
        $_SESSION = [];
        session_destroy();
        // Redireccionar al inicio
        header('Location: /');
    }
}
