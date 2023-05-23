<html>
   
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/base.css">
    <link rel="stylesheet" type="text/css" href="css/estilo-nueva.css">
    <script src="js/funciones.js" type="text/javascript"></script>
    <title>Añadir Plan</title>
 </head>

<body id="body">
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
    <a id="ses" href="inicio.php">INICIO</a>
    <div id="cuerpo">
        <h1>Añadir Nueva</h1>
        <br><br>
        <form id="formu" name="formu" method="post">
                <input type="text" name="titulo" placeholder="Titulo">
                <br><br>
                <input type="text" name="desc" placeholder="Descripción">
                <br><br>
            <input id="ses" type="submit"  name="submit" value="AÑADIR" >
        </form>
    </div>

    

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