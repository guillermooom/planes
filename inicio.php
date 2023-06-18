<html>
   
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/base.css">
    <link rel="stylesheet" type="text/css" href="css/estilo-inicio.css">
    <script src="js/funciones.js" type="text/javascript"></script>
    <title>HOME</title>
 </head>

<body id="body">
<?php
    require("config/config.php");
    require("config/config-inicio.php");
    $conn = conexion();
    session_start();
    if(isset( $_SESSION['usuario'])){
		$nb=$_SESSION['usuario'];
    }else{
        header("location: index.php");
       
    }
?>
    
		<a id="ses" href="index.php">CERRAR SESION</a>
    <div id="cuerpo">
      <h1>Inicio</h1>
        <?php
          $nb=strtoupper($_SESSION['usuario']);
          echo "<p id='salu'>Holaa <b>".$nb."</b><p>";
        ?>
      
      <ul>
        <li><a href="nueva.php">Nuevo Plan</a></li>
        <li><a href="planes-pendientes.php">Planes Pendientes</a></li>
        <li><a href="planes-terminados.php">Planes Terminados</a></li>
    </ul>
  </div>
</body>
</html>