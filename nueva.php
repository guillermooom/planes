<html>
   
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/base.css">
    <link rel="stylesheet" type="text/css" href="css/estilo-nueva.css">
    <script src="js/funciones.js" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
    $hoy= date ("d/m/Y");
    $nb=$_SESSION['usuario'];
    if($_POST["titulo"]==""){
        echo "<script>
        swal({
          icon: 'error',
          title: 'Error',
          showCloseButton: true,
          text: 'El titulo es obligatorio' 
          });
      
    </script>"; 
        $realizar=false;
    }

    
    if($realizar){
        $tit=$_POST["titulo"];
        $desc=$_POST["desc"];

        if(empty(comprueba_existe($conn,$tit))){
           añadir_nueva($conn,$tit,$desc,$nb,$hoy);
        echo "<script>
        swal({
          icon: 'success',
          title: 'Ehnorabuena',
          showCloseButton: true,
          text: 'Has añadido un nuevo plan' 
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
          showCloseButton: true,
          text: 'Esta entrada ya existe' 
          });
      
    </script>";
        }
         
    }
}
?>
</body>
</html>