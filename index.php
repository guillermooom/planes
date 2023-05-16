<html>
   
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/base.css">
    <link rel="stylesheet" type="text/css" href="css/estilo-index.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Login</title>
 </head>

<body>
<?php
    require("config/config.php");
    require("config/config-login.php");
    $conn = conexion();
    setcookie("PHPSESSID","",time()-3600,"/");     
    
?>
    <h1>INICIAR SESIÓN</h1>
	
    <form id="formu" name="formu" method="post">
            <br>
            Nombre: <input type="text" name="nombre">
            <br><br>
            Contraseña: <input type="password" name="password">
            <br><br>
        <input type="submit"  name="submit" value="Entrar" >
    </form>
    
<?php
if(!empty($_POST)){
    $realizar=true;
    if($_POST["nombre"]=="" && $_POST["password"]==""){
        echo "<script>
        Swal.fire({
          icon: 'warning',
          title: 'Opps',
          text: 'No has introducido ni el nombre ni la contraseña',  
          }).then((xd) => {
           if(xd){
               window.location= 'index.php';
           }
          });
         
</script>"; 
        $realizar=false;
    }
    if($_POST["nombre"]=="" && $realizar){
        echo "<script>
        Swal.fire({
          icon: 'warning',
          title: 'Opps',
          text: 'No has introducido el nombre',  
          }).then((xd) => {
           if(xd){
               window.location= 'index.php';
           }
          });
         
</script>";
        $realizar=false;
    }
    if($_POST["password"]=="" && $realizar){
        echo "<script>
        Swal.fire({
          icon: 'warning',
          title: 'Opps',
          text: 'No has introducido la contraseña',  
          }).then((xd) => {
           if(xd){
               window.location= 'index.php';
           }
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
                 Swal.fire({
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
                 Swal.fire({
                   icon: 'error',
                   title: 'Error',
                   text: 'No has introducido un usuario valido',  
                   }).then((xd) => {
                    if(xd){
                        window.location= 'index.php';
                    }
                   });
                  
         </script>"; 
        }
    }
}
?>
<!--
<div id="ima">
        <img src="img/stich_beso.png">
    </div>
-->
</body>
</html>