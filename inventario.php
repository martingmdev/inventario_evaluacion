<?php
include('includes/header.php');
include('includes/db.php');

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>

<h2 class="titles">Inventario</h2>
<?php if ($user_role == 1): // Administrador ?>
    <a href="agregar_producto.php">
        <button class="button" href="agregar_producto.php">Agregar nuevo producto</button>
    </a>
<?php endif; ?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Estatus</th>
        <?php if ($user_role == 1): // Administrador ?>
            <th>Acciones</th>    
        <?php endif; ?>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['idProducto']; ?></td>
        <td><?php echo $row['nombre']; ?></td>
        <td><?php echo $row['cantidad']; ?></td>
        <td><?php echo $row['estatus'] == 1 ? 'Activo' : 'Inactivo'; ?></td>
        <td>
            <?php if ($user_role == 1): // Administrador ?>
                <a href="entrada_producto.php?id=<?php echo $row['idProducto']; ?>"><button class="buttonform" href="agregar_producto.php">Entrada de producto</button></a>
                <a href="activate_producto.php?id=<?php echo $row['idProducto']; ?>&status=<?php echo $row['estatus'] == 1 ? 0 : 1; ?>">
                    <?php echo $row['estatus'] == 1 ? '<button class="buttonformred" href="agregar_producto.php">Dar de baja producto</button>' : '<button class="buttonform" href="agregar_producto.php">Activar</button>'; ?>
                </a>
            <?php endif; ?>
            <?php if ($user_role == 2 && $row['estatus'] == 1): // Almacenista ?>
            <?php endif; ?>
        </td>
    </tr>
    <?php } ?>
</table>

<?php include('includes/footer.php'); ?>
