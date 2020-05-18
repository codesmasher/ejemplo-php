<?php
// Incluir archivo de configuración del sistema
include('env.php');

/**
 * Crea una nueva sesión.
 * @return void No devuelve ningún valor.
 */
function sessionStart() {
    session_name('' . $systemName);

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}
/**
 * Termina una sesión activa
 * @return void No devuelve ningún valor.
 */
function closeSession() {
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_unset();
        session_destroy();
        session_register_shutdown();
    }
}
/**
 * Registra un arreglo asociativo dentro de la variable de sesión.
 * @param string[] $array Arreglo asociativo.
 * @return boolean Devuelve true si el arreglo se incluyó dentro de la variable
 * de sesión, false si la sesión no existe o no está activa.
 */
function setArrayIntoSession($array) {
    if (is_array($array) && session_status() === PHP_SESSION_ACTIVE) {
        foreach ($array as $key => $value) {
            $_SESSION[$key] = $value;
        }
        return true;
    } else {
        return false;
    }
}
/**
 * Verifica que exista una variable dentro de la sesión activa.
 * @param string $key Nombre de la variable.
 * @return boolean Devuelve true si existe la variable en la sesión activa en
 * caso contrario el valor obtenido es false. 
 */
function isSetOnSession($key) {
    if (session_status() === PHP_SESSION_ACTIVE) {
        return isset($_SESSION[$key]);
    } else {
        return false;
    }
}
