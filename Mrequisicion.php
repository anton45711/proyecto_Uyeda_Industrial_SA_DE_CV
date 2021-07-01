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
require "conexion.php";

 
if ($_GET['Id_Requisicion']) {
 $Id_Requisicion = $_GET['Id_Requisicion'];
 

 $queryI = "SELECT sum(RD.Precio * RD.Cantidad) as ImporteTotal FROM rq_requisiciond RD WHERE Id_Requisicion= $Id_Requisicion;";
$resultado=$mysqli -> query($queryI);
$fila=$resultado->fetch_assoc(); //que te devuelve un array asociativo con el nombre del campo

 //Este es el valor que acabas de calcular en la consulta

}

?>





<!DOCTYPE html>
<html lang="es">
   <?php include('head.php')?> <!--HEAD AQUI -->
    <body class="sb-nav-fixed">

        <?php include('menu.php')?> <!--MENU AQUI-->


            <div id="layoutSidenav_content">
                <main>

                  <img src="images/m.png" alt="Mi titulo de la imagen" style="width: 500px; height: 70px; margin:10px auto;
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
                                Registro de requisición de compra
                            </div>   
                       <form method="post" action="#" border="1" >


<div id="login">
                      <div class="flex-container">

  
  <div class="flex-item-left mx-5">

<div class="form-inline">
<label for="" class="mx-2" >Folio:</label>
<input type="text" name="fol" id="fol" value="<?php echo    $Requisicion; ?>"  class="form-control" readonly>
      
</div>


      <?php 
              include 'conexion.php';

              $consulta="SELECT Id_RegistroP,Proveedor FROM proveedores";
              $ejecutar=mysqli_query($mysqli,$consulta) or die(mysqli_error($mysqli));

      ?>
     
      <label class="mx-2">Proveedor:</label>


 <label><select name="prov" id="prov"   class="form-control" style="width: 400px;">
      

      <optgroup  label="Elija una opción:">

      <?php foreach ($ejecutar as $opciones): ?>

         <option value="<?php echo $opciones['Proveedor']?>"><?php echo $opciones['Proveedor']?></option>

    <?php endforeach ?>


</optgroup>

     
      
    </select></label>





       <div class="form-inline">
      <!-- <label for="" class="mx-2">Categoría:</label>
       <input type="text" name="cat1" id="cat1" class="form-control" value="<?php /*echo     $Categoria*/; ?>"  readonly>
        
         <input type="text" name="cat3" id="cat3" class="form-control"  value="<?php /*echo   $Email*/; ?>" readonly>-->
        </div>
        <div class="form-group">
       <label for="">Descripción General:</label>
       <input type="text" name="desG" id="desG" class="form-control" value="<?php echo    $Descripcion; ?>">                        <!--ID: desG-->
      </div>



     <!--<div class="form-group">
       <label for="" class="mx-2">Producto:</label>
       <select name="prod" id="prod"  style="width: 100%;" class="form-control">                
        <option></option>
        <option value = "mouse" >mouse</option>
        <option value = "usb" >usb</option>
        <option value = "monitor" >monitor</option>
        </select>
        </div>-->
       
        <div class="form-inline d-flex " style="margin-top: 30px;">
       <label for="" class="mx-2">Cantidad:</label>
       <input type="text" name="cant" id="cant"  class="form-control" class="decimal-3-places"  style="width:100px;"  maxlength="7" onChange="multiplicar();">      <!--ID: cant-->    
       <label for="" class="mx-2">UM:</label>                                                    
        <select name="um" id="um" style="width: 100px;">           <!--ID:um --> 
          <option></option>
        <option value="Caja" >Caja</option>
        <option value="Cm2" >Cm2</option>
        <option value="Kgs" >Kgs</option>
        <option value="Libras" >Libras</option>
        <option value="Licencia" >Licencia</option>
        <option value="Millar" >Millar</option>
        <option value="Mt" >Mt</option>
        <option value="Mt2" >Mt2</option>
        <option value="Pieza" >Pieza</option>
        <option value="Paquete" >Paquete</option>
        <option value="Royo" >Royo</option>
        <option value="servicio" >servicio</option>
        </select>
            <label for="" class="mx-2">Precio:</label>
       <input type="text" name="pre" id="pre" class="form-control " style="width:100px;" onChange="multiplicar();">             <!--ID:pre --> 
         
      </div>

         <div class="form-group">
       <label for="">Justificación:</label>
       <input type="text" name="jus" id="jus" class="form-control">        <!--ID:jus -->

      </div>

       <div class="form-group">
       <label for="">Requisitor:</label>
       <input type="text" name="requi" id="requi" value="<?php echo $usuario; ?>" class="form-control" readonly>                                     <!--ID:jus -->
       
      </div>
        
        
  </div>


         



  
  <div class="flex-item-right mx-5">

      <div class="form-group">
       <label for="">Maquila:</label>
       <select name="maq" id="maq" value="<?php echo $Maquila; ?>" >                                                              <!--ID:maq --> 
        
        <option value="No" selected>No</option>
        <option value="Si" selected>Si</option>
        </select>
      </div>

        <div class="form-group">
       
        </div>

        <div class="form-group">
       <label for="">Moneda:</label>  
       <select name="mon" id="mon" value="<?php echo $Moneda; ?>" >                                                                   <!--ID:mon --> 
        <option></option>
        <option value="Pesos">Pesos</option>
        <option value="Dolares">Dolares</option>
        <option value="Euro">Euro</option>
       </select>
        </div>

       <!-- <div class="form-group">
            <label for="" class="mx-2">Cuenta contable:</label>
       <select name="cuenC" id="cuenC" class="form-control">                                        ID:cuenC 
        <option></option>
        <option  value="av" >av</option>
        <option  value="aq" >aq</option>
        <option  value="as" >as</option>
       </select>
         </div>-->

 <div style="margin-top: 60px;"></div>
