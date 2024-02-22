<?php 
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\PaginasController;
use Controllers\LoginController;
use Controllers\shopController;
use Controllers\signinController;
use Controllers\basketController;
use Controllers\adminController;
use Controllers\productoController;

$router = new Router();

$router->get('/', [PaginasController::class, 'index']);
$router->get('/shop', [shopController::class, 'shop']);
$router->get('/basket', [basketController::class, 'basket']);
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/signin', [signinController::class, 'signin']);
$router->post('/signin', [signinController::class, 'signin']);
$router->get('/logout', [LoginController::class, 'logout']);
$router->get('/admin', [adminController::class,'admin']);
$router->get('/crear', [productoController::class,'crear']);
$router->post('/crear', [productoController::class,'crear']);
$router->get('/actualizar', [productoController::class,'actualizar']);
$router->post('/actualizar', [productoController::class,'actualizar']);
$router->get('/borrar', [productoController::class,'borrar']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();