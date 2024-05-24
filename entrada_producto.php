<?php
include('includes/header.php');
include('includes/db.php');

if ($_SESSION['role_id'] != 1) {
    header("Location: inventario.php");
    exit();
}

$idProducto = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cantidad = $_POST['cantidad'];
    if ($cantidad <= 0){
        echo "Error: La cantidad no puede ser menor a 1";
    }else{
        $sql = "UPDATE productos SET cantidad = cantidad + $cantidad WHERE idProducto = $idProducto";
        if ($conn->query($sql) === TRUE) {
            $sql_hist = "INSERT INTO historico_movimientos (idProducto, tipo, cantidad, idUsuario) VALUES ($idProducto, 'entrada', $cantidad, {$_SESSION['user_id']})";
            $conn->query($sql_hist);
            header("Location: inventario.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<h2 class="titles">Entrada de Producto</h2>
<form method="POST" action="entrada_producto.php?id=<?php echo $idProducto; ?>" onsubmit="return validateForm();">
    <div class="form-control">
        <input type="number" id="cantidad" name="cantidad" required>
        <label>
            <span style="transition-delay:0ms">Cantidad&nbsp;</span><span style="transition-delay:50ms">a&nbsp;</span><span style="transition-delay:100ms">ingresar</span>
        </label>
    </div>
    <!-- <label for="cantidad">Cantidad a ingresar:</label>
    <input type="number" id="cantidad" name="cantidad" required><br><br> -->
    <input type="submit" value="Ingresar">
</form>

<?php include('includes/footer.php'); ?>
