<?php
    
namespace Controllers;

use MVC\Router;
use Model\Producto;
    
/**
 * Clase productoController
 *
 * Controlador para la gestión de productos.
 */
class productoController{
    /**
     * Método estático para borrar un producto.
     *
     * @param Router $router Instancia del enrutador.
     * @return void
     */
    public static function borrar(Router $router){
        // Obtener el ID del producto a borrar
        $id=$_GET['id'];
        
        // Buscar el producto en la base de datos
        $producto = Producto::find($id);

        // Eliminar el producto y redireccionar a la página de administración
        $resultado = $producto->eliminar();
        if($resultado){
            header("Location: /admin");
        }
    }

    /**
     * Método estático para crear un nuevo producto.
     *
     * @param Router $router Instancia del enrutador.
     * @return void
     */
    public static function crear(Router $router){
        $errores=[];
        
        // Verificar si se ha enviado un formulario de creación de producto
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Crear una instancia de Producto con los datos del formulario
            $prod = new Producto($_POST);
            // Validar los datos del formulario
            $errores = $prod->validar();
            if(empty($errores)){
                // Verificar si el producto ya existe
                $res = $prod->existeProducto();
                if($res){
                    // Crear el producto y redireccionar a la página de administración
                    $resultado = $prod->crear();
                    if($resultado){
                        header("Location: /admin");
                    }
                }
            }
        }

        // Renderizar la vista de creación de producto con los errores (si los hay)
        $router->render('sneakers/crear', [
            'errores' => $errores
        ]); 
    }   

    /**
     * Método estático para actualizar un producto existente.
     *
     * @param Router $router Instancia del enrutador.
     * @return void
     */
    public static function actualizar(Router $router){
        $errores=[];
        $id = $_GET['id'];
        // Buscar el producto a actualizar en la base de datos
        $producto = Producto::find($id);
        
        // Verificar si se ha enviado un formulario de actualización de producto
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Crear una instancia de Producto con los datos del formulario
            $prod = new Producto($_POST);
            $prod->setID($id);
            // Validar los datos del formulario
            $errores = $prod->validar();
            if(empty($errores)){
                    // Actualizar el producto y redireccionar a la página de administración
                    $resultado = $prod->actualizar();
                    if($resultado){
                        header("Location: /admin");
                    }
            }
        }

        // Renderizar la vista de actualización de producto con los errores (si los hay) y los datos del producto
        $router->render('sneakers/actualizar', [
            'errores' => $errores,
            'producto' => $producto
        ]); 
    } 
}
