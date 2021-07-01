<?php 

    session_start();

    if(!isset ($_SESSION['idusuario'])){
        header("location: index.php");

    }

    $Puesto = $_SESSION['Puesto'];
     $usuario = $_SESSION['usuario'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
    

 ?>

 <!DOCTYPE html>
<html lang="es">
   <?php include('head.php')?> <!--HEAD AQUI -->
    <body class="sb-nav-fixed">
<div id="conteiner" style="margin: auto; width: 290px; " style="color: black;">
      <i class="fas fa-marker" style="font-size: 120px; color: #f0eceb;   text-align:center; " ></i>
      <p style="text-align: center">El producto fue modificado</p>

       <a style=" width: 110px; /* Para que no se rompa en dos líneas, y lo translade tal cual. */
  margin-left: 50%;
  transform: translateX(-50%);" href="javascript:history.back()" class="btn btn-primary">Regresar</i></a>

</div>
    
    </body>
 </html>   
      


