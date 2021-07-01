<?php 
include('conexion.php');
    session_start();

    if(!isset ($_SESSION['idusuario'])){
        header("location: index.php");

    }

    $nombre = $_SESSION['nombre'];
     $usuario = $_SESSION['usuario'];
    $tipo_usuario = $_SESSION['tipo_usuario'];

   
 
 ?>



<?php


if (isset($_POST['save'])) {

$fol=$_POST["fol"];
$prov=$_POST["prov"];
$maq=$_POST["maq"];
$desG=$_POST["desG"];
$req=$_POST["req"];
$mon=$_POST["mon"];
$requi=$_POST["requi"];
$Sta=$_POST["Sta"];
/*$idRe="SELECT Id_Requisicion FROM rq_requisicione WHERE Id_Requisicion = ?"; */



$prod=$_POST["prod"];
$DetPS=$_POST["DetPS"];
$cant=$_POST["cant"];
$um=$_POST["um"];
$pre=$_POST["pre"];
$cuenC=$_POST["cuenC"];
$jus=$_POST["jus"];
$impT=$_POST["impT"];
$impT=$_POST["impT"];


 $queryU = mysqli_query($mysqli,"INSERT INTO rq_requisicione(Requisicion,Proveedor,Maquila,Descripcion,Fecha_requerida,Moneda,Requisitor,Status) VALUES ('$fol', '$prov','$maq','$desG','$req','$mon','$requi','$Sta')");




 echo "New record has id: " . mysqli_insert_id($mysqli); 

$hola= mysqli_insert_id($mysqli); 

if ($queryU == true){
$queryD = "INSERT INTO rq_requisiciond(Id_Requisicion,Producto,Descripciond,Cantidad,Unidad,Precio,CuentaCont,Justificacion,Importe)
             VALUES ('$hola','$prod', '$DetPS', '$cant', '$um', '$pre', '$cuenC', '$jus', '$impT')";

$resultD = mysqli_query($mysqli, $queryD);

echo "exito doble";

}else{
	echo "No se inserto nada";
}


  /*
  if(!$resultU) {
    die("Query Failed. aqui");
  }

  $
  if(!$resultD) {
    die("Query Failed. este");
  }*/

  


  

  }

mysqli_close($mysqli);

?>
