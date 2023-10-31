<?php
// Para registrar
include('conexion.php');

$correo = mysqli_real_escape_string($conn, $_POST["txtcorreo"]);
$password = mysqli_real_escape_string($conn, $_POST["txtpassword"]);
$usu = mysqli_real_escape_string($conn, $_POST["txtnombre"]);

// Hash de la contraseña
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$queryusuario = mysqli_query($conn, "SELECT * FROM login WHERE correo = '$correo'");
$nr = mysqli_num_rows($queryusuario);

if ($nr == 0) {
    $queryregistrar = "INSERT INTO login(correo, password, usu) values ('$correo','$hashed_password','$usu')";

    if (mysqli_query($conn, $queryregistrar)) {
        echo "<script> alert('Usuario registrado: $usu');window.location= 'index.html' </script>";
    } else {
        echo "Error: " . $queryregistrar . "<br>" . mysql_error($conn);
    }
} else {
    echo "<script> alert('No puedes registrar este correo: $correo');window.location= 'index.html' </script>";
}
?>
