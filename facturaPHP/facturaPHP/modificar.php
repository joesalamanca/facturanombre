<?php
require_once 'conexionBD.php';

$conn = conectarBD();
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$codigoProducto = $_GET['codigoProducto'];

$sql = "SELECT * FROM producto WHERE codigoProducto = '$codigoProducto'";
$query = mysqli_query($conn, $sql);//recorre una fila de la base de datos
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>

<body>
    <h2>Editar Producto</h2>
    <form action="Controller/actualizar_producto.php" method="POST">
        <input type="hidden" name="idProducto" value="<?= htmlspecialchars($row['idProducto']) ?>">
        
        <label for="codigo">Código del Producto</label>
        <input type="text" id="codigo" name="codigo" value="<?= htmlspecialchars($row['codigoProducto']) ?>" required>
        
        <label for="nombre">Nombre del Producto</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($row['nombreProducto']) ?>" required>
        
        <label for="marca">Marca</label>
        <input type="text" id="marca" name="marca" value="<?= htmlspecialchars($row['marcaProducto']) ?>">
        
        <label for="caracteristica">Característica</label>
        <input type="text" id="caracteristica" name="caracteristica" value="<?= htmlspecialchars($row['caracteristica']) ?>">
        
        <label for="stock">Stock</label>
        <input type="number" id="stock" name="stock" min="0" value="<?= htmlspecialchars($row['stock']) ?>" required>
        
        <label for="unidad">Unidad de Medida</label>
        <select id="unidad" name="unidad" required>
            <option value="">Seleccione</option>
            <option value="unidad" <?= $row['unidadMedida'] == 'unidad' ? 'selected' : '' ?>>Unidad</option>
            <option value="kg" <?= $row['unidadMedida'] == 'kg' ? 'selected' : '' ?>>Kilogramo</option>
            <option value="litro" <?= $row['unidadMedida'] == 'litro' ? 'selected' : '' ?>>Litro</option>
            <option value="caja" <?= $row['unidadMedida'] == 'caja' ? 'selected' : '' ?>>Caja</option>
            <option value="paquete" <?= $row['unidadMedida'] == 'paquete' ? 'selected' : '' ?>>Paquete</option>
        </select>
        
        <label for="valor">Valor del Producto</label>
        <input type="number" id="valor" name="valor" min="0" step="0.01" value="<?= htmlspecialchars($row['valorProducto']) ?>" required>
        
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
<?php
$conn->close();
?>
