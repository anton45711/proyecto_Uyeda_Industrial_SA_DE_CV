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
                <main>
<?php
error_reporting(0);
?>
                   
                        
<?php
require "conexion.php";

if (isset($_POST['fechaen'])) { 
$fechauno                   = $mysqli ->real_escape_string($_POST["fechauno"]);
$fechados                   = $mysqli ->real_escape_string($_POST["fechados"]);

$queryEN = "SELECT count(*) AS Count_enviadas FROM rq_requisicione WHERE Fecha_solicitud BETWEEN '$fechauno' and '$fechados' and Status LIKE 'Enviada'";
$resultado=$mysqli -> query($queryEN);
$filaEN=$resultado->fetch_assoc(); 
}
?>


<?php
require "conexion.php";

if (isset($_POST['autorizadaA1'])) { 
$fechauno                   = $mysqli ->real_escape_string($_POST["fechauno"]);
$fechados                   = $mysqli ->real_escape_string($_POST["fechados"]);
$queryAU = "SELECT count(*) AS Count_autorizadaA1 FROM rq_requisicione WHERE Fecha_solicitud BETWEEN '$fechauno' and '$fechados' and Status LIKE 'Autorizada A1%'";
$resultado=$mysqli -> query($queryAU);
$filaAU=$resultado->fetch_assoc(); 
}
?>


<?php
require "conexion.php";

if (isset($_POST['autorizadaA2'])) { 
$fechauno                   = $mysqli ->real_escape_string($_POST["fechauno"]);
$fechados                   = $mysqli ->real_escape_string($_POST["fechados"]);
$queryAUdos = "SELECT count(*) AS Count_autorizadaA2 FROM rq_requisicione WHERE Fecha_solicitud BETWEEN '$fechauno' and '$fechados' and Status LIKE 'Autorizada A2%'";
$resultado=$mysqli -> query($queryAUdos);
$filaAUdos=$resultado->fetch_assoc(); 
}
?>

<?php
require "conexion.php";

if (isset($_POST['autorizadaA3'])) { 
$fechauno                   = $mysqli ->real_escape_string($_POST["fechauno"]);
$fechados                   = $mysqli ->real_escape_string($_POST["fechados"]);
$queryAUtres = "SELECT count(*) AS Count_autorizadaA3 FROM rq_requisicione WHERE Fecha_solicitud BETWEEN '$fechauno' and '$fechados' and Status LIKE 'Autorizada A3%'";
$resultado=$mysqli -> query($queryAUtres);
$filaAUtres=$resultado->fetch_assoc();
}
?> 

<?php
require "conexion.php";

if (isset($_POST['AsignadaOC'])) { 
$fechauno                   = $mysqli ->real_escape_string($_POST["fechauno"]);
$fechados                   = $mysqli ->real_escape_string($_POST["fechados"]);
$queryOC = "SELECT count(*) AS Count_AsignadaOC FROM rq_requisicione WHERE Fecha_solicitud BETWEEN '$fechauno' and '$fechados' and Status like 'AsignadaOC%'";
$resultado=$mysqli -> query($queryOC);
$filaOC=$resultado->fetch_assoc(); 
}
?> 

<?php
require "conexion.php";

if (isset($_POST['canceladas'])) { 
$fechauno                   = $mysqli ->real_escape_string($_POST["fechauno"]);
$fechados                   = $mysqli ->real_escape_string($_POST["fechados"]);
$queryCA = "SELECT count(*) AS Count_canceladas FROM rq_requisicione WHERE Fecha_solicitud BETWEEN '$fechauno' and '$fechados' and Status LIKE 'Can%'";
$resultado=$mysqli -> query($queryCA);
$filaCA=$resultado->fetch_assoc(); 
}
?> 

<?php
require "conexion.php";

if (isset($_POST['Rechazada'])) {
$fechauno                   = $mysqli ->real_escape_string($_POST["fechauno"]);
$fechados                   = $mysqli ->real_escape_string($_POST["fechados"]);
$queryRE = "SELECT count(*) AS Count_Rechazada FROM rq_requisicione WHERE Fecha_solicitud BETWEEN '$fechauno' and '$fechados' and Status LIKE 'Rechazada'";
$resultado=$mysqli -> query($queryRE);
$filaRE=$resultado->fetch_assoc(); 
}
?> 



                <main>




                   <?php include('menuB.php')?>
<table class="table">
  <thead>
    <tr>
      <th scope="col"><div style="width: 180px; margin:10px auto;display:block;">
                                   <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state bg-secondary" style="width: 180px; height: 290px; border-radius: 10px; color: white">
                        <p class="text-center" style="padding-top: 23px;">Enviadas:  </p>
<form method="post" action="#" border="1">




                             <h2 class="text-center"><?php echo $Count_enviadas=$filaEN['Count_enviadas'];?></h2>   



                                <input type="text"    name="fechauno" id="fechauno" style="width: 120px; margin: auto;" placeholder="000-00-00" class="form-control">
                                <br>
                                <input type="text"    name="fechados" id="fechados" style="width: 120px; margin: auto;" placeholder="000-00-00" class="form-control">
                                <br>
                                <button type="submit" name="fechaen"  id="fechaen" class="btn " style=" background-color: #A9A9A9; color: white; width: 178px; margin: auto; " >Enviar</button>
</form>
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>

</div></th>
      <th scope="col"><div style="width: 180px; margin:10px auto;display:block;">
                                   <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state bg-info" style="width: 180px; height: 290px; border-radius: 10px; color: white;">
                                                <p class="text-center" style="padding-top: 23px;">Autorizadas A1: </p>
                                                <h2 class="text-center"><?php echo $Count_autorizadaA1=$filaAU['Count_autorizadaA1'];?></h2>
