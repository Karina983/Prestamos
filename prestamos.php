<?php
// Conexión a la base de datos (reemplaza con tus propios datos)
$db_host = "localhost:3308";
$db_user = "root";
$db_password = "";
$db_name = "loginvaidroll4";

$conexion = new mysqli($db_host, $db_user, $db_password, $db_name);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Función de validación de correo electrónico
function validarCorreo($correo) {
    return filter_var($correo, FILTER_VALIDATE_EMAIL);
}

// Recopilar datos del formulario y realizar validaciones
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$monto = $_POST['monto'];
$plazo = $_POST['plazo'];
$correo = $_POST['correo'];

if (empty($nombre) || empty($apellido) || empty($monto) || empty($plazo) || empty($correo)) {
    echo '<script>alert("Por favor, complete todos los campos.");</script>';
} elseif (!is_numeric($monto) || $monto <= 0) {
    echo '<script>alert("Ingrese un monto válido.");</script>';
} elseif (!is_numeric($plazo) || $plazo <= 0) {
    echo '<script>alert("Ingrese un plazo válido.");</script>';
} elseif (!validarCorreo($correo)) {
    echo '<script>alert("Ingrese un correo electrónico válido.");</script>';
} else {
    // Insertar datos en la base de datos
    $sql = "INSERT INTO prestamos (nombre, apellido, monto, plazo, correo) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssdss", $nombre, $apellido, $monto, $plazo, $correo);

    if ($stmt->execute()) {
        echo "<script>window.open('telefono.html');</script>";
    } else {
        echo '<script>alert("Error al enviar la solicitud de préstamo: ' . $stmt->error . '");</script>';
    }

    // Cerrar la conexión
    $stmt->close();
    $conexion->close();
}
?>

