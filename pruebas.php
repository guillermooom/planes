<html>
   
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/base.css">
    <title>Lista</title>
 </head>

<body>
<?php
    require("config/config.php");
    $conn = conexion();
    setcookie("PHPSESSID","",time()-3600,"/");

    //COMPROBACION DE CONTRASEÑAS CIFRADAS
    $p="Pepinillo_1";
    echo password_hash($p, PASSWORD_DEFAULT)."<br>";
    if(password_verify($p,'$2y$10$lzUAMGTXqEHkMwGP1d9EsuiCP9HNppJP/pWupCKqFttMFOoZt7xgm')){
        echo "bien";
    }else{
        echo "mal";
    }
    
?>
    <h1>Iniciar Sesion</h1>
    <br><br>
    <a href="login.php">Iniciar Sesion</a>

</body>
</html>

