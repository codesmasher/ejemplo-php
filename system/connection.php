<?php
// Incluir archivo de configuración del sistema
include('env.php');
$con_string = "host=$host dbname=$db port=$port user=$user password=$pass";

if (!@($con = pg_connect($con_string))) {
    echo 'Error de conexión a la base de datos';
    die;
}
