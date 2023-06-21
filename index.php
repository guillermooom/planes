<!DOCTYPE html>
<html>
   
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/base.css">
    <link rel="stylesheet" type="text/css" href="css/estilo-index.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/funciones.js" type="text/javascript"></script>
    <title>Login</title>
 </head>

<body id="body">
<?php
    require("config/config.php");
    require("config/config-login.php");
    $conn = conexion();
    setcookie("PHPSESSID","",time()-3600,"/");
?>
    <div id="cuerpo">
        <h1>LOGIN</h1>
        <form id="formu" name="formu" method="post">
                <br>
                <input type="text" name="nombre" placeholder="Nombre">
               
                <input type="password" name="password" placeholder="Password">
               
                <input type="submit"  name="submit" value="Entrar" >
        </form>
    </div>
    
<?php

if(!empty($_POST)){
    $realizar=true;
    if($_POST["nombre"]=="" && $_POST["password"]==""){
        echo "<script>
        swal({
          icon: 'warning',
          title: 'Opps...',
          showCloseButton: true,
          text: 'No has introducido ni el nombre ni la contraseña' 
          });

          
         
    </script>"; 
        $realizar=false;
    }
    if($_POST["nombre"]=="" && $realizar){
        echo "<script>
        swal({
          icon: 'warning',
          title: 'Opps...',
          text: 'No has introducido el nombre',  
          });
         
</script>";
        $realizar=false;
    }
    if($_POST["password"]=="" && $realizar){
        echo "<script>
        swal({
          title: 'Opps...',
          text: 'No has introducido la contraseña', 
          icon: 'warning' 
          });
         
</script>"; 
        $realizar=false;
    }
    if($realizar){
        $nb=strtolower($_POST["nombre"]);
        if(password_verify($_POST["password"],login($conn,$nb))){
            
            session_start();
            crearSession($_POST["nombre"]);
            echo "<script>
                 swal({
                   icon: 'success',
                   title: 'Bienvenido',
                   text: 'Acceso concedio a $nb ',  
                   }).then((xd) => {
                    if(xd){
                        window.location= 'inicio.php';
                    }
                   });
                  
         </script>"; 
        }else{
            echo "<script>
                 swal({
                   icon: 'error',
                   title: 'Error',
                   text: 'No has introducido un usuario valido',  
                   });
                  
         </script>"; 
        }
    }
}
?>
</body>
</html>