<?php
function listado_pendientes($conn){
    $stmt = $conn->prepare("SELECT titulo,descrip FROM publi WHERE f_fin IS NULL");
        
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
    
}

?>