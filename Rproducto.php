
 <?php
 session_start();
require 'conexion.php';

if (!isset($_SESSION['idusuario'])){
    header("Location: index.php");
}

$idusuario = $_SESSION['idusuario'];
$tipo_usuario =$_SESSION['tipo_usuario'];
$Puesto = $_SESSION['Puesto'];
$usuario = $_SESSION['usuario'];



$sql = "SELECT Requisitor from rq_requisicione";
$result = $mysqli->query($sql);



if($tipo_usuario == 1){

$where = "";
$OR = "";

}else if($tipo_usuario == 2 || 
         $tipo_usuario == 3 || 
         $tipo_usuario == 4 || 
         $tipo_usuario == 5 || 
         $tipo_usuario == 6 || 
         $tipo_usuario == 7){

$OR = "AND Requisitor = '$usuario'";


}


 $query = "SELECT RE.Id_Requisicion, RE.Requisicion, RE.Requisitor, RE.Proveedor, RE.Fecha_solicitud, RE.Fecha_requerida, RE.Importe, RE.Status FROM rq_requisicione RE WHERE RE.Status='AsignadaOC' $OR";

          $result_requisicion = mysqli_query($mysqli, $query);    

 ?>

<?php include('FuncionesMR.php')?> <!-- AQUI FUNCIONES DE Mrequisicion.php y Nrequisicion.php-->







<!DOCTYPE html>
<html lang="es">
   <?php include('head.php')?> <!--HEAD AQUI -->
    <body class="sb-nav-fixed">

        <?php include('menu.php')?> <!--MENU AQUI-->


            <div id="layoutSidenav_content">
                <main>
                  <img src="images/k.png" alt="Mi titulo de la imagen" style="width: 500px; height: 70px; margin:10px auto;
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
                                                <th style="width:89px;">Ver/Recepcionar</th>
                                            </tr>
                                        </thead>
                                        
                                        
                                        <tbody>
                                            <?php
    
         

          while($row = mysqli_fetch_assoc($result_requisicion)) { ?>
          <tr>
            <td><?php echo  $mysqli ->real_escape_string($row['Requisicion']); ?></td>
            <td><?php echo  $mysqli ->real_escape_string($row['Proveedor']); ?></td>
            <td><?php echo  $mysqli ->real_escape_string($row['Fecha_solicitud']); ?></td>
            <td><?php echo  $mysqli ->real_escape_string($row['Fecha_requerida']); ?></td>
            <td><?php echo  $mysqli ->real_escape_string($row['Importe']); ?></td>
            <td><?php echo  $mysqli ->real_escape_string($row['Status']); ?></td>

              <td><div ><a style="margin-right: 20px;" href="ImpRecibo.php?Id_Requisicion=<?php echo $row['Id_Requisicion']?>" class="btn btn-success">
                <i class="fas fa-binoculars" ></i></a>

              <a style="margin-right: 20px;" href="recepcionar.php?Id_Requisicion=<?php echo $row['Id_Requisicion']?>" class="btn btn-success">
              <i class="fas fa-check"></i></a></div></td>


              

                
            
             </td>
             
          
          </tr>
          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>

                        


                        

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