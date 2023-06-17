<html>
   
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/base.css">
    <link rel="stylesheet" type="text/css" href="css/estilo-termiando.css">
    <script src="js/funciones.js" type="text/javascript"></script>
    <title>Planes Terminados</title>
 </head>

<body id="body">
<?php
    require("config/config.php");
    require("config/config-terminados.php");
    $conn = conexion();
    session_start();
    if(isset( $_SESSION['usuario'])){
		$nb=$_SESSION['usuario'];
    }else{
        header("location: index.php");
       
    }
?>
    <a id="ses" href="inicio.php">INICIO</a>
    <div id="cuerpo">
        <h1>Planes Terminados</h1>
        <br><br>
        <p>Falta meter los detalles y en esos detalles las fechas</p>
        <?php
            listado_terminados($conn);
        ?>
    </div>

</body>
</html>