<?php
function plan_terminado($conn,$dia,$tit){
    $stmt = $conn->prepare("UPDATE publi SET F_FIN = :dia WHERE TITULO = :tit");

    $stmt -> bindParam(':dia',$dia);
    $stmt -> bindParam(':tit',$tit);
    $stmt->execute();
}

function detalles($conn,$tit){
    $stmt = $conn->prepare("SELECT titulo,descrip FROM publi WHERE titulo = :tit");
    
    $stmt -> bindParam(':tit',$tit);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}
?>