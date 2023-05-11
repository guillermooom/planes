<?php
function añadir_nueva($conn,$tit,$des,$nb){
	try{
		$stmt = $conn->prepare("INSERT INTO publi(titulo,descrip,terminado,nb)
				VALUES (:tit,:descr,'NO',:nombre)");
				$stmt->bindParam(':tit', $tit);
				$stmt->bindParam(':descr', $des);
				$stmt->bindParam(':nombre', $nb);
			
				$stmt->execute();
	}catch(PDOException $e)
	{
		echo "<p id='err'>ERROR: Entrada duplicada</p>";
	}
}
?>