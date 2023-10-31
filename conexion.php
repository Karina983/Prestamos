<?php
$conn = new mysqli("localhost:3308","root","","loginvaidroll4");
	
	if($conn->connect_errno)
	{
		echo "No hay conexión: (" . $conn->connect_errno . ") " . $conn->connect_error;
	}
?>