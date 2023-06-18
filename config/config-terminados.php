<?php
function listado_terminados($conn){
    $stmt = $conn->prepare("SELECT titulo,descrip FROM publi WHERE f_fin IS NOT NULL");
        
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
    
}
?>