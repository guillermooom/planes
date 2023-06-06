<?php
function listado_pendientes($conn){
    $stmt = $conn->prepare("SELECT titulo,descrip FROM publi");
        
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();

    foreach($result as $dat){
        echo '<h1>'. $dat["titulo"].'</h1><br>';
        echo '<h3>'.$dat["descrip"].'</h3>';
    }
}
?>