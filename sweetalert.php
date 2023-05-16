<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mi titulo de Proyecto</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <style>
    .no-border {
  border: 0 !important;
}
    </style>
</head>
<body>
    hola
<?php

    //ALERTA PARA CUANDO LE DEMOS A ACPETAR NOS REDIRIJA A OTRA SITIO
          echo "<script>
                 Swal.fire({
                   icon: 'success',
                   title: 'Enorabuena',
                   text: 'La alerta funciona.',  
                   }).then((xd) => {
                    if(xd){
                        window.location= 'index.php';
                    }
                   });
                  
         </script>"; 
  
// ALERTA CON FOTO PERSONALIZADA
/*
  $ima="https://picsum.photos/200/100";     
  echo "<script>
  Swal.fire({
    title: 'Image icon',
    iconHtml: '<img src=$ima>',
    customClass: {
      icon: 'no-border'
    }
  }) ; 
  </script>";  */
?>
</body>
</html>
                