<?php
include('includes/header.php');
include('includes/db.php');

if ($_SESSION['role_id'] != 2) {
    header("Location: forbiddenadmin.php");
    exit();
}

$sql = "SELECT * FROM productos where estatus = 1";
$result = $conn->query($sql);
?>

<h2 class="titles">Salida de productos</h2>
<?php if ($user_role == 1): // Administrador ?>
    <a href="agregar_producto.php">Agregar Nuevo Producto</a>
<?php endif; ?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Estatus</th>
        <th>Acciones</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['idProducto']; ?></td>
        <td><?php echo $row['nombre']; ?></td>
        <td><?php echo $row['cantidad']; ?></td>
        <td><?php echo $row['estatus'] == 1 ? 'Activo' : 'Inactivo'; ?></td>
        <td>
            <?php if ($user_role == 1): // Administrador ?>
                <a href="entrada_producto.php?id=<?php echo $row['idProducto']; ?>">Entrada</a>
                <a href="activate_producto.php?id=<?php echo $row['idProducto']; ?>&status=<?php echo $row['estatus'] == 1 ? 0 : 1; ?>">
                    <?php echo $row['estatus'] == 1 ? 'Dar de baja producto' : 'Activar'; ?>
                </a>
            <?php endif; ?>
            <?php if ($user_role == 2 && $row['estatus'] == 1): // Almacenista ?>
                <a href="salida_producto.php?id=<?php echo $row['idProducto']; ?>"><button class="buttonformred">Salida</button></a>
            <?php endif; ?>
        </td>
    </tr>
    <?php } ?>
</table>

<?php include('includes/footer.php'); ?>
