<?php

namespace MVC;

/**
 * Clase Router para manejar las rutas y las solicitudes GET y POST.
 */
class Router
{
    /** @var array Almacena las rutas GET */
    public array $getRoutes = [];
    
    /** @var array Almacena las rutas POST */
    public array $postRoutes = [];

    /**
     * Registra una ruta GET.
     *
     * @param string $url La URL de la ruta.
     * @param mixed $fn La función a ejecutar cuando se accede a la ruta.
     */
    public function get($url, $fn) {
        $this->getRoutes[$url] = $fn;
    }

    /**
     * Registra una ruta POST.
     *
     * @param string $url La URL de la ruta.
     * @param mixed $fn La función a ejecutar cuando se accede a la ruta.
     */
    public function post($url, $fn) {
        $this->postRoutes[$url] = $fn;
    }

    /**
     * Comprueba las rutas y ejecuta la función correspondiente si se encuentra una coincidencia.
     */
    public function comprobarRutas() {
        $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if ($fn) {
            // Llama a la función de usuario
            call_user_func($fn, $this); // $this se pasa como argumento
        } else {
            echo "Página No Encontrada o Ruta no válida";
        }
    }

    /**
     * Renderiza una vista dentro del layout.
     *
     * @param string $view El nombre de la vista a renderizar.
     * @param array $datos Los datos a pasar a la vista.
     */
    public function render($view, $datos = []) {
        // Leer los datos que se pasan a la vista
        foreach ($datos as $key => $value) {
            $$key = $value; // Doble signo de dólar para variables variables
        }

        ob_start(); // Almacenamiento en memoria durante un momento...

        // Incluir la vista en el layout
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); // Limpia el buffer
        include_once __DIR__ . '/views/layout.php';
    }
}