<div id="cuenta">

<label for="">Cuenta:</label>

    <label><select name="cuenC" id="cuenC"   class="form-control" style="width: 120px;" >
      
      <?php 
              include 'conexion.php';

              $consulta="SELECT * FROM c_contable";
              $ejecutar=mysqli_query($mysqli,$consulta) or die(mysqli_error($mysqli));

      ?>

      <optgroup selected label="Elija una opción:">

      <?php foreach ($ejecutar as $opciones): ?>

         <option value="<?php echo $opciones['Cuenta']?>"><?php echo $opciones['Cuenta']?></option>

    <?php endforeach ?>


</optgroup>

     
      
    </select></label>


</div>

<div class="form-group" style="margin-top: 15px;">
<?php
if ($Status=='Abierta' OR $Status=='Rechazada') {
    echo "<button type='submit' class='btn btn-primary' id='add' name='add' onclick='return agregar();'><i class='fas fa-plus-circle mx-2' style='font-size: 20px' ></i>Agregar</button>";
        }
?>
</div>


  </div>
  <div class="flex-item-right mx-5" >

     <div class="form-group">
     <label for="">Fecha captura:</label>
      <p id=" fecC" name="fecC"><?php echo $Fecha_solicitud; ?></p><!--ID:fecC --> 
       </div>

    <div class="form-group">
    <label for="">Requerido:</label>
       <input class="mx-3" type="date" name="req" id="req" class="form-control" value="<?php echo $Fecha_requerida; ?>">                  <!--ID:req --> 
        </div>

        

         <div class="form-group" style="margin-top: 20px;">
       <label for="">Detalle producto y/o Servicio:</label>
<br>
       <textarea style="resize: none;" class="form-control" name="DetPS" id="DetPS" name="textarea" rows="2" cols="15"></textarea>
               <!--ID:DetPS --> 
      </div>

      <div class="d-flex justify-content-center ">
       <label for="" style="width: 100px;">Importe:</label>
      <input type="text" name="imp" id="imp" class="form-control mx-20" style=" width:120px;" onChange="suma();"  readonly>
      </div>

<div class="d-flex justify-content-center ">
       <label for="" >Importe total:</label>
     <div id="caja"> <input type="text" name="impT" id="impT" class="form-control " style=" width:120px;" value="<?php echo $ImporteTotal=$fila['ImporteTotal'];?>" readonly></div>
      </div>

  </div>




<div class="p-2 flex-shrink-1 bd-highlight" style="background: #EDEDEE; border-radius: 14px;">
  
       <label for="" class="mx-2" >Estatus:</label>
       <input type="text" id="Sta" name="Sta" value="<?php echo $Status; ?>" readonly class="form-control">
       
       <div class="form-group" style="margin-top: 15px;">
<!--<button type="submit" name="detalle" id="detalle" class="btn btn-info" style=" width:120px; margin-top:6px; " >Detalles</button>-->
       </div>

       <div class="form-group">
 <?php     

