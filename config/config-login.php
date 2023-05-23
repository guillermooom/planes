<?php
function login($conn,$nombre){
    $stmt = $conn->prepare("SELECT nombre,contra FROM usuario
    WHERE nombre = :nombre");

    $stmt -> bindParam(':nombre',$nombre);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    foreach($result as $dat){
        return $dat["contra"];
    }
}

function crearSession($mail){
    $_SESSION["usuario"]=$mail;
}

function sinDatos(){
    echo "<script>
        Swal.fire({
          icon: 'warning',
          title: 'Opps',
          text: 'No has introducido ni el nombre ni la contraseña' 
          });
         
    </script>";
}