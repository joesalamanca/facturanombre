<?php
require_once 'conexionBD.php';
$conexion = conectarBD();

$sql = "SELECT * FROM producto";
$resultado = mysqli_query($conexion, $sql);//coneccion y consulta especifica en la y a la base de datos
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Document</title>
</head>
<body>    
    <div class="container">
        <h2>Registrar Producto</h2>

        <form action="insertar_producto.php" method="POST">
            <label for="codigo">Código del Producto</label>
            <input type="text" id="codigo" name="codigo" required>

            <label for="nombre">Nombre del Producto</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="marca">Marca</label>
            <input type="text" id="marca" name="marca">

            <label for="caracteristica">Característica</label>
            <input type="text" id="caracteristica" name="caracteristica">

            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" min="0" required>

            <label for="unidad">Unidad de Medida</label>
            <select id="unidad" name="unidad" required>
                <option value="">Seleccione</option>
                <option value="unidad">Unidad</option>
                <option value="kg">Kilogramo</option>
                <option value="litro">Litro</option>
                <option value="caja">Caja</option>
                <option value="paquete">Paquete</option>
            </select>

            <label for="valor">Valor del Producto</label>
            <input type="number" id="valor" name="valor" min="0" step="0.01" required>

            <button type="submit">Registrar</button>
        </form>
    </div>

    <!-- ...tabla del formulario... -->
    <div class="container">
        <h2>Productos Registrados</h2>
    </div>

    <div>
        <table id="tabla-usuarios">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Característica</th>
                    <th>Stock</th>
                    <th>Unidad</th>
                    <th>Valor</th>
                    <th>Acciones</th>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($resultado) > 0): ?>
                    <?php while ($row = mysqli_fetch_array($resultado)): ?> 
                    <tr>
                        <th> <?= $row['codigoProducto'] ?></th>
                        <td> <?= $row['nombreProducto'] ?></td>
                        <td> <?= $row['marcaProducto'] ?></td>
                        <td> <?= $row['caracteristica'] ?></td>
                        <td> <?= $row['stock'] ?></td>
                        <td> <?= $row['unidadMedida'] ?></td>
                        <td> <?= $row['valorProducto'] ?></td>
                        <td><a href="modificar.php?codigoProducto=<?= $row['codigoProducto']?>">Modificar</a></td> <!-- ...obtiene el id y se lo pasa a modificar.php... -->
                        <td><a href="eliminar.php?codigoProducto=<?= $row['codigoProducto']?>" class="eliminar">Eliminar</a></td><!-- ...tabla del formulario... -->
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" style="text-align:center;">No hay datos de productos Registrados</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>    
    </div>
</body>
</html>