if ($Status=='Abierta') {
   echo "<button type='submit' name='update' id='update' class='btn btn-primary' style=' width:120px; margin-top:6px;' onclick='loadLog()'><i class='fas fa-pen ' style='font-size: 20px'></i> Modificar</button>";

echo "<div style='padding-top: 15px;'>";

        echo " <button type='submit' class='btn btn-success' id='submit' name='submit' style=' width:120px; margin-top:6px;' onclick='return enviar()'> <i class='fas fa-share mx-2' style='font-size: 20px'></i>Enviar</button>";
echo "</div>"; 


}else if($Status=='Rechazada'){
     echo "<button type='submit' name='update' id='update' class='btn btn-primary' style=' width:120px; margin-top:6px;' onclick='loadLog()'><i class='fas fa-edit mx-2' style='font-size: 20px'></i>Modificar</button>";

echo "<div style='padding-top: 15px;'>";

        echo " <button type='submit' class='btn btn-success' id='Reenviar' name='Reenviar' style=' width:120px; margin-top:6px;' onclick='return enviar()'> <i class='fas fa-share mx-2' style='font-size: 20px'></i>Reenviar</button>";
echo "</div>";

}else{
      echo "<i class='fas fa-times-circle' style='font-size: 200px; margin:10px auto;
        display:block; color:#fcdfd7;'></i><p style='color:red;'>NO es posible modificar requisición.</p>";


}
 ?>      
     </div>

    <!-- <div class="form-group" style="margin-top: 15px;">
      <button type="button" class="btn btn-secondary" style=" width:120px; margin-top:6px; ">Plantilla</button>

       <button type="button" class="btn btn-secondary" style="  margin-top:6px; ">Seguimiento</button>
       
     </div>-->





</div>
</div>
</div>

            
                       </form>
                           </div>
                           </div>

<div class="contatainer">
  
<div class="responsive-iframe"  > 

<?php
if ($Status=='Abierta' OR $Status=='Rechazada') {

echo "<iframe src='Aproducto.php?Id_Requisicion=".$row['Id_Requisicion']."&Importe=".$row['Importe']."class='animated bounce' width='1400' height='600' frameborder='0' ></iframe>";

}else{

echo "<iframe src='Vproducto.php?Id_Requisicion=".$row['Id_Requisicion']."&Importe=".$row['Importe']."class='animated bounce' width='1400' height='600' frameborder='0' ></iframe>";

}
?>

</div>

</div>


       


                       
                        

                    
            </div>

                </main>

 </div>
               
        
    
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
   
      
       
    </body>
</html>

<script>

  $(document).ready(function(){
    validarCualquierNumero()
  });

  function validarCualquierNumero(){
    $(".numeric").numeric();
    $(".integer").numeric(false, function() { alert("Integers only"); this.value = ""; this.focus(); });
    $(".positive").numeric({ negative: false }, function() { alert("No negative values"); this.value = ""; this.focus(); });
    $(".positive-integer").numeric({ decimal: false, negative: false }, function() { alert("Positive integers only"); this.value = ""; this.focus(); });
    $(".decimal-2-places").numeric({ decimalPlaces: 2 });
    $(".decimal-3-places").numeric({ decimalPlaces: 3 });
    $("#remove").click(
      function(e)
      {
        e.preventDefault();
        $(".numeric,.integer,.positive,.positive-integer,.decimal-2-places").removeNumeric();
      }
      );
  }
</script>

<script type="text/javascript">
 $('#prov').select2({placeholder: "Scegli"}).val("<?php echo $Proveedor; ?>").trigger("change");;
</script>

<script type="text/javascript">
 $('#maq').select2({placeholder: "Scegli"}).val("<?php echo $Maquila; ?>").trigger("change");;
</script>

<script type="text/javascript">
 $('#mon').select2({placeholder: "Scegli"}).val("<?php echo $Moneda; ?>").trigger("change");;
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#um').select2();
  });
</script>


<script type="text/javascript">
  $(document).ready(function(){
    $('#cuenC').select2();
  });
</script>



<script type="text/javascript">
    $(document).ready(function() {
        var refrescarid = setInterval(function() {
            $("impT").load("Mrequisicion.php")
           
        }, 1000); // Tiempo
        $.ajaxSetup({ cache: false });              
    });
</script>



