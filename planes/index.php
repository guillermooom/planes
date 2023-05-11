<html>
   
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Login</title>
 </head>

<body>
<?php
    require("config/config.php");
    require("config/config-login.php");
    $conn = conexion();
    setcookie("PHPSESSID","",time()-3600,"/");     
    
?>
    <h1>INICIO SESION</h1>
	
    <form id="formu" name="formu" method="post">
            <br>
            Nombre <input type="text" name="nombre">
            <br><br>
            Contraseña <input type="password" name="password">

        <input type="submit"  name="submit" value="Submit" >
    </form>
<?php
if(!empty($_POST)){
    $realizar=true;
    if($_POST["nombre"]==""){
        echo "<p id='err'>ERROR: No has introducido el nombre de usuario</p>";
        $realizar=false;
    }
    if($_POST["password"]==""){
        echo "<p id='err'>ERROR: No has introducido la contraseña</p>";
        $realizar=false;
    }
    if($realizar){
        $nb=strtolower($_POST["nombre"]);
        if(password_verify($_POST["password"],login($conn,$nb))){
            
            session_start();
            crearSession($_POST["nombre"]);
            header("Location: inicio.php");
        }else{
            echo "<p id='err'>ERROR: Usuario Incorrecto</p>";
        }
    }
}
?>

</body>
</html>