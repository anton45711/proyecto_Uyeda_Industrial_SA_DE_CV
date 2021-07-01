<?php 

    session_start();

    if(!isset ($_SESSION['idusuario'])){
        header("location: index.php");

    }

    $Puesto = $_SESSION['Puesto'];
     $usuario = $_SESSION['usuario'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
    

 ?>






<?php include('FuncionesMR.php')?>




<!DOCTYPE html>
<html lang="es">
   <?php include('head.php')?> <!--HEAD AQUI -->
    <body class="sb-nav-fixed">

       


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Registro de requisición de compra
                            </div>   
                       <form method="post" action="#" border="1" >
<div class="form-inline">
<label for="" class="mx-2" >Folio:</label>
<input type="text" name="fol" id="fol" value="<?php echo     $Requisicion; ?>"  class="form-control" readonly>
      
</div>
                      <div class="d-flex bd-highlight">
<div class="p-2 w-100 bd-highlight">
  <div class="d-flex bd-highlight">
  <div class="p-2 flex-fill bd-highlight">


     

        <div class="form-inline d-flex ">
       <label for="" class="mx-2">Cantidad:</label>
       <input type="text" name="cant" id="cant" class="form-control " class=".decimal-2-places"  style="width:100px;" value="<?php echo     $Cantidad; ?>" onChange="multiplicar();">      <!--ID: cant-->    
       <label for="" class="mx-2">UM:</label>                                                    
        <select name="um" id="um" selected="<?php  echo $Unidad ?>" value="<?php  echo $Unidad ?> ">           <!--ID:um --> 
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
       <input type="text" name="pre" id="pre" class="form-control " style="width:100px;" value="<?php echo $Precio ?>" onChange="multiplicar();">             <!--ID:pre --> 
         
      </div>

         <div class="form-group">
       <label for="">Justificación:</label>
       <input type="text" name="jus" id="jus" class="form-control" value="<?php echo $Justificacion  ?>">        <!--ID:jus -->

      </div>

       <div class="form-group">
       <label for="">Requisitor:</label>
       <input type="text" name="requi" id="requi" value="<?php echo $usuario; ?>" class="form-control" readonly>                                     <!--ID:jus -->
       
      </div>
        
        
  </div>


         



  
  <div class="p-4 flex-fill bd-highlight">

    

       

       

      <?php 
              include 'conexion.php';

              $consulta="SELECT * FROM c_contable";
              $ejecutar=mysqli_query($mysqli,$consulta) or die(mysqli_error($mysqli));

      ?>

<div id="cuentaC">



    <label>Cuenta:</label>
    <select name="cuenC" id="cuenC" class="cuenC"  class="form-control" selected="<?php echo $CuentaCont   ?>">
      

      <optgroup selected label="Elija una opción:">

      <?php foreach ($ejecutar as $opciones): ?>

         <option value="<?php echo $opciones['Cuenta']?>"><?php echo $opciones['Cuenta']?></option>

    <?php endforeach ?>


</optgroup>

     
      
    </select>


</div>



          

  </div>
  <div class="p-2 flex-fill bd-highlight" >

    
    
        

         <div class="form-group" style="margin-top: 75px;">
       <label for="">Detalle producto y/o Servicio:</label>
       <input type="text" name="DetPS" id="DetPS" class="form-control" style=" height: 78px"  value="<?php echo $Descripciond  ?>">        <!--ID:DetPS --> 
      </div>

      <div class="d-flex justify-content-center ">
       <label for="">Importe:</label>
      <input type="text" name="imp" id="imp" class="form-control" style=" width:120px;" readonly>
      </div>

<div class="d-flex justify-content-center ">
       <label for="" >Importe total:</label>
     <div id="caja"> <input type="text" name="impT" id="impT" class="form-control " style=" width:120px;" value="<?php echo $ImporteTotal;?>" readonly></div>
      </div>


  </div>
</div>


</div>
<div class="p-2 flex-shrink-1 bd-highlight">
  
       <label for="" class="mx-2" >Estatus:</label>
       <input type="text" id="Sta" name="Sta" value="Abierta" readonly class="form-control">
       

       <div class="form-group" style="margin-top: 35px;">
       <button type="submit" name="updateP" id="updateP" class="btn btn-primary" style=" width:120px; margin-top:6px;  " onclick="return agregar();">Modificar</button>
       
     </div>

     <div class="form-group" style="margin-top: 35px;">

      
       <div class="form-group" style="margin-top: 35px;">
        <a href="Aproducto.php?Id_Requisicion=<?php echo $row['Id_Requisicion']?>" class="btn btn-success animated bounce infinite"  style=" width:120px; margin-top:6px; " > <i class=" fas fa-binoculars"></i></a>
    </div>
     </div>



</div>
</div>
</div>
                       </form>


       


                       
                        

                    </div>
                </main>


                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Uyeda Industrial de México 2020</div>
                            <div>
                                
                            </div>
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


<script type="text/javascript">
 $('#um').select2({placeholder: "Scegli"}).val("<?php echo $Unidad; ?>").trigger("change");;
</script>

<script type="text/javascript">
 $('#cuenC').select2({placeholder: "Scegli"}).val("<?php echo   $CuentaCont; ?>").trigger("change");;
</script>