<?php

namespace Model;

/**
 * Clase Usuario
 *
 * Representa un usuario en la base de datos.
 */
class Usuario extends ActiveRecord {
   
    /** @var string Nombre de la tabla en la base de datos */
    protected static $tabla = 'clientes';

    /** @var array Columnas de la tabla en la base de datos */
    protected static $columnasDB = ['id', 'email', 'password'];

    /** @var int|null ID del usuario */
    public $id;

    /** @var string|null Email del usuario */
    public $email;

    /** @var string|null Contraseña del usuario */
    public $password;

    /** @var int|null Indicador de administrador (0 para no admin, 1 para admin) */
    public $admin;

    /**
     * Constructor de la clase Usuario.
     *
     * @param array $args Los argumentos para inicializar el usuario.
     */
    public function __construct($args = []) {
        $this->email = $args['email'] ?? null;
        $this->password = $args['password'] ?? null;
        $this->id = $args['id'] ?? null;
        $this->admin = 0;
    }

    /**
     * Realiza la validación de los datos del usuario.
     *
     * @return array Los errores de validación.
     */
    public function validar() {
        if (!$this->email) {
            self::$errores[] = "El Email del usuario es obligatorio";
        }
        if (!$this->password) {
            self::$errores[] = "El Password del usuario es obligatorio";
        }
        return self::$errores;
    }

    /**
     * Verifica si un usuario ya existe en la base de datos.
     *
     * @return mixed El resultado de la consulta si el usuario existe, null si no.
     */
    public function existeUsuario() {
        // Revisar si el usuario existe.
        $query = "SELECT * FROM " . self::$tabla . " WHERE nombre like '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);

        if (!$resultado->rowCount()) {
            self::$errores[] = 'El Usuario No Existe';
            return;
        }

        return $resultado;
    }

    /**
     * Comprueba si la contraseña proporcionada coincide con la del usuario en la base de datos.
     *
     * @param mixed $resultado El resultado de la consulta que contiene al usuario.
     * @return bool True si la contraseña es correcta, false si no.
     */
    public function comprobarPassword($resultado) {
        $autenticado = password_verify($this->password, $resultado->pasword);

        if (!$autenticado) {
            self::$errores[] = 'El Password es Incorrecto';
            return;
        } 
        return true;
    }

    /**
     * Autentica al usuario iniciando una sesión.
     *
     * @return void
     */
    public function autenticar() {
         // El usuario está autenticado
         session_start();

         // Llenar el arreglo de la sesión
         $_SESSION['usuario'] = $this->email;
         $_SESSION['login'] = true;
        if ($this->admin == 1) {
            header('Location: /admin');
        } else {
            header('Location: /');
        }
    }
}
