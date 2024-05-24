<?php
include('includes/header.php');
include('includes/db.php');

if ($_SESSION['role_id'] != 1) {
    header("Location: inventario.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $sql = "INSERT INTO productos (nombre, cantidad, estatus) VALUES ('$nombre', 0, 1)";
    if ($conn->query($sql) === TRUE) {
        header("Location: inventario.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<h2 class="titles">Agregar Nuevo Producto</h2>
<form method="POST" action="agregar_producto.php" onsubmit="return validateForm();">
    <div class="form-control">
        <input type="text" id="nombre" name="nombre" required>
        <label>
            <span style="transition-delay:0ms">Nombre&nbsp;</span><span style="transition-delay:50ms">del&nbsp;</span><span style="transition-delay:100ms">producto</span>
        </label>
    </div>
    <!-- <label for="nombre">Nombre del Producto:</label>
    <input type="text" id="nombre" name="nombre" required><br><br> -->
    <input type="submit" value="Agregar Producto">
</form>


<?php include('includes/footer.php'); ?>
