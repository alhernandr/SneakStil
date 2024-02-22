<?php

namespace Controllers;

use MVC\Router;

/**
 * Clase basketController
 *
 * Controlador para la gestión de la cesta de la compra.
 */
class basketController {
    /**
     * Método estático para la página de la cesta de la compra.
     *
     * @param Router $router Instancia del enrutador.
     * @return void
     */
    public static function basket(Router $router) {
        // Renderizar la vista de la cesta de la compra
        $router->render('paginas/basket', [
        ]);
    }
}
