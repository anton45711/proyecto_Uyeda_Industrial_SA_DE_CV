<?php 

    session_start();

    if(!isset ($_SESSION['idusuario'])){
        header("location: index.php");

    }

    $Puesto = $_SESSION['Puesto'];
     $usuario = $_SESSION['usuario'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
    

 ?>

<?php include('FuncionesMR.php')?> <!-- AQUI FUNCIONES DE Mrequisicion.php y Nrequisicion.php-->







<!DOCTYPE html>
<html lang="es">
   <?php include('head.php')?> <!--HEAD AQUI -->
    <body class="sb-nav-fixed">

        <?php include('menu.php')?> <!--MENU AQUI-->


            <div id="layoutSidenav_content">
                <main>
                    <img src="images/d.png" alt="Mi titulo de la imagen" style="width: 500px; height: 70px; margin:10px auto;
        display:block;">

<div style=" border: 2px solid black; margin: auto; width: 750px; margin-top: 79px;">
    <div class="p-3"> <p style="text-align: center; padding-top: 20px; font-weight: bold;">UYEDA INDUSTRIAL DE MÉXICO SA DE CV.</p>
    <p style="text-align: center; font-weight: bold;">MODIFICAR ORDEN DE COMPRA </p></div>
<form method="post" action="#" border="1" style="margin:10px auto;">
    <div class="d-flex">
  <div class="p-2">
<div class="form-inline">
<label for="" class="mx-2" style="font-weight: bold;">Folio:</label>
 <p class="mx-2" style="padding-top: 15px;"><?php echo    $Requisicion; ?></p>
      
</div>
      
      

 <div class="form-inline">
     <label for="" class="mx-2" style="font-weight: bold;">Fecha captura:</label>
      <p id=" fecC" name="fecC"><p class="mx-2" style="padding-top: 15px;"><?php echo $Fecha_solicitud; ?></p><!--ID:fecC --> 
  </div>

<div class="form-inline">
      <label for="" class="mx-2" style="font-weight: bold;">Fecha requerida:</label>
        <p id=" fecC" name="fecC"><p class="mx-2" style="padding-top: 15px;"><?php echo $Fecha_requerida; ?></p>
       </div>



<div class="form-inline">
     <label for="" class="mx-2" style="font-weight: bold;">Proveedor:</label>
      <p id=" fecC" name="fecC"><p class="mx-2" style="padding-top: 15px;"><?php echo $Proveedor; ?></p><!--ID:fecC --> 
       </div>
<div class="form-inline">
     <label for="" class="mx-2" style="font-weight: bold;">Requisitor:</label>
      <p id=" fecC" name="fecC"><p class="mx-2" style="padding-top: 15px;"><?php echo $Requisitor; ?></p><!--ID:fecC --> 
       </div>



<div class="form-inline">
     <label for="" class="mx-2" style="font-weight: bold;">Importe:</label>
      <p id=" fecC" name="fecC"><p class="mx-2" style="padding-top: 15px;"><?php echo $Importe ; ?></p><!--ID:fecC --> 
       </div>


</div>

     <div class="form-group " style="width: 200px; margin-top: 15px; font-weight: bold;" >
       <label for=""> Orden de Compra:</label>
       <input type="number" name="NumeroOC" id="NumeroOC" class="form-control" placeholder="Ingresé un número">        

         <div  style="width: 200px; margin-top: 15px;" >
        <button type="submit" name="Cambiar" id="Cambiar" class="btn btn-success" style=" width:200px; margin-top:6px; " onclick="return modificar_R();">Modificar Orden de Compra</button>
        </div>
    </div>
</form>
</div>





                </main>


               
            </div>
        
      
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
Numero: