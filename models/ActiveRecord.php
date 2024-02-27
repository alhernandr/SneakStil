<?php
namespace Model;

/**
 * Clase ActiveRecord
 *
 * Clase base para los modelos que interactúan con la base de datos utilizando el patrón Active Record.
 */
class ActiveRecord {

    // Base de datos
    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];

    // Errores
    protected static $errores = [];

    /**
     * Establece la conexión a la base de datos.
     *
     * @param mixed $database La instancia de la base de datos.
     * @return void
     */
    public static function setDB($database) {
        self::$db = $database;
    }

    /**
     * Devuelve los errores ocurridos durante la validación.
     *
     * @return array Los errores de validación.
     */
    public static function getErrores() {
        return static::$errores;
    }

    /**
     * Realiza la validación de los datos.
     *
     * @return array Los errores de validación.
     */
    public function validar() {
        static::$errores = [];
        return static::$errores;
    }

    /**
     * Guarda un registro en la base de datos.
     *
     * @return mixed El resultado de la operación de guardado.
     */
    public function guardar() {
        try {
            $resultado = '';
            if (!is_null($this->id)) {
                // Actualizar el registro si ya existe
                $resultado = $this->actualizar();
            } else {
                // Crear un nuevo registro si no existe
                $resultado = $this->crear();
            }
            return $resultado;
        } catch (\Exception $e) {
            // Manejar la excepción
            return false;
        }
    }

    /**
     * Obtiene todos los registros de la tabla.
     *
     * @return array Los registros de la tabla.
     */
    public static function all() {
        try {
            $query = "SELECT * FROM " . static::$tabla;
            $resultado = self::consultarSQL($query);
            return $resultado;
        } catch (\Exception $e) {
            // Manejar la excepción
            return [];
        }
    }

    /**
     * Busca un registro por su ID.
     *
     * @param int $id El ID del registro a buscar.
     * @return mixed El registro encontrado.
     */
    public static function find($id) {
        try {
            $query = "SELECT * FROM " . static::$tabla  ." WHERE id = {$id}";
            $resultado = self::consultarSQL($query);
            return array_shift($resultado);
        } catch (\Exception $e) {
            // Manejar la excepción
            return null;
        }
    }

    /**
     * Obtiene un número específico de registros de la tabla.
     *
     * @param int $limite El número máximo de registros a obtener.
     * @return array Los registros obtenidos.
     */
    public static function get($limite) {
        try {
            $query = "SELECT * FROM " . static::$tabla . " LIMIT {$limite}";
            $resultado = self::consultarSQL($query);
            return $resultado;
        } catch (\Exception $e) {
            // Manejar la excepción
            return [];
        }
    }

    // Métodos restantes...

    /**
     * Consulta la base de datos utilizando la consulta proporcionada.
     *
     * @param string $query La consulta SQL a ejecutar.
     * @return array Los resultados de la consulta.
     */
    public static function consultarSQL($query) {
        try {
            // Consultar la base de datos
            $resultado = self::$db->query($query);

            // Iterar los resultados y crear objetos basados en los registros
            $array = [];
            while ($registro = $resultado->fetch()) {
                $array[] = static::crearObjeto($registro);
            }

            return $array;
        } catch (\Exception $e) {
            // Manejar la excepción
            return [];
        }
    }
/**
 * Crea un objeto basado en un registro de base de datos.
 *
 * @param array $registro El registro de base de datos.
 * @return object El objeto creado.
 */
protected static function crearObjeto($registro) {
    $objeto = new static;

    // Asignar valores a las propiedades del objeto
    foreach ($registro as $key => $value ) {
        if (property_exists($objeto, $key)) {
            $objeto->$key = $value;
        }
    }

    return $objeto;
    }

    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value ) {
            $sanitizado[$key] = $value;
        }
        return $sanitizado;
    }

    // Identificar y unir los atributos de la BD
    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }
}