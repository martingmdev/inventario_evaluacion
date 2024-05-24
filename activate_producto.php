<?php
include('includes/header.php');
include('includes/db.php');

if ($_SESSION['role_id'] != 1) {
    header("Location: inventario.php");
    exit();
}

$idProducto = $_GET['id'];
$status = $_GET['status'];

$sql = "UPDATE productos SET estatus = $status WHERE idProducto = $idProducto";
if ($conn->query($sql) === TRUE) {
    header("Location: inventario.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

include('includes/footer.php');
?>
