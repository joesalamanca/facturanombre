<?php
// actualizar_producto.php
require_once '../conexionBD.php';
$conexion = conectarBD();
//require_once '../conexionBD.php'; // Ajusta la ruta si es necesario

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Aquí puedes agregar la lógica para actualizar el producto
// obtener los datos del formulario
$idProducto =$_POST['idProducto'];//ya es autoincremental no e necesario colocarlo
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$caracteristica = $_POST['caracteristica'];
$stock = $_POST['stock'];
$unidad = $_POST['unidad'];
$valorProducto = $_POST['valor'];

$sql = "UPDATE producto SET 
    codigoProducto = '$codigo',
    nombreProducto = '$nombre',
    marcaProducto = '$marca',
    caracteristica = '$caracteristica',
    stock = $stock,
    unidadMedida = '$unidad',
    valorProducto = $valorProducto
    WHERE idProducto = '$idProducto'";
$query = mysqli_query($conexion, $sql);//toma la coneccion y la cosulta para ingresarla

//redirecciona depues de insertar un dato exitosamente al index.php
if($query){
    Header("Location: ../index.php");
} else {
    echo "Error al insertar el producto: " . mysqli_error($conexion);
}
// Ejemplo de cierre de conexión
$conexion->close();
?>
