<?php
// Conexión a la base de datos
$db_host = 'localhost:3308';
$db_user = 'root';
$db_pass = '';
$db_name = 'loginvaidroll4';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die('Error al conectar a la base de datos: ' . mysqli_connect_error());
}

// Verificar si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $username = $_POST["txtcorreo"]; 
    $password = $_POST["txtpassword"]; 

    // Consulta para verificar las credenciales del usuario
    $query = "SELECT * FROM login WHERE correo='$username' AND password='$password'";
	$result = $conn->query($query); 

    if (mysqli_num_rows($result) == 1) {
        // Usuario válido
        $row = mysqli_fetch_assoc($result);
        $idrol = $row['idrol'];

        if ($idrol == 1) {
            // Administrador
            // Mostrar las solicitudes de préstamo
            $query = "SELECT * FROM prestamos";
            $result = mysqli_query($conn, $query);
            echo '<h3>Lista de Solicitudes de Préstamo</h3>';
            echo '<ul>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo "ID Solicitud: " . $row['idsolicitud'] . "<br>";
                echo "Nombre: " . $row['nombre'] . "<br>";
                echo "Monto Solicitado: " . $row['monto'] . "<br>";
                echo "Plazo: " . $row['plazo'] . " meses<br>";
                echo "Correo Electrónico: " . $row['correo'] . "<br>";
                echo "<br>";
            }
            echo '</ul>';
        } elseif ($idrol == 2) {
            // Supervisor
            // Redirigir al usuario a la página de préstamo
            header("Location: Prestamo.html");
            exit; // Asegura que el script se detiene
        }
    } else {
        // Credenciales inválidas
        echo "Usuario o contraseña inválidos.";
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
