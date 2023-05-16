<html>
   
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/base.css">
    <link rel="stylesheet" type="text/css" href="css/estilo-inicio.css">
    <title>HOME</title>
 </head>

<body>
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
    
		<a href="index.php">CERRAR SESION</a>
    <h1>Inicio</h1>
    <?php
			echo "<p id='salu'>Holaa <b>".$_SESSION['usuario']."</b><p>";
	?>
  <br><br>
    <a href="nueva.php">Nuevo Plan</a>
    <br><br>
    <h3>Planes</h3>
    <ul>
<?php
  $result = ver_lista($conn,$_SESSION['usuario']);
    $sty="";
  foreach($result as $dat){
    if($dat["terminado"]=="si"){
      $dato="checked";
      $sty="text-decoration: line-through";
    }
      
    echo "<li style='".$sty."'><p id='tit'>".$dat["titulo"]."</p>".$dat["descrip"]."</li><br>";
    $dato="";
    $sty="";
}

?>
</ul>
</body>
</html>