<form method="post" action="#" border="1">
                                <input type="text"    name="fechauno" id="fechauno" style="width: 120px; margin: auto;" placeholder="000-00-00" class="form-control">
                                <br>
                                <input type="text"    name="fechados" id="fechados" style="width: 120px; margin: auto;" placeholder="000-00-00" class="form-control">
                                <br>
                                <button type="submit" name="autorizadaA1"  id="autorizadaA1" class="btn " style=" background-color: #48D1CC; color: white; width: 178px; margin: auto;" >Enviar</button>         
</form>                                               
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>

</div></th>
      <th scope="col">  <div style="width: 180px; margin:10px auto;display:block;"><div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state bg-info" style="width: 180px; height: 290px; border-radius: 10px; color: white;">
                                                <p class="text-center" style="padding-top: 23px;">Autorizadas A2: </p>
                                                <h2 class="text-center"><?php echo $Count_autorizadaA2=$filaAUdos['Count_autorizadaA2'];?></h2>
<form method="post" action="#" border="1">
                                <input type="text"    name="fechauno" id="fechauno" style="width: 120px; margin: auto;" placeholder="000-00-00" class="form-control">
                                <br>
                                <input type="text"    name="fechados" id="fechados" style="width: 120px; margin: auto;" placeholder="000-00-00" class="form-control">
                                <br>
                                <button type="submit" name="autorizadaA2"  id="autorizadaA2" class="btn " style="background-color: #48D1CC; color: white; width: 178px; margin: auto;" >Enviar</button>         
</form>                                             
                                               
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>
</div>
                            </th>
      <th scope="col"><div style="width: 180px; margin:10px auto;display:block;"><div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state bg-info" style="width: 180px; height: 290px; border-radius: 10px; color: white;">
                                                <p class="text-center" style="padding-top: 23px;">Autorizadas A3: </p>
                                                <h2 class="text-center"><?php echo $Count_autorizadaA3=$filaAUtres['Count_autorizadaA3'];?></h2>
<form method="post" action="#" border="1">
                                <input type="text"    name="fechauno" id="fechauno" style="width: 120px; margin: auto;" placeholder="000-00-00" class="form-control">
                                <br>
                                <input type="text"    name="fechados" id="fechados" style="width: 120px; margin: auto;" placeholder="000-00-00" class="form-control">
                                <br>
                                <button type="submit" name="autorizadaA3"  id="autorizadaA3" class="btn " style=" background-color: #48D1CC; color: white; width: 178px; margin: auto;" >Enviar</button>         
</form>                                            
                                               
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>
</div></th>

 <th scope="col"><div style="width: 180px; margin:10px auto;display:block;"><div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state bg-success" style="width: 180px; height: 290px; border-radius: 10px; color: white;">
                                                <p class="text-center" style="padding-top: 23px;">AsignadaOC: </p>
                                                <h2 class="text-center"><?php echo $Count_AsignadaOC=$filaOC['Count_AsignadaOC'];?></h2>
<form method="post" action="#" border="1">
                                <input type="text"    name="fechauno" id="fechauno" style="width: 120px; margin: auto;" placeholder="000-00-00" class="form-control">
                                <br>
                                <input type="text"    name="fechados" id="fechados" style="width: 120px; margin: auto;" placeholder="000-00-00" class="form-control">
                                <br>
                                <button type="submit" name="AsignadaOC"  id="AsignadaOC" class="btn " style="background-color: #3CB371; color: white; width: 178px; margin: auto;" >Enviar</button>         
</form>                                                
                                               
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>
</div></th>

<th scope="col"><div style="width: 180px; margin:10px auto;display:block;"><div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state bg-danger" style="width: 180px; height: 290px; border-radius: 10px; color: white;">
                                                <p class="text-center" style="padding-top: 23px;">Canceladas: </p>
                                                <h2 class="text-center"><?php echo $Count_canceladas=$filaCA['Count_canceladas'];?></h2>
<form method="post" action="#" border="1">
                                <input type="text"    name="fechauno" id="fechauno" style="width: 120px; margin: auto;" placeholder="000-00-00" class="form-control">
                                <br>
                                <input type="text"    name="fechados" id="fechados" style="width: 120px; margin: auto;" placeholder="000-00-00" class="form-control">
                                <br>
                                <button type="submit" name="canceladas"  id="canceladas" class="btn" style="background-color: #A52A2A; color: white; width: 178px; margin: auto;" >Enviar</button>         
</form>    
                                               
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>
</div></th>

<th scope="col"><div style="width: 180px; margin:10px auto;display:block;"><div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state bg-danger" style="width: 180px; height: 290px; border-radius: 10px; color: white;">
                                                <p class="text-center" style="padding-top: 23px;">Rechazadas: </p>
                                                <h2 class="text-center"><?php echo $Count_Rechazada=$filaRE['Count_Rechazada'];?></h2>
                                         
<form method="post" action="#" border="1">
                                <input type="text"    name="fechauno" id="fechauno" style="width: 120px; margin: auto;" placeholder="000-00-00" class="form-control">
                                <br>
                                <input type="text"    name="fechados" id="fechados" style="width: 120px; margin: auto;" placeholder="000-00-00" class="form-control">
                                <br>
                                <button type="submit" name="Rechazada"  id="Rechazada" class="btn " style="background-color: #A52A2A; color: white; width: 178px; margin: auto;" >Enviar</button>         
</form>                                               
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>
</div></th>

    </tr>
  </thead>
</table>

 <img src="images/h.png" alt="Mi titulo de la imagen" style="width: 500px; height: 200px;  margin:10px auto;
        display:block;">
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

