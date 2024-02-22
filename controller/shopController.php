<?php

namespace Controllers;

use MVC\Router;

/**
 * Clase shopController
 *
 * Controlador para la tienda.
 */
class shopController {
    /**
     * Método estático para la página de la tienda.
     *
     * @param Router $router Instancia del enrutador.
     * @return void
     */
    public static function shop(Router $router) {
        // Renderizar la vista de la tienda
        $router->render('paginas/shop', [
        ]);
    }
}
