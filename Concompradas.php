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






  

 ?>

<!DOCTYPE html>
<html lang="es">
   <?php include('head.php')?> <!--HEAD AQUI -->
    <body class="sb-nav-fixed">

        <?php include('menu.php')?> <!--MENU AQUI-->


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid" style="padding-top: 18px;">
                        
                       <?php include('menuB.php')?>
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
                                                <th>Solicitado</th>
                                                <th>comentarios</th>
                                                <th>Importe</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
    
           $queryA = "SELECT RE.Id_Requisicion, RE.Requisicion, RE.Requisitor, CO.Id_compra,RE.Proveedor, RE.Fecha_solicitud, RE.Fecha_requerida, RE.Importe,CO.comentarios FROM rq_requisicione RE INNER JOIN compras CO ON RE.Id_Requisicion=CO.Id_Requisicion where RE.Id_Requisicion=CO.Id_Requisicion";
          $result_requisicionA = mysqli_query($mysqli, $queryA);   

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
