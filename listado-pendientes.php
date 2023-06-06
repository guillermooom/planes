<html>
   
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/base.css">
    <link rel="stylesheet" type="text/css" href="css/estilo-nueva.css">
    <script src="js/funciones.js" type="text/javascript"></script>
    <title>Planes Pendientes</title>
 </head>

<body id="body">
<?php
    require("config/config.php");
    require("config/config-pendientes.php");
    $conn = conexion();
    session_start();
    /*if(isset( $_SESSION['usuario'])){
		$nb=$_SESSION['usuario'];
    }else{
        header("location: index.php");
       
    }*/
?>
    <a id="ses" href="inicio.php">INICIO</a>
    <div id="cuerpo">
        <h1>Planes Pendientes</h1>
        <br><br>
        <?php
            listado_pendientes($conn);
        ?>
    </div>

</body>
</html>