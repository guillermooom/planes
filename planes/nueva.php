<html>
   
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Inicio - Aula Gaming </title>
 </head>

<body>
<?php
    require("config/config.php");
    require("config/config-nueva.php");
    $conn = conexion();
    session_start();
    if(isset( $_SESSION['usuario'])){
		$nb=$_SESSION['usuario'];
    }else{
        header("location: index.php");
       
    }
?>
    <h1>Añadir Nueva</h1>
		
    <?php
			echo "<B>Bienvenido/a: </B>".$_SESSION['usuario'];
	?>
  <br><br>
  <a href="index.php">CERRAR SESION</a>
  <br><br>
  <a href="inicio.php">Inicio</a>

  <form id="formu" name="formu" method="post">
            <br>
            Titulo <input type="text" name="titulo">
            <br><br>
            Descripcion <input type="text" name="desc">

        <input type="submit"  name="submit" value="Submit" >
    </form>

<?php
if(!empty($_POST)){
    $realizar=true;
    $nb=$_SESSION['usuario'];
    if($_POST["titulo"]==""){
        echo "<p id='err'>ERROR: El titulo es obligatorio</p>";
        $realizar=false;
    }
    if($realizar){
        $tit=$_POST["titulo"];
        $desc=$_POST["desc"];
        añadir_nueva($conn,$tit,$desc,$nb);
    }
}
?>
</body>
</html>