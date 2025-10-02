<?php
// Mostrar errores de PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

function conectarBD($host = 'localhost', $usuario = 'app_user', $contrasena = 'Joel1212_123', $baseDatos = 'programa_factura_practica')
{
    $conexion = new mysqli($host, $usuario, $contrasena, $baseDatos);

    if ($conexion->connect_error) {
        die('Error de conexión: ' . $conexion->connect_error);
    }

    echo "✅ Conexión exitosa a la base de datos";
    return $conexion;
}

// Llamar a la función para probar la conexión
// conectarBD();
?>