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
        $resultado = '';
        if (!is_null($this->id)) {
            // Actualizar el registro si ya existe
            $resultado = $this->actualizar();
        } else {
            // Crear un nuevo registro si no existe
            $resultado = $this->crear();
        }
        return $resultado;
    }

    /**
     * Obtiene todos los registros de la tabla.
     *
     * @return array Los registros de la tabla.
     */
    public static function all() {
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    /**
     * Busca un registro por su ID.
     *
     * @param int $id El ID del registro a buscar.
     * @return mixed El registro encontrado.
     */
    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE id = {$id}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    /**
     * Obtiene un número específico de registros de la tabla.
     *
     * @param int $limite El número máximo de registros a obtener.
     * @return array Los registros obtenidos.
     */
    public static function get($limite) {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT {$limite}";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    /**
     * Crea un nuevo registro en la base de datos.
     *
     * @return mixed El resultado de la operación de creación.
     */
    public function crear() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Insertar en la base de datos
        $query = "INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        // Resultado de la consulta
        $resultado = self::$db->query($query);

        return $resultado;
    }

    /**
     * Actualiza un registro en la base de datos.
     *
     * @return mixed El resultado de la operación de actualización.
     */
    public function actualizar() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$tabla ." SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE id = '" . $this->id . "' ";
        $query .= " LIMIT 1 "; 

        // Ejecutar la consulta
        $resultado = self::$db->query($query);

        return $resultado;
    }
// Eliminar un registro
public function borrar() {
    // Eliminar el registro
    $query = "DELETE FROM "  . static::$tabla . " WHERE id = " . $this->id . " LIMIT 1";
    $resultado = self::$db->query($query);

    // Si se elimina correctamente, también se elimina la imagen asociada
    if ($resultado) {
        $this->borrarImagen();
    }

    return $resultado;
}

/**
 * Consulta la base de datos utilizando la consulta proporcionada.
 *
 * @param string $query La consulta SQL a ejecutar.
 * @return array Los resultados de la consulta.
 */
public static function consultarSQL($query) {
    // Consultar la base de datos
    $resultado = self::$db->query($query);

    // Iterar los resultados y crear objetos basados en los registros
    $array = [];
    while ($registro = $resultado->fetch()) {
        $array[] = static::crearObjeto($registro);
    }

    return $array;
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
}