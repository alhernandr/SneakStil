<?php

namespace Model;

/**
 * Clase Producto
 *
 * Representa un producto en la base de datos.
 */
class Producto extends ActiveRecord {

    /** @var string Nombre de la tabla en la base de datos */
    protected static $tabla = 'productos';

    /** @var array Columnas de la tabla en la base de datos */
    protected static $columnasDB = ['id', 'nombre', 'marca', 'precio', 'disponibilidad', 'imagen'];

    /** @var int|null ID del producto */
    public $id;

    /** @var string|null Nombre del producto */
    public $nombre;

    /** @var string|null Marca del producto */
    public $marca;

    /** @var float|null Precio del producto */
    public $precio;

    /** @var bool|null Disponibilidad del producto */
    public $disponibilidad;

    /** @var string|null Imagen del producto */
    public $imagen;

    /**
     * Constructor de la clase Producto.
     *
     * @param array $args Los argumentos para inicializar el producto.
     */
    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['Nombre'] ?? null;
        $this->marca = $args['Marca'] ?? null;
        $this->precio = $args['Precio'] ?? null;
        $this->disponibilidad = $args['Disponibilidad'] ?? null;
        $this->imagen = $args['imagen'] ?? null;
    }

    /**
     * Realiza la validación de los datos del producto.
     *
     * @return array Los errores de validación.
     */
    public function validar() {
        if (!$this->nombre) {
            self::$errores[] = "El nombre es obligatorio";
        }
        if (!$this->marca) {
            self::$errores[] = "La marca es obligatoria";
        }
        if (!$this->precio) {
            self::$errores[] = "El precio es obligatorio";
        }
        if (!$this->disponibilidad) {
            self::$errores[] = "La disponibilidad es obligatoria";
        }
        
        return self::$errores;
    }

    /**
     * Establece el ID del producto.
     *
     * @param int $id El ID del producto.
     * @return void
     */
    public function setID($id) {
        $this->id = $id;
    }

    /**
     * Verifica si un producto ya existe en la base de datos.
     *
     * @return bool True si el producto existe, false si no.
     */
    public function existeProducto() {
        // Revisar si el producto existe.
        $query = "SELECT * FROM " . self::$tabla . " WHERE nombre = '" . $this->nombre . "' LIMIT 1";
        $resultado = self::$db->query($query);

        if ($resultado->rowCount()) {
            self::$errores[] = 'El producto ya existe';
            return;
        }

        return true;
    }

    /**
     * Obtiene todos los productos de la base de datos.
     *
     * @return array Los productos obtenidos.
     */
    public static function obtenerProductos() {
        // Obtener todos los productos.
        $query = "SELECT * FROM " . self::$tabla;
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    /**
     * Elimina un producto de la base de datos.
     *
     * @return bool True si el producto se eliminó correctamente, false si no.
     */
    public function eliminar() {
        $query = "DELETE FROM " . self::$tabla . " WHERE id=" . $this->id;
        $resultado = self::$db->query($query);
        return $resultado;
    }

}
?>
