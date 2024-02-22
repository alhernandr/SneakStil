<?php

namespace Controllers;

use MVC\Router;
use Model\Producto;

/**
 * Clase adminController
 *
 * Controlador para la sección de administración.
 */
class adminController {
    /**
     * Método estático para la página de administración.
     *
     * @param Router $router Instancia del enrutador.
     * @return void
     */
    public static function admin(Router $router) {
        // Obtener el parámetro 'resultado' de la URL, si está presente
        $resultado = $_GET['resultado'] ?? null;

        // Obtener todos los productos
        $productos = Producto::obtenerProductos();

        // Mostrar el valor de 'resultado' para propósitos de depuración
        var_dump($resultado);

        // Renderizar la vista de administración con los productos y el resultado
        $router->render('admin/index', [
            'productos' => $productos,
            'resultado' => $resultado
        ]); 
    }
}
