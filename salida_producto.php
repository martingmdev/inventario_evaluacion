<?php
include('includes/header.php');
include('includes/db.php');

if ($_SESSION['role_id'] != 2) {
    header("Location: inventario.php");
    exit();
}

$idProducto = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cantidad = $_POST['cantidad'];
    if($cantidad <= 0){
        echo "La cantidad ingresada debe ser mayor o igual a 1";
    } else {
        $sql = "SELECT cantidad FROM productos WHERE idProducto = $idProducto";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
        if ($cantidad <= $row['cantidad']) {
            $sql = "UPDATE productos SET cantidad = cantidad - $cantidad WHERE idProducto = $idProducto";
            if ($conn->query($sql) === TRUE) {
                $sql_hist = "INSERT INTO historico_movimientos (idProducto, tipo, cantidad, idUsuario) VALUES ($idProducto, 'salida', $cantidad, {$_SESSION['user_id']})";
                $conn->query($sql_hist);
                header("Location: salida_productosux.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: La cantidad a retirar excede el inventario disponible.";
        }
    }
}
?>

<h2 class="titles">Salida de Producto</h2>
<form method="POST" action="salida_producto.php?id=<?php echo $idProducto; ?>" onsubmit="return validateForm();">
    <div class="form-control">
        <input type="number" id="cantidad" name="cantidad" required>
        <label>
            <span style="transition-delay:0ms">Cantidad&nbsp;</span><span style="transition-delay:50ms">a&nbsp;</span><span style="transition-delay:100ms">ingresar</span>
        </label>
    </div>
    <!-- <label for="cantidad">Cantidad a retirar:</label>
    <input type="number" id="cantidad" name="cantidad" required><br><br> -->
    <input type="submit" value="Retirar">
</form>

<?php include('includes/footer.php'); ?>
