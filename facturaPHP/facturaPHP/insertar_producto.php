<?php
// incluir el archivo de conexión a la base de datos
include ('conexionBD.php');
$conexion = conectarBD();

// obtener los datos del formulario
$idProducto = NULL;//ya es autoincremental no e necesario colocarlo
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$caracteristica = $_POST['caracteristica'];
$stock = $_POST['stock'];
$unidad = $_POST['unidad'];
$valorProducto = $_POST['valor'];

// insertar el nuevo producto en la base de datos
$sql = "INSERT INTO producto VALUES ('idProducto','$codigo', '$nombre', '$marca', '$caracteristica', $stock, '$unidad', $valorProducto)";
$query = mysqli_query($conexion, $sql);//toma la coneccion y la cosulta para ingresarla

//redirecciona depues de insertar un dato exitosamente al index.php
if($query){
    Header("Location: index.php");
} else {
    echo "Error al insertar el producto: " . mysqli_error($conexion);
}
mysqli_close($conexion);
?>