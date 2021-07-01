<?php 

    session_start();

    if(!isset ($_SESSION['idusuario'])){
        header("location: index.php");

    }

    $nombre = $_SESSION['nombre'];
     $usuario = $_SESSION['usuario'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
    

 ?>


<?php
$date = new DateTime();
?>

<?php 
$num = rand(1000,9999);
$anio = date("y");
$folio =  "RQ".$anio."-".$num;
?>





<!DOCTYPE html>
<html lang="es">
   <?php include('head.php')?> <!--HEAD AQUI -->
    <body class="sb-nav-fixed">

        <?php include('menu.php')?> <!--MENU AQUI-->


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Requisicion</th>
      <th scope="col">Proveedor</th>
      <th scope="col">Capturado</th>
      <th scope="col">requerido</th>
         <th scope="col">Importe</th>
         <th scope="col">Estatus</th>
         <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    require "conexion.php";
          $query = "SELECT RE.Requisicion, RE.Proveedor, RE.Fecha_solicitud, RE.Fecha_requerida, RD.Importe, RE.Status FROM rq_requisicione RE INNER JOIN rq_requisiciond RD on RE.Id_Requisicion=RD.Id_Registro;";
          $result_requisicion = mysqli_query($mysqli, $query);    

          while($row = mysqli_fetch_assoc($result_requisicion)) { ?>
          <tr>
            <td><?php echo $row['Requisicion']; ?></td>
            <td><?php echo $row['Proveedor']; ?></td>
            <td><?php echo $row['Fecha_solicitud']; ?></td>
            <td><?php echo $row['Fecha_requerida']; ?></td>
            <td><?php echo $row['Importe']; ?></td>
            <td><?php echo $row['Status']; ?></td>

              <td><button type="button" class="btn btn-danger">Eliminar</button>
              <button type="button" class="btn btn-success">Editar</button></td>
             
          
          </tr>
          <?php } ?>

   
    
  </tbody>
</table>

                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
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

