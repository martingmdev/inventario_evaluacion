<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_role = $_SESSION['role_id'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EvaluacionCastores</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/scripts.js" defer></script>
    <link rel="icon" sizes="16x16 32x32 48x48" type="image/png" href="img/favicon.png" />
</head>
<body>
<nav>
    <img src="img/descodw.png" href="index.php" alt="" class="imgLogomin">
    <a href="index.php">Inicio</a>
    <a href="inventario.php">Inventario</a>
    <?php if ($user_role == 1): // Administrador ?>
       <a href="salida_productosux.php">Salida de Productos</a>
    <?php endif; ?>
    <?php if ($user_role == 2): // Almacenista ?>
        <a href="salida_productosux.php">Salida de Productos</a>
    <?php endif; ?>
    <a href="historial.php">Historial</a>
    <?php if ($user_role == 2): // Almacenista ?>
        <span>Almacenista</span>
    <?php endif; ?>
    <?php if ($user_role == 1): // Administrador ?>
       <span>Administrador</span>
    <?php endif; ?>


    <a href="logout.php">Cerrar Sesión</a>
</nav>
<div class="containerpag">
