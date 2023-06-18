<?php

function detalles($conn,$tit){
    $stmt = $conn->prepare("SELECT titulo,descrip,f_inicio, f_fin FROM publi WHERE titulo = :tit");
    
    $stmt -> bindParam(':tit',$tit);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}
?>