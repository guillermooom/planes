<?php
function datos_publi($conn,$tit){
    $stmt = $conn->prepare("SELECT descrip,f_inicio FROM publi WHERE TITULO = :tit");
    
    $stmt -> bindParam(':tit',$tit);
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
}

//LA BORRAMOS PARA LUEGO INTRODUCIRLA CON EL MISMO DIA
function borrar_plan($conn,$tit){
    $stmt = $conn->prepare("DELETE FROM publi WHERE TITULO = :tit");
    $stmt -> bindParam(':tit',$tit);
    $stmt->execute();
}

function cambiar_plan($conn,$tit,$desc,$dia,$nb){

    $stmt = $conn->prepare("INSERT INTO publi(titulo,descrip,f_inicio,nb)
            VALUES (:tit,:descr,:hoy,:nombre)");
            $stmt->bindParam(':tit', $tit);
            $stmt->bindParam(':descr', $desc);
            $stmt->bindParam(':nombre', $nb);
            $stmt->bindParam(':hoy', $dia);
        
            $stmt->execute();

}
?>