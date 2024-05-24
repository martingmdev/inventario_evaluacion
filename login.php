<?php
session_start();
include('includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    
    $sql = "SELECT idUsuario, idRol FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena' AND estatus = 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['idUsuario'];
        $_SESSION['role_id'] = $row['idRol'];
        header("Location: index.php");
        exit();
    } else {
        $error = "Correo o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body> 
<div class="container">
    <div>
        <img src="img/descodw.png" alt="" class="imgLogin">
    </div>
    <h2>Bienvenido a DesCod Inicia sesión</h2>
    <form method="POST" action="login.php" onsubmit="return validateForm();">
        <div class="form__group field">
            <input type="email" class="form__field" placeholder="Name" name="correo" id="correo" required />
            <label for="correo" class="form__label">Correo electrónico</label>
        </div>
        <div class="form__group field">
            <input type="password" class="form__field" placeholder="Contraseña" name="contrasena" id="contrasena" required />
            <label for="contrasena" class="form__label">Contraseña</label>
        </div>
        <input class="btn" type="submit" value="Iniciar Sesión">

    </form>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
</div>
</body>
</html>
