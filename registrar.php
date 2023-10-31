<?php
// Incluir la conexión a la base de datos
include('conexion.php');

// Obtener y limpiar las entradas del usuario
$correo = mysqli_real_escape_string($conn, $_POST["txtcorreo"]);
$pass = mysqli_real_escape_string($conn, $_POST["txtpassword"]);
$usu = mysqli_real_escape_string($conn, $_POST["txtnombre"]);

// Validar la dirección de correo electrónico y la contraseña (puedes agregar más validaciones)
if (!filter_var($correo, FILTER_VALIDATE_EMAIL) || strlen($pass) < 8) {
    echo "Dirección de correo electrónico o contraseña no válidos.";
    exit();
}

// Consultar si el correo electrónico ya está registrado
$queryusuario = mysqli_query($conn, "SELECT * FROM login WHERE correo = '$correo'");
$nr = mysqli_num_rows($queryusuario);

if ($nr == 0) {
    // Hashear la contraseña antes de almacenarla
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    // Consulta preparada para insertar el nuevo usuario
    $queryregistrar = mysqli_prepare($conn, "INSERT INTO login (correo, pass, usu) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($queryregistrar, "sss", $correo, $hashed_password, $usu);

    if (mysqli_stmt_execute($queryregistrar)) {
        echo "<script> alert('Usuario registrado: $usu'); window.location= 'index.html' </script>";
    } else {
        // Registrar el error en el registro
        error_log("Error al registrar usuario: " . mysqli_error($conn));
        echo "Ha ocurrido un error durante el registro, por favor inténtalo de nuevo más tarde.";
    }
} else {
    echo "<script> alert('No puedes registrar este correo: $correo'); window.location= 'index.html' </script>";
}

// Cerrar la conexión a la base de datos si es necesario
mysqli_close($conn);
?>
