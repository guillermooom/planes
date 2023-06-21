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
    require("config/config-editar.php");
    //error_reporting(0);
    $conn = conexion();
    session_start();
    if(isset( $_SESSION['usuario'])){
		$nb=$_SESSION['usuario'];
    }else{
        header("location: index.php");
       
    }
?>
    <a id="ses" href="planes-pendientes.php">Volver</a>
    <div id="cuerpo">
        <h1>Planes Pendientes</h1>
        <br><br>
        <?php
        $des = datos_publi($conn,$_SESSION["titulo"]);
        foreach($des as $dat){

            echo "<form id='formu' name='formu' method='post'>
                <input type='hidden' name='tit' value='" . $_SESSION["titulo"] . "'><br>
                <input type='hidden' name='dia' value='" . $dat["f_inicio"] . "'><br>
                <input type='hidden' name='usuario' value='" . $dat["nb"] . "'><br>
                Titulo: <input type='text' name='titulo' value='" . $_SESSION["titulo"] . "'><br><br>
                Descripcion: <input type='text' name='desc' value='" . $dat["descrip"] . "'><br><br>
                <input type='submit'  name='submit' value='Guardar Cambios' >
            </form>";
        }
            
            if(!empty($_POST)){
                if($_POST["titulo"]==""){
                    echo "<script>
                 swal({
                   icon: 'error',
                   title: 'Error',
                   text: 'No has puesto ningun nombre',  
                   });
                  
         </script>"; 
                }else{
                    if(empty(comprueba_existe($conn,$_POST["titulo"]))){
                        borrar_plan($conn,$_SESSION["titulo"]);
                        cambiar_plan($conn,$_POST["titulo"],$_POST["desc"],$_POST["dia"],$_POST["usuario"]);
                        echo "<script>
                                swal({
                                icon: 'success',
                                title: 'Ehnorabuena',
                                text: 'Tu plan ha sido cambiado',  
                                }).then((xd) => {
                                    if(xd){
                                        window.location= 'planes-pendientes.php';
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
    </div>

</body>
</html>