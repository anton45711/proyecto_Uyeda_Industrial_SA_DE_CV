<?php 

    session_start();

    if(!isset ($_SESSION['idusuario'])){
        header("location: index.php");

    }

    $Puesto = $_SESSION['Puesto'];
     $usuario = $_SESSION['usuario'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
    $Correo = $_SESSION['Correo'];
    $JefeAutoriza = $_SESSION['JefeAutoriza'];
    $MaquilaP = $_SESSION['Maquila'];
     

 ?>


<?php
$date = new DateTime();
?>

<?php 
$num = rand(1000,9999);
$anio = date("y");
$folio =  "RQ".$anio."-".$num;
?>


<?php include('FuncionesMR.php')?> <!-- AQUI FUNCIONES DE Mrequisicion.php y Nrequisicion.php-->


<!DOCTYPE html>
<html lang="es">
   <?php include('head.php')?> <!--HEAD AQUI -->
    <body class="sb-nav-fixed">

        <?php include('menu.php')?> <!--MENU AQUI-->






<script >
 
function enviar(){
 var fol=document.getElementById('fol').value;
 
  var prov=document.getElementById('prov').value;
  


  var a= 'prov=' +prov ;

  $.ajax({

    type:'post',
    url:'FuncionesMR.php',
    data:a,
    success:function(resp){
      $("#respa").html(resp);
    }
  });

return false;
}

</script>









            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                       <img src="images/i.png" alt="Mi titulo de la imagen" style="width: 500px; height: 70px; margin:10px auto;
        display:block;">
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Registro de requisición de compra
                            </div>   
                       <form method="post" action="#" border="1" >
<div class="form-inline">
<label for="" class="mx-2" >Folio:</label>
<input type="text" name="fol" id="fol" value="<?php echo $folio; ?>"  class="form-control" readonly>
      
</div>


<div class="flex-container">
 <div class="flex-item-left mx-2">

       <!--<div class="form-group">
       <label for="">Proveedor:</label>
       <select name="prov" id="prov">                                                       
        <option></option>
        <option>Fedex</option>
        <option>Mercado Libre</option>
        <option></option>
        <option></option>

       </select>
        </div>-->


      <?php 
              include 'conexion.php';

              $consulta="SELECT Id_RegistroP,Proveedor FROM proveedores";
              $ejecutar=mysqli_query($mysqli,$consulta) or die(mysqli_error($mysqli));

      ?>

  <div id="proveedor">


<label>Proveedor:</label>

    <label><select name="prov" id="prov"   class="form-control prov" >
      
      <?php foreach ($ejecutar as $opciones): ?>

         <option value="<?php echo $opciones['Proveedor'] ?>"><?php echo $opciones['Proveedor']?></option>

    <?php endforeach ?>




     
      
    </select></label>


</div>



      

        <div class="form-group">
       <label for="">Descripción General:</label>
       <input type="text" name="desG" id="desG" class="form-control">                        <!--ID: desG-->
      </div>

      <div class="form-group">
       <label for="">Requisitor:</label>
       <input type="text" name="requi" id="requi" value="<?php echo $usuario; ?>" class="form-control" readonly>                                     <!--ID:jus -->
       
      </div>

       <div class="form-group">
       
       <input type="text" name="correo" id="correo" value="<?php echo $Correo; ?>"  style="border-color: white; background-color: white; color: white;"class="form-control" readonly>

        </div>

      
       
       <div class="form-group">
       
       <input type="text" name="JefeAutoriza" id="JefeAutoriza" value="<?php echo $JefeAutoriza; ?>" style="border-color: white; background-color: white; color: white;" class="form-control" readonly>

                                            <!--ID:jus -->
        </div>
        </div>
 


         



  
      <div class="flex-item-right mx-2">

      <div class="form-group">
       <label for="">Maquila:</label>
       <select name="maq" id="maq"  >                                                              <!--ID:maq --> 
         
<?php


      if($MaquilaP=='SI'){
        ECHO "<option value='No'>No</option>";
        ECHO "<option value='Si'>Si</option>";
      }else{
        ECHO "<option value='No'>No</option>";
      }

?>
        
        </select>
      </div>

        
      
        

        <div class="form-group">
       <label for="">Moneda:</label>  
       <select name="mon" id="mon" >                                                                   <!--ID:mon --> 
        <option></option>
        <option value="Pesos">Pesos</option>
        <option value="Dolares">Dolares</option>
        <option value="Euro">Euro</option>
       </select>
        </div>

       

          <!--<button type="button" class="btn btn-primary">Agregar</button>-->

  </div>
<div class="flex-item-right mx-2">

     <div class="form-group">
     <label for="">Fecha captura:</label>
      <p id=" fecC" name="fecC" ><?php echo $date->format('d-m-y'); ?></p><!--ID:fecC --> 
       </div>

    <div class="form-group">
    <label for="">Requerido:</label>
       <input class="mx-3" type="date" name="req" id="req" class="form-control">                  <!--ID:req --> 
        </div>

  
      



  </div>




 <div class="flex-item-right ">

       <label for="" class="mx-2" >Estatus:</label>
       <input type="text" id="Sta" name="Sta" value="Abierta" readonly class="form-control">
       

       <div class="form-group" style="margin-top: 30px; width: 100px;" >

      
       <button type="submit" name="save" id="save" class="btn btn-primary" style=" width:120px; margin-top:6px; " onclick="return guardar();"> <i class="fas fa-save mx-2" style="font-size: 20px" ></i>Guardar</button>

  </div>
        <div class="form-group" style="margin-top: 20px; width: 80px;" >
       
      
</div>

       
      
       
    

     


</div>
</div>

                       </form>


<p id="respa"> </p>
                       
                        

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


       
<script type="text/javascript">
  $(document).ready(function(){
    $('#prov').select2();
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#mon').select2();
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#maq').select2();
  });
</script>


