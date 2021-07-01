<?php 

$Proveedor = $_POST['Proveedor'];
$conexion = new mysqli('localhost','root','','uyedain');
$consulta = "SELECT Proveedor,Categoria,Email  FROM proveedores WHERE Proveedor = '$Proveedor'";
$result = mysqli_query($conexion, $consulta);
  
$respuesta = new stdClass();
if(mysqli_num_rows($result) == 1){
    $fila = $result->fetch_array();
    $respuesta->Categoria = $fila['Categoria'];
    $respuesta->Email = $fila['Email'];
}
echo json_encode($respuesta);

 ?>