<?php
//Conectar con la base de datos.
  function conexion(){

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "planes";
	
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
}	

// conprobau usuario
?>