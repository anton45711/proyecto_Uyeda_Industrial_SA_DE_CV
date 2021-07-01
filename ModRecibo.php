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


 
<div style=" border: 2px solid black; margin: auto; width: 800px; margin-top: 79px;">
<div class="d-flex flex-row">
   <div class="p-3"><img src="images/a.png" alt="Mi titulo de la imagen" style="width: 180px; margin:10px auto;
        display:block;"></div>


    <div class="p-3"> <p style="text-align: center; padding-top: 20px; font-weight: bold;">UYEDA INDUSTRIAL DE MÉXICO SA DE CV.</p>
    <p style="text-align: center; font-weight: bold;">MODIFICAR A RECEPCIONADO </p></div>
  </div>
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
     <label for="" class="mx-2" style="font-weight: bold;">Cuenta Contable:</label>
      <p id=" fecC" name="fecC"><p class="mx-2" style="padding-top: 15px;"><?php echo $CuentaCont; ?></p><!--ID:fecC --> 
       </div>
<div class="form-inline">
     <label for="" class="mx-2" style="font-weight: bold;">Producto o Servicio:</label>
      <p id=" fecC" name="fecC"><p class="mx-2" style="padding-top: 15px;"><?php echo $Descripciond; ?></p><!--ID:fecC --> 
       </div>
<div class="form-inline">
     <label for="" class="mx-2" style="font-weight: bold;">Importe:</label>
      <p id=" fecC" name="fecC"><p class="mx-2" style="padding-top: 15px;"><?php echo $ImporteTotal ; ?></p><!--ID:fecC --> 
       </div>

     

</div>

     
         <div  style=" width: 700px; padding-left: 200px;" >
        <button type="submit" name="Cambiar_Recibo_Estatus" id="Cambiar_Recibo_Estatus"  class="btn btn-success" style=" width:190px; margin-top:78px; " onclick="return modificar_R();"><i class="fas fa-check-square"></i> Cambiar a Recepcionado </button>
      </div>

         
    </div>
</form>
</div>

<form method="post" action="#" border="1">
        <div class="form-group">
      
       
</div>        

</form>
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

<script type="text/javascript">
  $(document).ready(function(){
    $('#maq').select2();
  });
</script>
