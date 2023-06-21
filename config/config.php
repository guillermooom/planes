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


function comprueba_existe($conn,$tit){
    $stmt = $conn->prepare("SELECT titulo FROM publi WHERE titulo = :tit");
	
    $stmt -> bindParam(':tit',$tit);
    $stmt->execute();
    
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    return $result;
}
?>