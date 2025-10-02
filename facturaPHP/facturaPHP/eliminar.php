<?php
require_once 'conexionBD.php';

$conn = conectarBD();

//Aquí, isset($_GET['codigoProducto']) comprueba si se recibió el parámetro codigoProducto por la URL.
if (isset($_GET['codigoProducto'])) { // Verifica si se ha proporcionado el código del producto y no es NULL 
    $codigoProducto = $_GET['codigoProducto']; //$_GET es un array especial en PHP que contiene los datos enviados por la URL (método GET).

    // Elimina el producto usando el código
    $sql = "DELETE FROM producto WHERE codigoProducto = '$codigoProducto'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("Location: index.php");
    } else {
        echo "Error al eliminar el producto: " . mysqli_error($conn);
    }
} else {
    echo "No se proporcionó el código del producto.";
}

mysqli_close($conn);
?>