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
                  <img src="images/f.png" alt="Mi titulo de la imagen" style="width: 500px; height: 70px; margin:10px auto;
        display:block;">
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
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                              <th style="width:35px;">Requisicion</th>
                                                <!--<th style="width:35px; text-align: center;">Autorizado</th>-->
                                                <th style="width:400px;">Descripcion</th>
                                                <th style="width:35px; text-align: center;">Fecha Solicitado</th>
                                                <th style="width:35px; text-align: center;">Fecha requerida</th>
                                               <th style="width:40px; text-align: center;">Importe</th>
                                                <th style="width:200px;">Requerido por</th>
                                                <th style="width:35px;">Ver</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
    
          $query = "SELECT RE.Id_Requisicion,RE.Requisicion,RE.Descripcion,RE.Fecha_solicitud,RE.Fecha_requerida,RE.Importe, RE.Requisitor, re.Status FROM rq_requisicione RE WHERE Status='Autorizada A1'";

          $result_Enviada = mysqli_query($mysqli, $query);    

          while($row = mysqli_fetch_assoc($result_Enviada)) { ?>
          <tr>
            <td><?php echo $row['Requisicion']; ?></td>
            <!--<td><?php /*echo $row['JefeAutoriza'];*/ ?></td>-->
            <td style="height:10px; "><?php echo $row['Descripcion']; ?></td>
            <td style="height:10px; "><?php echo $row['Fecha_solicitud']; ?></td>
            <td style="height:10px; "><?php echo $row['Fecha_requerida']; ?></td>
            <td style="height:10px; "><?php echo $row['Importe']; ?></td>
            <td style="height:10px; "><?php echo $row['Requisitor']; ?></td>

              <td><div ><a href="Afinanzas.php?Id_Requisicion=<?php echo $row['Id_Requisicion']?>" class="btn btn-success">
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
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <!--<th>Requisicion</th>-->
                                                <th>Producto/Descripción</th>
                                                <th style="width:35px; text-align: center;">Cantidad</th>
                                                <th style="width:30px; text-align: center;">Precio</th>
                                                
                                               <th style="width:30px; text-align: center;">Importe</th>
                                                <th style="width:30px; text-align: center;">Moneda</th>
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
  if (isset($_GET['Id_Requisicion'])) {
 $Id_Requisicion = $_GET['Id_Requisicion'];
    
          $query = "SELECT RD.Id_Requisicion,RE.Requisicion,RD.Status,RD.Descripciond,RD.Cantidad,RD.Precio,RD.Cantidad * RD.Precio AS Importe, RE.Moneda FROM rq_requisiciond RD INNER JOIN rq_requisicione RE ON RE.Id_Requisicion = RD.Id_Requisicion WHERE RE.Id_Requisicion=$Id_Requisicion AND RD.Status='Autorizada A1'";

          $result_Enviada = mysqli_query($mysqli, $query);    

          while($row = mysqli_fetch_assoc($result_Enviada)) { ?>
          <tr>
            <!--<td><?php /*echo $row['Requisicion'];*/ ?></td>-->
            <td><?php echo $row['Descripciond']; ?></td>
            <td><?php echo $row['Cantidad']; ?></td>
            <td><?php echo $row['Precio']; ?></td>
             <td><?php echo $row['Importe']; ?></td>
            <td><?php echo $row['Moneda']; ?></td>
            
            
             </td>
             
          
          </tr>
          <?php }  }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

<form method="post" action="#" border="1">

<div class="form-inline" style="width: 500px; margin:10px   auto;">
      
       <input type="text" name="correo" id="correo" value="<?php echo $Correo; ?>" style=" width:130px; margin-top:6px; border-color: white; background-color: white; color: white;" class="form-control mx-2" readonly>
       
                             <!--ID:jus -->
      <input type="text" name="contraseña" id="contraseña" value="<?php echo $Contraseña; ?>" style=" width:130px; margin-top:6px; border-color: white; background-color: white; color: white;"  class="form-control mx-2" readonly>
       
</div> 

<div class="form-group" style="width: 700px; margin:10px auto;">
  

       <label for="">Comentario:</label>
      <textarea type="text" style=" resize: none; width: 624px;" class="form-control" name="com" id="com"></textarea>
      </div>

       <div  style="margin: auto; width: 700px;" >
        <button type="submit" name="Autoriza_Finanzas" id="Autoriza_Finanzas" class="btn btn-success" style=" width:130px; margin-top:6px;" onclick="return autorizar();"><i class="fad fa-thumbs-up mx-2" style='font-size: 20px'></i>Autorizar</button>

       <button type="submit" name="Devolver" id="Devolver" class="btn btn-warning" style=" width:120px; margin-top:6px; " onclick="return Devolver();"><i class="fas fa-undo " style='font-size: 18px'></i>Devolver</button>

       <button type="submit" name="Seguimiento" id="Seguimiento" class="btn btn-info"    style=" width:150px; margin-top:6px; " onclick="return Seguimiento();"><i class="fas fa-map-marker-alt mx-2" style='font-size: 19px'></i>Seguimiento</button>

       <button type="submit" name="Cancelar" id="Cancelar" class="btn btn-danger"  style=" width:210px;  margin-top:6px; " onclick="return Cancelar();"><i class="fas fa-ban mx-2" style='font-size: 19px'></i>Cancela Requisicion</button>
        </div>   
          
</form>

                        

                    </div>

                </main>


               
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
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

