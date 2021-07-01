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
<form style="padding-top: 45px;">
<div style=" 
  border-style: solid;
  border-color: black; margin: auto; width: 1000px; ">

  <div class="d-flex flex-row">
  <div class="p-3"><img src="images/a.png" alt="Mi titulo de la imagen" style="width: 180px; margin:10px auto;
        display:block;"></div>
  <div class="p-3"> <p style="text-align: center; padding-top: 20px; font-weight: bold;">UYEDA INDUSTRIAL DE MÉXICO SA DE CV.</p>
    <p style="text-align: center; font-weight: bold;">REQUISICIÓN DE AUTORIZACIÓN COMPRADOR</p></div>
 
</div>
  
   
<div class="d-flex">
  <div class="p-2">
<div class="form-inline">
<label for="" class="mx-2" style="font-weight: bold;">Folio:</label> <p class="mx-2" style="padding-top: 15px;"><?php echo    $Requisicion; ?></p>
      
</div>

 <div class="form-inline">
     <label for="" class="mx-2" style="font-weight: bold;">Fecha captura:</label>
      <p id=" fecC" name="fecC"><p class="mx-2" style="padding-top: 15px;"><?php echo $Fecha_solicitud; ?></p><!--ID:fecC --> 
  </div>

<div class="form-inline">
      <label for="" class="mx-2" style="font-weight: bold;">Fecha requerida:</label>
        <p id=" fecC" name="fecC"><p class="mx-2" style="padding-top: 15px;"><?php echo $Fecha_requerida; ?></p>
       </div>

</div>

<div class="form-inline">
     <label for="" class="mx-2" style="font-weight: bold;">Proveedor:</label>
      <p id=" fecC" name="fecC"><p class="mx-2" style="padding-top: 15px;"><?php echo $Proveedor; ?></p><!--ID:fecC --> 
       </div>
</div>



  <table class="table table-striped">
  <thead>
    <tr>
      <tr>
                                             
                                                <th>Producto/Descripcion</th>
                                                <th style="width:35px; text-align: center;">Cantidad</th>
                                             
                                                
                                               <th style="width:120px; text-align: center;">U. Medida</th>
                                                <th style="width:35px; text-align: center;">Moneda</th>
                                               <th style="width:35px; text-align: center;">Importe</th>
                                              
                                               
                                            </tr>
    </tr>
  </thead>
  <tbody>
     <?php
  if (isset($_GET['Id_Requisicion'])) {
 $Id_Requisicion = $_GET['Id_Requisicion'];
    
$query = "SELECT RD.Id_Requisicion,RE.Requisicion,RD.Status,RD.Descripciond,RD.Cantidad,RD.Precio,RD.Cantidad * RD.Precio AS Importe, RD.Unidad,RE.Moneda FROM rq_requisiciond RD INNER JOIN rq_requisicione RE ON RE.Id_Requisicion = RD.Id_Requisicion WHERE RE.Id_Requisicion=$Id_Requisicion ";

          $result_Enviada = mysqli_query($mysqli, $query);    

          while($row = mysqli_fetch_assoc($result_Enviada)) { ?>
          <tr>
            
            <td><?php echo $row['Descripciond']; ?></td>
            <td><?php echo $row['Cantidad']; ?></td>
             <td><?php echo $row['Unidad']; ?></td>
            <td><?php echo $row['Moneda']; ?></td>
             <td><?php echo $row['Importe']; ?></td>
           
<?php
require "conexion.php";

 
if ($_GET['Id_Requisicion']) {
 $Id_Requisicion = $_GET['Id_Requisicion'];
 

 $queryI = "SELECT sum(RE.Importe) as ImporteTotal FROM rq_requisicione RE WHERE Id_Requisicion= $Id_Requisicion;";
$resultado=$mysqli -> query($queryI);
$filaI=$resultado->fetch_assoc(); //que te devuelve un array asociativo con el nombre del campo

 //Este es el valor que acabas de calcular en la consulta

}

?>

             
            
             
          
          </tr>
          <?php }  }?>
  </tbody>
</table>

<div class="form-inline">
     <label for="" class="mx-2" style="font-weight: bold;">IMPORTE TOTAL:</label>
      <p id=" fecC" name="fecC"><p class="mx-2" style="padding-top: 15px;"><?php echo $ImporteTotal=$filaI['ImporteTotal'];?></p><!--ID:fecC --> 
       </div>
             
<div class="form-group" style="   justify-content: center;">
      <p class="mx-2" style="text-align: center;padding-top: 100px; font-weight: bold;">_________________________________________</p>
      <p  class="mx-2" style="text-align: center; font-weight: bold;">FIRMA DEL COMPRADOR</p>
      <p class="mx-2" style="text-align: center; font-weight: bold;"><?php echo $usuario; ?></p><!--ID:fecC --> 
       </div>
</div>
</form>

                </main>

<div style=" padding-top: 15px; text-align:center;margin:auto;">
<button type="button"  class="btn btn-info" style="width:200px; left:0;" onclick="window.print()"> Imprimir</button>
</div>
               
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