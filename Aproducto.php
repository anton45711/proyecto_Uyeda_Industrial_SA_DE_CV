<?php 

    session_start();

    if(!isset ($_SESSION['idusuario'])){
        header("location: index.php");

    }

    $Puesto = $_SESSION['Puesto'];
     $usuario = $_SESSION['usuario'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
    

 ?>




<?php

include("conexion.php");

if(isset($_GET['Id_Registro'])) {
  $Id_Registro = $_GET['Id_Registro'];
  $query = "DELETE FROM rq_requisiciond WHERE Id_Registro = $Id_Registro";
  $result = mysqli_query($mysqli, $query);

  header('Location: Aeliminar.php');
  if(!$result) {
    die("Query Failed.");
  }

  
}

?>




<!DOCTYPE html>
<html lang="es">
   <?php include('head.php')?> <!--HEAD AQUI -->
    <body class="sb-nav-fixed">

        


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">

        <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th style="width: 300px;">Descripcion</th>
                                                <th style="width: 35px;">Cantidad</th>
                                                <th style="width: 35px;">Precio</th>
                                                <th style="width: 35px;">Subtotal</th>    
                                                <th style="width: 300px;">Justificación</th>
                                                <th style="width: 48px;">Cuenta</th>
                                                 <th style="width: 35px;">Acciones</th>
                                                
                                            
                                            </tr>
                                        </thead>
                                     
                                        <tbody>
                                            <?php
  if (isset($_GET['Id_Requisicion'])) {
 $Id_Requisicion = $_GET['Id_Requisicion'];
    $query = "SELECT RE.Id_Requisicion, RD.Id_Requisicion,RE.Importe, RD.Id_Registro, RD.Descripciond, RD.Cantidad, RD.Precio, RD.Justificacion, RD.CuentaCont, RD.Cantidad * RD.Precio AS Subtotal FROM rq_requisiciond RD INNER JOIN rq_requisicione RE ON RE.Id_Requisicion=RD.Id_Requisicion WHERE RE.Id_Requisicion = $Id_Requisicion ";
          $result_requisicion = mysqli_query($mysqli, $query);    

          while($row = mysqli_fetch_assoc($result_requisicion)) { ?>
          <tr>
            
            <td><?php echo $mysqli ->real_escape_string($row['Descripciond']); ?></td>
            <td><?php echo $mysqli ->real_escape_string($row['Cantidad']); ?></td>
            <td><?php echo $mysqli ->real_escape_string($row['Precio']); ?></td>
            <td><?php echo $mysqli ->real_escape_string($row['Subtotal']); ?></td>
            <td><?php echo $mysqli ->real_escape_string($row['Justificacion']); ?></td>
            <td><?php echo $mysqli ->real_escape_string($row['CuentaCont']); ?></td>
              <td> 

                

                <a href="Aproducto.php?Id_Registro=<?php echo $row['Id_Registro']?>&Importe=<?php echo $row['Importe']?>" class="btn btn-danger"><i class="fas fa-trash-alt" ></i></a>
                 <a href="Mproducto.php?Id_Registro=<?php echo $row['Id_Registro']?>&Importe=<?php echo $row['Importe']?>" class="btn btn-success"><i class=" fas fa-marker" ></i></a>


              

               
            
             </td>
             
          
          </tr>
          <?php } 




           }?>
                                        </tbody>
                                    </table>

 
                      
                        </div>


                       
                        

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

