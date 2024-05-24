<?php
include('includes/header.php');
include('includes/db.php');

if ($_SESSION['role_id'] != 1) {
    header("Location: forbidden.php");
    exit();
}

$filtro_tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';

$sql = "SELECT historico_movimientos.*, productos.nombre AS producto, usuarios.nombre AS usuario 
        FROM historico_movimientos 
        JOIN productos ON historico_movimientos.idProducto = productos.idProducto 
        JOIN usuarios ON historico_movimientos.idUsuario = usuarios.idUsuario";
        
if ($filtro_tipo != '') {
    $sql .= " WHERE historico_movimientos.tipo = '$filtro_tipo'";
}

$result = $conn->query($sql);
?>

<h2 class="titles">Historial de Movimientos</h2>

<form method="GET" action="historial.php">
    <label for="tipo">Filtrar por tipo:</label>
    <select name="tipo" id="tipo">
        <option value="">Todos</option>
        <option value="entrada" <?php if ($filtro_tipo == 'entrada') echo 'selected'; ?>>Entrada</option>
        <option value="salida" <?php if ($filtro_tipo == 'salida') echo 'selected'; ?>>Salida</option>
    </select>
    <input type="submit" value="Filtrar">
</form>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Producto</th>
        <th>Tipo</th>
        <th>Cantidad</th>
        <th>Usuario</th>
        <th>Fecha y Hora</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['idMovimiento']; ?></td>
        <td><?php echo $row['producto']; ?></td>
        <td><?php echo $row['tipo']; ?></td>
        <td><?php echo $row['cantidad']; ?></td>
        <td><?php echo $row['usuario']; ?></td>
        <td><?php echo $row['fechaHora']; ?></td>
    </tr>
    <?php } ?>
</table>

<?php include('includes/footer.php'); ?>
