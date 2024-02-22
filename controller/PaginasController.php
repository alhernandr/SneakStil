<?php

namespace Controllers;

use MVC\Router;

/**
 * Clase PaginasController
 *
 * Controlador para la gestión de páginas genéricas.
 */
class PaginasController {
    /**
     * Método estático para la página de inicio.
     *
     * @param Router $router Instancia del enrutador.
     * @return void
     */
    public static function index(Router $router) {
        // Renderizar la vista de la página de inicio
        $router->render('paginas/index', [
        ]);
    }
}
