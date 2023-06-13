<?php
function añadir_nueva($conn,$tit,$des,$nb,$hoy){
	try{
		$stmt = $conn->prepare("INSERT INTO publi(titulo,descrip,f_inicio,nb)
				VALUES (:tit,:descr,:hoy,:nombre)");
				$stmt->bindParam(':tit', $tit);
				$stmt->bindParam(':descr', $des);
				$stmt->bindParam(':nombre', $nb);
				$stmt->bindParam(':hoy', $hoy);
			
				$stmt->execute();
	}catch(PDOException $e)
	{
		echo "<script>
        swal({
          icon: 'error',
          title: 'Error',
          showCloseButton: true,
          text: 'Esta entrada ya existe' 
          });
      
    </script>";
	}
}
?>