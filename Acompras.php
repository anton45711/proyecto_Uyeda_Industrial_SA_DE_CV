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




<?php



include("conexion.php");
    
$Correo         ='';
$Contraseña     ='';


if  (isset($_GET['Id_Requisicion']) ) {


  $Id_Requisicion = $mysqli ->real_escape_string($_GET['Id_Requisicion']);

  $query = "SELECT USU.Correo,USU.password FROM correos USU WHERE usuario= '$usuario'";

  $result = mysqli_query($mysqli, $query);

  if (mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_array($result);

$Correo            =$mysqli ->real_escape_string($row['Correo']);
$Contraseña        =$mysqli ->real_escape_string($row['password']);

}
else{
  echo 'no se recibio ID';
}
}

?>





<!DOCTYPE html>
<html lang="es">
   <?php include('head.php')?> <!--HEAD AQUI -->
    <body class="sb-nav-fixed">

        <?php include('menu.php')?> <!--MENU AQUI-->


            <div id="layoutSidenav_content">
                <main>
                 

        <?php include('menuOC.php')?>
<p>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Boton para Maximizar o minimizar
  </button>
</p>
                    <div class="container-fluid">
<div class="collapse" id="collapseExample">
       

 <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                En proceso
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" >
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="width:15px;">Requisicion</th>
                                               <th style="width:15px;">O. de compra</th>
                                                <th style="width:400px;">Descripcion</th>
                                               
                                                <th style="width:35px; text-align: center;">Fecha requerida</th>

                                               <th style="width:35px; text-align: center;">Importe</th>
                                                <th style="width:200px;">Requerido por</th>
                                                <th style="width:100px;">Proveedor</th>
                                                <th style="width:109px;">Ver</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
    
          $query = "SELECT RE.Id_Requisicion,RE.NumCompras,RE.Requisicion,RE.Descripcion,RE.Fecha_solicitud,RE.Fecha_requerida,RE.Importe, RE.Requisitor,RE.Proveedor,RE.Status FROM rq_requisicione RE WHERE RE.Status='Autorizada A2'  AND  (RE.Importe<1500 or RE.Moneda = 'Pesos') and (RE.Importe<1500 or RE.Moneda = 'Dolares') or RE.Status='Autorizada A3' or RE.Status='Maquila'  or RE.Status='Reenviado'";

          $result_Enviada = mysqli_query($mysqli, $query);    

          while($row = mysqli_fetch_assoc($result_Enviada)) { ?>
          <tr>
            <td><?php echo $row['Requisicion']; ?></td>
            <td><?php echo $row['NumCompras']; ?></td>
            <td><?php echo $row['Descripcion']; ?></td>
             <td><?php echo $row['Fecha_requerida']; ?></td>
            <td><?php echo $row['Importe']; ?></td>
            <td><?php echo $row['Requisitor']; ?></td>
            <td><?php echo $row['Proveedor']; ?></td>

              <td>

              <div ><a  style="margin-right: 20px;" href="ModnumOC.php?Id_Requisicion=<?php echo $row['Id_Requisicion']?>" class="btn btn-primary">
                <i class="fas fa-marker" ></i></a>
              


              	<a  style="margin-right: 20px;" href="Acompras.php?Id_Requisicion=<?php echo $row['Id_Requisicion']?>"  class="btn btn-success">
                <i class="fas fa-binoculars" ></i></a></div>

             


              

                
            
             </td>
             
          
          </tr>
          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                         </div>


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>

               <?php                             
     if (isset($_GET['Id_Requisicion'])) {

                  echo "Requisición: $Requisicion"; 
              
    }
         
?> 
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable"  cellspacing="0">
                                        <thead>
                                            <tr >
                                             <th style="width:10px; text-align: center;">O. de compra</th>
                                                <th style="width:650px; text-align: center;">Producto/Descripcion</th>
                                                <th style="width:35px; text-align: center;">Cantidad</th>
                                                <th style="width:30px; text-align: center;">Precio</th>                                     
                                                <th style="width:30px; text-align: center;">Importe</th>
                                                 <th style="width:30px; text-align: center;">U.Med</th>
                                                <th style="width:30px; text-align: center;">Moneda</th>
                                                 <th style="width:90px; text-align: center;">Cuenta</th>
                                                 <th style="width:10px; text-align: center;">Ver</th>
                                                <!--<th style="width:35px; text-align: center;">Autorizado</th>-->
                                               
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
  if (isset($_GET['Id_Requisicion']) OR $Status=='Autorizada A3') {
 $Id_Requisicion = $_GET['Id_Requisicion'];
   
          $query = "SELECT RD.Id_Requisicion,RD.Id_Registro,RD.numeroOC,RE.Requisicion,RD.Status,RD.Descripciond,RD.Cantidad,RD.Precio,RD.Cantidad * RD.Precio AS Importe, RD.Unidad, RE.Moneda, RD.CuentaCont FROM rq_requisiciond RD INNER JOIN rq_requisicione RE ON RE.Id_Requisicion = RD.Id_Requisicion WHERE RE.Id_Requisicion=$Id_Requisicion and (RE.Importe>30000 or RE.Moneda = 'Pesos') and (RE.Importe>1500 or RE.Moneda = 'Dolares') ";

         $result_Enviada = mysqli_query($mysqli, $query);    

          while($row = mysqli_fetch_assoc($result_Enviada)) { ?>
          <tr>
            <td><?php echo $row['numeroOC']; ?></td>
            <td><?php echo $row['Descripciond']; ?></td>
            <td style="text-align: center;"><?php echo $row['Cantidad']; ?></td>
            <td style="text-align: center;"><?php echo $row['Precio']; ?></td>
            <td style="text-align: center;"><?php echo $row['Importe']; ?></td>
            <td style="text-align: center;"><?php echo $row['Unidad']; ?></td>
            <td style="text-align: center;"><?php echo $row['Moneda']; ?></td>
            <td style="text-align: center;"><?php echo $row['CuentaCont']; ?></td>
            <!--<td style="text-align: center;"><?php /* echo $row['JefeAutoriza'];*/ ?></td>-->
             

              
            
            <td>
             <div ><a href="ModnumOCdos.php?Id_Requisicion=<?php echo $row['Id_Requisicion']?>&Id_Registro=<?php echo $row['Id_Registro']?>" class="btn btn-primary">
                <i class="fas fa-marker" ></i></a>
           </td>
             
             
          
          </tr>
          <?php }  }?>

<div>

  <?php
 if (isset($_GET['Id_Requisicion']) OR $Status=='Autorizada A1' OR $Status=='Autorizada A2' OR $Status=='Autorizada A3') {

 $Id_Requisicion = $_GET['Id_Requisicion'];


          $query = "SELECT RE.Id_Requisicion,AUTUNO.Fec_Autoriza1,AUTDOS.Fec_Autoriza2,AUTTRE.Fec_Autoriza3
   from rq_requisicione RE JOIN autorizar AUTUNO ON RE.Id_Requisicion=AUTUNO.Id_Requisicion JOIN autoriza_dos AUTDOS ON AUTUNO.Id_Requisicion=AUTDOS.Id_Requisicion JOIN autoriza_tres AUTTRE ON AUTDOS.Id_Requisicion=AUTTRE.Id_Requisicion where RE.Id_Requisicion=$Id_Requisicion";

           $result = mysqli_query($mysqli, $query);


  if (mysqli_num_rows($result) == 1) {
  $date = new DateTime();
  $row = $date->format('y-m-d');
  $row = mysqli_fetch_array($result);



ECHO "<p>Autorizado jefe inmediato: <b>".$row['Fec_Autoriza1']."</b></p>";
ECHO "<p>Autorizado finanzas:       <b>".$row['Fec_Autoriza2']."</b></p>";

}else{
  echo "Requisicion con Maquila";
}}
?>


<?php
 if (isset($_GET['Id_Requisicion']) OR $Status=='Autorizada A1' OR $Status=='Autorizada A2' OR $Status=='Autorizada A3') {

 $Id_Requisicion = $_GET['Id_Requisicion'];


          $query = "SELECT REC.Id_rechazar,REE.Id_requisicion,REE.Id_requisicion,REC.Fec_Rechazo,REE.Fec_Reenvio FROM rechazado REC inner join reenvio REE ON REC.Id_requisicion=REE.Id_requisicion  where REC.Id_Requisicion=$Id_Requisicion";

           $result = mysqli_query($mysqli, $query);


  if (mysqli_num_rows($result) == 1) {
  $date = new DateTime();
  $row = $date->format('y-m-d');
  $row = mysqli_fetch_array($result);


ECHO "<p>Ult. rechazo:<b>".$row['Fec_Rechazo']."</b></p>";
ECHO "<p>Ult. Reenvio:<b>".$row['Fec_Reenvio']."</b></p>";


}else{
  echo "no hay Reenvios ni Rechazos";
}}
?>





</div>

           <?php
  if (isset($_GET['Id_Requisicion']) OR $Status=='Autorizada A2') {
 $Id_Requisicion = $_GET['Id_Requisicion'];
   
          $query = "SELECT RD.Id_Requisicion,RE.Requisicion,RD.Id_Registro,RD.numeroOC,RD.Status,RD.Descripciond,RD.Cantidad,RD.Precio,RD.Cantidad * RD.Precio AS Importe, RD.Unidad, RE.Moneda, RD.CuentaCont FROM rq_requisiciond RD INNER JOIN rq_requisicione RE ON RE.Id_Requisicion = RD.Id_Requisicion WHERE RE.Id_Requisicion=$Id_Requisicion and (RE.Importe<30000 or RE.Moneda = 'Pesos') and (RE.Importe<1500 or RE.Moneda = 'Dolares') ";

         $result_Enviada = mysqli_query($mysqli, $query);    

          while($row = mysqli_fetch_assoc($result_Enviada)) { ?>
          <tr>
           <td><?php echo $row['numeroOC']; ?></td>
            <td><?php echo $row['Descripciond']; ?></td>
            <td style="text-align: center;"><?php echo $row['Cantidad']; ?></td>
            <td style="text-align: center;"><?php echo $row['Precio']; ?></td>
            <td style="text-align: center;"><?php echo $row['Importe']; ?></td>
            <td style="text-align: center;"><?php echo $row['Unidad']; ?></td>
            <td style="text-align: center;"><?php echo $row['Moneda']; ?></td>
            <td style="text-align: center;"><?php echo $row['CuentaCont']; ?></td>
            <!--<td style="text-align: center;"><?php /* echo $row['JefeAutoriza'];*/ ?></td>-->
             

              <td>
             <div ><a href="ModnumOCdos.php?Id_Requisicion=<?php echo $row['Id_Requisicion']?>&Id_Registro=<?php echo $row['Id_Registro']?>" class="btn btn-primary">
                <i class="fas fa-marker" ></i></a>
           </td>
             
          
          </tr>
          <?php }  }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>





<form method="post" action="#" border="1">
    
<div class="form-inline" style="width: 600px; margin:10px   auto;">
      
       <input type="text" name="correo" id="correo" value="<?php echo $Correo; ?>" style=" width:130px; margin-top:6px; border-color: white; background-color: white; color: white;" class="form-control mx-2" readonly>
       
                                 <!--ID:jus -->
      <input type="text" name="contraseña" id="contraseña" value="<?php echo $Contraseña; ?>" style=" width:130px; margin-top:6px; border-color: white; background-color: white; color: white;"  class="form-control mx-2" readonly>
       
</div> 

<div class="form-group" style="width: 900px; margin:10px auto;">
 
       <label for="">Comentario:</label>
      <textarea type="text" style=" resize: none; width: 710px;" class="form-control" name="com" id="com"></textarea>
      </div>


       <div  style="margin: auto; width: 700px;" >
       <button type="submit" name="seguimiento_compras" id="seguimiento_compras" class="btn btn-success" style=" width:180px; margin-top:6px; " onclick="return compras();"><i class="fad fa-thumbs-up mx-2" style='font-size: 20px'></i>Seguimiento</button>

       <!--<a  style=" width:130px; margin-top:6px; "href="ImpCompra.php?Id_Requisicion=<?php echo $Id_Requisicion?>"  class="btn btn-secondary">
                Imprime Req.</a>-->

       <button type="submit" name="Rechazo" id="Rechazo" class="btn btn-danger"  style=" width:200px;  margin-top:6px;" onclick="return Rechazar();"><i class="fas fa-window-close mx-2" style='font-size: 20px'></i>Rechazar</button>
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

