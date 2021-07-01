
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
$whereD = "";

}else if($tipo_usuario == 2 || 
         $tipo_usuario == 3 || 
         $tipo_usuario == 4 || 
         $tipo_usuario == 5 || 
         $tipo_usuario == 6 || 
         $tipo_usuario == 7){

$where = "WHERE Requisitor = '$usuario'";
$whereD = "WHERE Requisitor = '$usuario'";

}


  $query = "SELECT RE.Id_Requisicion, RE.Requisicion, RE.Proveedor, RE.Fecha_solicitud, RE.Fecha_requerida, RE.Importe, RE.Status FROM rq_requisicione RE $where";
  $result_requisicion = mysqli_query($mysqli, $query);


if (isset($_GET['Id_Registro'])) {
  $query = "SELECT RE.Id_Requisicion, RD.Id_Registro,RD.Id_Requisicion, RE.Requisicion, RE.Proveedor, RE.Fecha_solicitud, RE.Fecha_requerida, sum(RD.Precio * RD.Cantidad) as Importe, RE.Status FROM rq_requisicione RE INNER JOIN rq_requisiciond RD ON RE.Id_Requisicion=RD.Id_Requisicion ";  
  $result_requisicion = mysqli_query($mysqli, $query);
}


  $queryA = "SELECT RE.Id_Requisicion, RE.Requisicion, RE.Requisitor, CO.Id_compra,RE.Proveedor, RE.Fecha_solicitud, RE.Fecha_requerida, RE.Importe,CO.comentarios FROM rq_requisicione RE INNER JOIN compras CO ON RE.Id_Requisicion=CO.Id_Requisicion $whereD";
          $result_requisicionA = mysqli_query($mysqli, $queryA);   

 ?>

<!DOCTYPE html>
<html lang="es">
   <?php include('head.php')?> <!--HEAD AQUI -->
    <body class="sb-nav-fixed">

        <?php include('menu.php')?> <!--MENU AQUI-->


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid" style="padding-top: 18px;">
                        
                        <img src="images/j.png" alt="Mi titulo de la imagen" style="width: 500px; height: 70px; margin:10px auto;
        display:block;">
                        <div class="row">
                           
                           
                            
                           
                        </div>
                       
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
                                                <th>Requisición</th>
                                                <th>Proveedor</th>
                                                <th>Capturado</th>
                                                <th>Requerido</th>
                                                <th>Importe</th>
                                               <th>Estatus</th>
                                                <th>Acciones</th>
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



              <td><div ><a href="
    Mrequisicion.php?Id_Requisicion=<?php echo $row['Id_Requisicion']?>&Status=<?php echo $row['Status']?>" class="btn btn-success">
    
                <i class="fas fa-marker" ></i></a></div>



    



              

                
            
             </td>
             
          
          </tr>
          <?php } ?>
                                        </tbody>







                                    </table>
                                </div>
                            </div>
                        </div>

                         <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Compradas
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Requisición</th>
                                                <th>Proveedor</th>
                                                <th>Solicitado</th>
                                                <th>comentarios</th>
                                                <th>Importe</th>
                                               
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            <tr>
                                               <?php
    
     

          while($row = mysqli_fetch_assoc($result_requisicionA)) { ?>
          <tr>
            <td><?php echo  $mysqli ->real_escape_string($row['Requisicion']); ?></td>
            <td><?php echo  $mysqli ->real_escape_string($row['Proveedor']); ?></td>
            <td><?php echo  $mysqli ->real_escape_string($row['Fecha_solicitud']); ?></td>
            <td><?php echo  $mysqli ->real_escape_string($row['comentarios']); ?></td>
            <td><?php echo  $mysqli ->real_escape_string($row['Importe']); ?></td>
           


            
              

                
            
             </td>
             
          
          </tr>
          <?php } ?>
                                             
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Uyeda Industrial de México 2020</div>
                           
                        </div>
                    </div>
                </footer>
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
