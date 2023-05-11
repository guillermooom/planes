<?php
function inicioUsuario($conn,$nombre){
    $stmt = $conn->prepare("SELECT nombre FROM usuario
    WHERE email = :nombre ");

    $stmt -> bindParam(':nombre',$nombre);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    return $result;
}

function ver_lista($conn,$nombre){
    $stmt = $conn->prepare("SELECT titulo,descrip,terminado FROM publi
    WHERE nb = :nombre ");

    $stmt -> bindParam(':nombre',$nombre);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    return $result;
}