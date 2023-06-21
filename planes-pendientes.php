<html>
   
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/base.css">
    <script src="js/funciones.js" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Planes Pendientes</title>
 </head>

<body id="body">
<?php
    require("config/config.php");
    require("config/config-pendientes.php");
    error_reporting(0);
    $conn = conexion();
    session_start();
    if(isset( $_SESSION['usuario'])){
		$nb=$_SESSION['usuario'];
    }else{
        header("location: index.php");
       
    }
    $dia = date('d/m/Y');
?>
    <a id="ses" href="inicio.php">INICIO</a>
    <div id="cuerpo">
        <h1>Planes Pendientes</h1>
        <br><br>
        <?php
            $result = listado_pendientes($conn);
            foreach($result as $dat){
                echo "<h3>". $dat["titulo"]."</h3><br>
                <form id='formu' name='formu' method='post'>
                    <input type='hidden' name='titulo' value='" . $dat["titulo"] . "'><br>
                    <input type='submit'  name='borrar' value='Borrar' >
                    <input type='submit'  name='editar' value='Editar' >
                    <input type='submit'  name='detalles' value='Detalles' >
                </form>";
            }

            if (!empty($_POST)) {
                if($_POST["borrar"]){
                    borrar_plan($conn,$_POST["titulo"]);
                    echo "<script>
                 swal({
                   icon: 'success',
                   title: 'Ehnorabuena',
                   text: 'Tu plan ha eliminado',  
                   }).then((xd) => {
                    if(xd){
                        window.location= 'planes-pendientes.php';
                    }
                   });
                  
         </script>";  
                }

                if($_POST["detalles"]){
                    $_SESSION["titulo"]=$_POST["titulo"];
                    echo "<script>
                        window.location='detalles-pendientes.php';
                    </script>";
                }

                if($_POST["editar"]){
                    $_SESSION["titulo"]=$_POST["titulo"];
                    echo "<script>
                        window.location='editar.php';
                    </script>";
                }
                
            }
            
        ?>
    </div>

</body>
</html>