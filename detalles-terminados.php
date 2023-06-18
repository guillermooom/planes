<html>
   
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/base.css">
    <script src="js/funciones.js" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Detalles Terminados</title>
 </head>

<body id="body">
<?php
    require("config/config.php");
    require("config/config-detalles-terminados.php");
    //error_reporting(0);
    $conn = conexion();
    session_start();
    if(isset( $_SESSION['usuario'])){
		$nb=$_SESSION['usuario'];
    }else{
        header("location: index.php");
       
    }
?>
    <a id="ses" href="planes-terminados.php">Volver</a>
    <div id="cuerpo">
        <h1>Planes Pendientes</h1>
        <br><br>
        <?php
            $titulo = $_SESSION["terminado"];
            $det = detalles($conn,$titulo);
            foreach($det as $dat){
                echo "<h3>". $dat["titulo"]."</h3>
                <p>".$dat["descrip"]."</p>
                <p>Fecha Inicio: ".$dat["f_inicio"]."</p>
                <p>Fecha Fin: ".$dat["f_fin"]."</p>";
            }
        ?>
    </div>

</body>
</html>