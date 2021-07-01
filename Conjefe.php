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

<?php include('Fcorreo.php')?>





<!DOCTYPE html>
<html lang="es">
   <?php include('head.php')?> <!--HEAD AQUI -->
    <body class="sb-nav-fixed">

        <?php include('menu.php')?> <!--MENU AQUI-->


            <div id="layoutSidenav_content">
<?php include('menuB.php')?>
 
                     
<p>
<div class="col-sm">
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
                                                <!--<th style="width:35px; text-align: center;">Autorizado</th>-->
                                                <th style="width:400px;">Descripcion</th>
                                                <th style="width:35px; text-align: center;">Fecha Solicitado</th>
                                                <th style="width:35px; text-align: center;">Fecha requerida</th>
                                               <th style="width:35px; text-align: center;">Importe</th>
                                                <th style="width:200px;">Requerido por</th>
                                                <th style="width:200px;">Autorizado por</th>
                                                <th style="width:200px;">Fecha Autorizo</th>
                                                <th style="width:200px;">Hora Autorizo</th>
                                                <th style="width:200px;">Comentario</th>
                                                <th style="width:35px;">Ver</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
    
          $query = "SELECT RE.Id_Requisicion,AUTUNO.Id_Autoriza, RE.Requisicion, RE.Proveedor,RE.Maquila, RE.Descripcion, RE.Fecha_solicitud ,RE.Fecha_requerida,RE.Moneda,RE.Requisitor,RE.Importe ,AUTUNO.Autoriza1,AUTUNO.Fec_Autoriza1,AUTUNO.Hr_Autoriza1,AUTUNO.Com_Autoriza1 from rq_requisicione RE INNER JOIN autorizar AUTUNO ON RE.Id_Requisicion=AUTUNO.Id_Requisicion ";

          $result_Enviada = mysqli_query($mysqli, $query);    

          while($row = mysqli_fetch_assoc($result_Enviada)) { ?>
          <tr>
            <td><?php echo $row['Requisicion']; ?></td>
            <td><?php echo $row['Descripcion']; ?></td>
            <td><?php echo $row['Fecha_solicitud']; ?></td>
             <td><?php echo $row['Fecha_requerida']; ?></td>
            <td><?php echo $row['Importe']; ?></td>
            <td><?php echo $row['Requisitor']; ?></td>
            <td><?php echo $row['Autoriza1']; ?></td>
            <td><?php echo $row['Fec_Autoriza1']; ?></td>
            <td><?php echo $row['Hr_Autoriza1']; ?></td>
            <td><?php echo $row['Com_Autoriza1']; ?></td>


              <td><div ><a href="ConJefe.php?Id_Requisicion=<?php echo $row['Id_Requisicion']?>" class="btn btn-success">
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
                                            
                                                <th>Producto/Descripcion</th>
                                                <th style="width:35px; text-align: center;">Cantidad</th>
                                                <th style="width:30px; text-align: center;">Precio</th>
                                                
                                               <th style="width:30px; text-align: center;">Importe</th>
                                                <th style="width:30px; text-align: center;">Moneda</th>
                                                <!--<th style="width:35px; text-align: center;">Autorizado</th>-->
                                               
                                            </tr>
                                        </thead>
                                        
                                        
                                            <?php
  if (isset($_GET['Id_Requisicion'])) {
 $Id_Requisicion = $_GET['Id_Requisicion'];
    
          $query = "SELECT RD.Id_Requisicion,RE.Requisicion,RD.Status,RD.Descripciond,RD.Cantidad,RD.Precio,RD.Cantidad * RD.Precio AS Importe, RE.Moneda FROM rq_requisiciond RD INNER JOIN rq_requisicione RE ON RE.Id_Requisicion = RD.Id_Requisicion WHERE RE.Id_Requisicion=$Id_Requisicion";

          $result_Enviada = mysqli_query($mysqli, $query);    

          while($row = mysqli_fetch_assoc($result_Enviada)) { ?>
          <tr>
           
            <td><?php echo $row['Descripciond']; ?></td>
            <td style="text-align: center;"><?php echo $row['Cantidad']; ?></td>
            <td style="text-align: center;"><?php echo $row['Precio']; ?></td>
            <td style="text-align: center;"><?php echo $row['Importe']; ?></td>
            <td style="text-align: center;"><?php echo $row['Moneda']; ?></td>
            <!--<td style="text-align: center;"><?php /* echo $row['JefeAutoriza'];*/ ?></td>-->
             

              
            
             </td>
             
          
          </tr>
          <?php }  }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>




                    </div>

                </main>


               
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

