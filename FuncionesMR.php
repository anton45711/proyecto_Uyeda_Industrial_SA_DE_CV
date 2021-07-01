<?php
include("conexion.php");
    $Requisicion     = '';

    $Descripciond    = '';
    $Cantidad        = '';
    $Unidad          = '';
    $Precio          = '';
    $CuentaCont      = '';
    $Justificacion   = '';
    $Id_Registro     = '';
  



if  (isset($_GET['Id_Registro'])) {

  
  $Id_Registro = $_GET['Id_Registro'];

  $queryP = "SELECT RE.Id_Requisicion,RD.Id_Registro,RD.Id_Registro, RE.Requisicion, RD.Descripciond, RD.Cantidad, RD.Unidad, RD.Precio,RD.CuentaCont,RE.Importe,RD.Justificacion,sum(RD.Precio * RD.Cantidad) as ImporteTotal FROM rq_requisiciond RD INNER JOIN rq_requisicione RE ON RD.Id_Requisicion=RE.Id_Requisicion WHERE RD.Id_Registro=$Id_Registro";

  $resultP = mysqli_query($mysqli, $queryP);

  if (mysqli_num_rows($resultP) == 1) {
  $row = mysqli_fetch_array($resultP);

    $Requisicion     = $mysqli ->real_escape_string($row['Requisicion']);
    $Descripciond    = $mysqli ->real_escape_string($row['Descripciond']);
    $Cantidad        = $mysqli ->real_escape_string($row['Cantidad']);
    $Unidad          = $mysqli ->real_escape_string($row['Unidad']);
    $Precio          = $mysqli ->real_escape_string($row['Precio']);
    $CuentaCont      = $mysqli ->real_escape_string($row['CuentaCont']);
    $Justificacion   = $mysqli ->real_escape_string($row['Justificacion']);
    $Importe         = $mysqli ->real_escape_string($row['Importe']);
    $ImporteTotal    = $mysqli ->real_escape_string($row['ImporteTotal']);
    $Id_Registro    = $mysqli ->real_escape_string($row['Id_Registro']);
    
    
    

  
}else{
  echo 'no se recibio ID';
}
}

?>



<?php
include('conexion.php');                                                         /**/
if (isset($_POST['save'])) {

$fol=        $mysqli ->real_escape_string($_POST["fol"]);
$prov=       $mysqli ->real_escape_string($_POST["prov"]);
$maq=        $mysqli ->real_escape_string($_POST["maq"]);  
$desG=       $mysqli ->real_escape_string($_POST["desG"]);
$req=        $mysqli ->real_escape_string($_POST["req"]);
$mon=        $mysqli ->real_escape_string($_POST["mon"]);
$requi=      $mysqli ->real_escape_string($_POST["requi"]);
$Sta=        $mysqli ->real_escape_string($_POST["Sta"]);
$JefeAutoriza=        $mysqli ->real_escape_string($_POST["JefeAutoriza"]);
$correo=        $mysqli ->real_escape_string($_POST["correo"]);


 $query = $mysqli->prepare("INSERT INTO rq_requisicione(
 Requisicion,
 Proveedor,
 Maquila,
 Descripcion,
 Fecha_requerida,
 Moneda,
 Requisitor,
 Status,
 Importe,
 JefeAutiriza,
 CorreoRequisicion) VALUES ('$fol', '$prov','$maq','$desG','$req','$mon','$requi','$Sta','','$JefeAutoriza','$correo')");
$query->execute();
header('Location: principal.php');

    if(!$query) {
    die("Query Failed.");
  }

}
?>



<?php
/*2.-*/
include("conexion.php");
    $Requisicion     = '';
    $Proveedor       = '';
    $Maquila         = '';
    $Descripcion     = '';
    $Fecha_requerida = '';
    $Moneda          = '';
    $Requisitor      = '';
    $Status          = '';
    $Fecha_solicitud = '';
    $Importe         = '';
    $CorreoRequisicion = '';


if  (isset($_GET['Id_Requisicion'])) {


  $Id_Requisicion = $mysqli ->real_escape_string($_GET['Id_Requisicion']);

  $query = "SELECT RE.Id_Requisicion,RE.NumCompras, RE.Requisicion, RE.Proveedor,RE.Maquila, RE.Descripcion, RE.Fecha_solicitud ,RE.Fecha_requerida,RE.Moneda,RE.CorreoRequisicion,RE.Requisitor, RE.Status,RE.Importe from rq_requisicione RE WHERE RE.Id_Requisicion=$Id_Requisicion";

  $result = mysqli_query($mysqli, $query);

  if (mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_array($result);

    $Requisicion     =   $mysqli ->real_escape_string($row['Requisicion']);
    $Proveedor       =   $mysqli ->real_escape_string($row['Proveedor']);
    $Maquila         =   $mysqli ->real_escape_string($row['Maquila']);
    $Descripcion     =   $mysqli ->real_escape_string($row['Descripcion']);
    $Fecha_requerida =   $mysqli ->real_escape_string($row['Fecha_requerida']);
    $Moneda          =   $mysqli ->real_escape_string($row['Moneda']);
    $Requisitor      =   $mysqli ->real_escape_string($row['Requisitor']);
    $Status          =   $mysqli ->real_escape_string($row['Status']);
    $Fecha_solicitud =   $mysqli ->real_escape_string($row['Fecha_solicitud']);
    $NumCompras      =   $mysqli ->real_escape_string($row['NumCompras']);
    $Importe         =   $mysqli ->real_escape_string($row['Importe']);
    $CorreoRequisicion = $mysqli ->real_escape_string($row['CorreoRequisicion']);

   

}
else{
  echo 'no se recibio ID';
}
}

?>


<?php
/*3.-*/
if (isset($_POST['update'])) {
  $Id_Requisicion = $mysqli ->real_escape_string($_GET['Id_Requisicion']);
  
  $prov=    $mysqli ->real_escape_string($_POST["prov"]);
  $maq=     $mysqli ->real_escape_string($_POST["maq"]);
  $desG=    $mysqli ->real_escape_string($_POST["desG"]);
  $req=     $mysqli ->real_escape_string($_POST["req"]);
  $mon=     $mysqli ->real_escape_string($_POST["mon"]);
  $requi=   $mysqli ->real_escape_string($_POST["requi"]);
  $Sta=     $mysqli ->real_escape_string($_POST["Sta"]);

  $query = $mysqli->prepare( "UPDATE rq_requisicione set 
  
  
  Proveedor             ='$prov',
  Maquila               ='$maq',
  Descripcion           ='$desG',
  Fecha_requerida       ='$req',
  Moneda                ='$mon',
  Requisitor            ='$requi'

    WHERE Id_Requisicion=?");
  $query->bind_param("i",$Id_Requisicion);
  $query->execute();


}
?>


<?php
if (isset($_POST['add'])) {
 $Id_Requisicion = $mysqli ->real_escape_string($_GET['Id_Requisicion']);
 $DetPS=      $mysqli ->real_escape_string($_POST["DetPS"]);
 $cant=       $mysqli ->real_escape_string($_POST["cant"]);
 $um=         $mysqli ->real_escape_string($_POST["um"]);
 $pre=        $mysqli ->real_escape_string($_POST["pre"]);
 $cuenC=      $mysqli ->real_escape_string($_POST["cuenC"]);
 $jus=        $mysqli ->real_escape_string($_POST["jus"]);
 $impT=       $mysqli ->real_escape_string($_POST["impT"]);
 $imp=       $mysqli ->real_escape_string($_POST["imp"]);
 $query = mysqli_query($mysqli, "INSERT INTO rq_requisiciond(
  Id_Requisicion,
  Producto,
  Descripciond,
  Cantidad,
  Unidad,
  Precio,
  CuentaCont,
  Justificacion)
  VALUES ('$Id_Requisicion','', '$DetPS', '$cant', '$um', '$pre', '$cuenC', '$jus')");
if ($query == true){
$queryB = $mysqli->prepare( "UPDATE rq_requisicione set 
  Importe            = '$impT'+'$imp'
    WHERE Id_Requisicion=?");
  $queryB->bind_param("i",$Id_Requisicion);
  $queryB->execute();
}else{
  echo "No fue introducido";
}}
?>


<?php
if (isset($_POST['updateP'])) {
  $Id_Registro = $_GET['Id_Registro'];
  $Importe = $_GET['Importe'];
  
  $cuenC=    $mysqli ->real_escape_string($_POST["cuenC"]);
  $cant=     $mysqli ->real_escape_string($_POST["cant"]);
  $um=       $mysqli ->real_escape_string($_POST["um"]);
  $pre=      $mysqli ->real_escape_string($_POST["pre"]);
  $DetPS=    $mysqli ->real_escape_string($_POST["DetPS"]);
  $jus=      $mysqli ->real_escape_string($_POST["jus"]);
  $imp=      $mysqli ->real_escape_string($_POST["imp"]);
  $impT=       $mysqli ->real_escape_string($_POST["impT"]);

  $query = mysqli_query($mysqli, "UPDATE rq_requisiciond set 
  
  
  Descripciond          ='$DetPS',
  Cantidad              ='$cant',
  Unidad                ='$um',
  Precio                ='$pre',
  CuentaCont            ='$cuenC',
  Justificacion         ='$jus'

    WHERE Id_Registro =$Id_Registro");
  

if ($query == true){

$queryD = $mysqli->prepare( "UPDATE rq_requisicione set 
  
  
           Importe ='$impT'+ '$Imp'
  

    WHERE Id_Requisicion=?");
  $queryD->bind_param("i",$Id_Requisicion);
  $queryD->execute();

echo "exito doble";

}else{
  echo "No se inserto nada";
}

 
  header('Location: Amodificado.php');
}
?>






<?php
include('conexion.php');
if (isset($_POST['submit'])) {

  $Id_Requisicion = $_GET['Id_Requisicion'];
  $date = new DateTime();
  $fecha = $date->format('y-m-d');

  if ($Maquila=="No") {
 $query = $mysqli->prepare( "UPDATE rq_requisicione set 
  Status                ='Enviada',
  Fec_Envio             ='$fecha'
    WHERE Id_Requisicion=?");
  $query->bind_param("i",$Id_Requisicion);
  $query->execute();

} else if ($Maquila=="Si") {
    $query = $mysqli->prepare( "UPDATE rq_requisicione set 
  Status                ='Maquila',
  Fec_Envio             ='$fecha'
    WHERE Id_Requisicion=?");
  $query->bind_param("i",$Id_Requisicion);
  $query->execute();
  }


if ($query== true){
   if ($Maquila=="No") {
$queryD = $mysqli->prepare( "UPDATE rq_requisiciond set 
  Status                ='Enviada'
    WHERE Id_Requisicion=?");
  $queryD->bind_param("i",$Id_Requisicion);
  $queryD->execute();

}else if ($Maquila=="Si") {
    $queryT = $mysqli->prepare( "UPDATE rq_requisiciond set 
  Status                ='Maquila'
    WHERE Id_Requisicion=?");
  $queryT->bind_param("i",$Id_Requisicion);
  $queryT->execute();
  }



else{
  echo "No fue enviada la requisicion";
}
 header('Location: principal.php');
}}
?>




<?php
/*include('conexion.php');

if (isset($_POST['act'])) {
 $impT=       $mysqli ->real_escape_string($_POST["impT"]);

   $query = $mysqli->prepare( "UPDATE rq_requisicione set 
  
  
  Importe            ='$impT'

    WHERE Id_Requisicion=?");

    $query->bind_param("i",$Id_Requisicion);
  $query->execute();

  
}*/

?>

<?php
//librerias
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
?>

<?php

//****************************************  Autorización del jefe *******************************
if (isset($_POST['Autoriza_Jefe'])) {
$com                   = $mysqli ->real_escape_string($_POST["com"]);
$correo                = $mysqli ->real_escape_string($_POST["correo"]);
$contraseña            = $mysqli ->real_escape_string($_POST["contraseña"]);
$Id_Requisicion = $_GET['Id_Requisicion'];
$usuario = $_SESSION['usuario'];


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $correo;                                         // SMTP username
    $mail->Password   = $contraseña;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($CorreoRequisicion, 'Uyeda Jefe');
    $mail->addAddress($CorreoRequisicion);     // Add a recipient
    

    // Attachments
   

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject  = 'Autorizacion: ' .$Requisicion;
    $mail->Body    .= '<meta charset="utf-8" />
    Notificaci&oacute;n de autorizaci&oacute;n del jefe <br><br>'.$com.'<br><br><br>Colaborador : '.$Requisitor.'<br>Requisici&oacute;n : '.$Requisicion.'<br> Fecha: '.$Fecha_requerida.'<br> Importe: '.$Importe.'<br> Moneda: '.$Moneda;
    $mail->AltBody = 'UYEDA INDUSTRIAL DE MEXICO SA. DE CV.';

    $mail->send();
    echo 'El mensaje se envio correctamente';
} catch (Exception $e) {
    echo "hubo un herror al enviar el mensaje: {$mail->ErrorInfo}";
}


$query = mysqli_query($mysqli, "INSERT INTO autorizar(
  Id_Requisicion,
  Autoriza1,
  Com_Autoriza1)
  VALUES ('$Id_Requisicion',' $usuario','$com')");
if ($query == true){
$queryD = $mysqli->prepare( "UPDATE rq_requisicione set 
            Status  ='Autorizada A1'
    WHERE Id_Requisicion=?");
  $queryD->bind_param("i",$Id_Requisicion);
   $queryD->execute();
   
$queryT = $mysqli->prepare( "UPDATE rq_requisiciond set 
            Status  ='Autorizada A1'
    WHERE Id_Requisicion=?");
  $queryT->bind_param("i",$Id_Requisicion);
  $queryT->execute();


}}
?>




<?php
//****************************************  Autorización de finanzas ********************************

if (isset($_POST['Autoriza_Finanzas'])) {


$Id_Requisicion = $_GET['Id_Requisicion'];
$usuario = $_SESSION['usuario'];
$com                   = $mysqli ->real_escape_string($_POST["com"]);
$correo                = $mysqli ->real_escape_string($_POST["correo"]);
$contraseña            = $mysqli ->real_escape_string($_POST["contraseña"]);


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $correo;                                         // SMTP username
    $mail->Password   = $contraseña;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($CorreoRequisicion, 'Uyeda Finanzas');
    $mail->addAddress($CorreoRequisicion);     // Add a recipient
    

    // Attachments
   

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Autorizacion: ' .$Requisicion;
    $mail->Body    = '<meta charset="utf-8" />
    Notificaci&oacute;n de autorizaci&oacute;n del finanzas <br><br>'.$com.'<br><br><br>Colaborador : '.$Requisitor.'<br>Requisici&oacute;n : '.$Requisicion.'<br> Fecha: '.$Fecha_requerida.'<br> Importe: '.$Importe.'<br> Moneda: '.$Moneda;
    
$mail->AltBody = 'UYEDA INDUSTRIAL DE MEXICO SA. DE CV.';
    $mail->send();
    echo 'El mensaje se envio correctamente';
} catch (Exception $e) {
    echo "hubo un herror al enviar el mensaje: {$mail->ErrorInfo}";
}


$query = mysqli_query($mysqli, "INSERT INTO autoriza_dos(
  Id_Requisicion,
  Autoriza2,
  Com_Autoriza2)
  VALUES ('$Id_Requisicion',' $usuario','$com')");


if ($query == true){
$queryD = $mysqli->prepare( "UPDATE rq_requisicione set 
  
  
            Status  ='Autorizada A2'
  

    WHERE Id_Requisicion=?");
  $queryD->bind_param("i",$Id_Requisicion);
   $queryD->execute();


$queryT = $mysqli->prepare( "UPDATE rq_requisiciond set 
  
  
            Status  ='Autorizada A2'
  

    WHERE Id_Requisicion=?");
  $queryT->bind_param("i",$Id_Requisicion);
  $queryT->execute();

}
}
?>


<?php
//****************************************  Autorización del director ********************************
if (isset($_POST['Autoriza_Director'])) {
$com            = $mysqli ->real_escape_string($_POST["com"]);
$Id_Requisicion = $_GET['Id_Requisicion'];
$correo                = $mysqli ->real_escape_string($_POST["correo"]);
$contraseña            = $mysqli ->real_escape_string($_POST["contraseña"]);
$usuario = $_SESSION['usuario'];


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $correo;                                         // SMTP username
    $mail->Password   = $contraseña;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($CorreoRequisicion, 'Uyeda Director');
    $mail->addAddress($CorreoRequisicion);     // Add a recipient
    

    // Attachments
   

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Autorizacion: ' .$Requisicion;
    $mail->Body    = '<meta charset="utf-8" />
    Notificaci&oacute;n de autorizaci&oacute;n del director <br><br>'.$com.'<br><br><br>Colaborador : '.$Requisitor.'<br>Requisici&oacute;n : '.$Requisicion.'<br> Fecha: '.$Fecha_requerida.'<br> Importe: '.$Importe.'<br> Moneda: '.$Moneda;
    

    $mail->send();
    echo 'El mensaje se envio correctamente';
} catch (Exception $e) {
    echo "hubo un herror al enviar el mensaje: {$mail->ErrorInfo}";
}

$query = mysqli_query($mysqli, "INSERT INTO autoriza_tres(
  Id_Requisicion,
  Autoriza3,
  Com_Autoriza3)
  VALUES ('$Id_Requisicion',' $usuario','$com')");


if ($query == true){
$queryD = $mysqli->prepare( "UPDATE rq_requisicione set 
  
  
            Status  ='Autorizada A3'
  

    WHERE Id_Requisicion=?");
  $queryD->bind_param("i",$Id_Requisicion);
   $queryD->execute();


$queryT = $mysqli->prepare( "UPDATE rq_requisiciond set 
  
  
            Status  ='Autorizada A3'
  

    WHERE Id_Requisicion=?");
  $queryT->bind_param("i",$Id_Requisicion);
  $queryT->execute();

}
}
?>

<?php
if (isset($_POST['seguimiento_compras'])) {
$com            = $mysqli ->real_escape_string($_POST["com"]);
$Id_Requisicion = $_GET['Id_Requisicion'];
$correo                = $mysqli ->real_escape_string($_POST["correo"]);
$contraseña            = $mysqli ->real_escape_string($_POST["contraseña"]);
$usuario = $_SESSION['usuario'];



// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $correo;                                         // SMTP username
    $mail->Password   = $contraseña;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($CorreoRequisicion, 'Uyeda Compras');
    $mail->addAddress($CorreoRequisicion);     // Add a recipient
    

    // Attachments
   

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Autorizacion: ' .$Requisicion;
    $mail->Body    = '<meta charset="utf-8" />
    Notificaci&oacute;n de autorizaci&oacute;n de compras <br><br>'.$com.'<br><br><br>Colaborador : '.$Requisitor.'<br>Requisici&oacute;n : '.$Requisicion.'<br> Fecha: '.$Fecha_requerida.'<br> Importe: '.$Importe.'<br> Moneda: '.$Moneda;
    

    $mail->send();
    echo 'El mensaje se envio correctamente';
} catch (Exception $e) {
    echo "hubo un herror al enviar el mensaje: {$mail->ErrorInfo}";
}



$query = mysqli_query($mysqli, "INSERT INTO compras(
  Id_Requisicion,
  OrdenCompra,
  Comentarios)
  VALUES ('$Id_Requisicion',' $usuario','$com')");


if ($query == true){
$queryD = $mysqli->prepare( "UPDATE rq_requisicione set 
  
  
            Status  ='AsignadaOC'
  

    WHERE Id_Requisicion=?");
  $queryD->bind_param("i",$Id_Requisicion);
   $queryD->execute();


$queryT = $mysqli->prepare( "UPDATE rq_requisiciond set 
  
  
            Status  ='AsignadaOC'
  

    WHERE Id_Requisicion=?");
  $queryT->bind_param("i",$Id_Requisicion);
  $queryT->execute();

}
}
?>











<?php
if (isset($_POST['Devolver'])) {
 $Id_Requisicion = $_GET['Id_Requisicion'];


 $query = $mysqli->prepare( "UPDATE rq_requisicione set 
  
  Status                ='Abierta'

    WHERE Id_Requisicion=?");
  $query->bind_param("i",$Id_Requisicion);
  $query->execute();

if ($query== true){
$queryD = $mysqli->prepare( "UPDATE rq_requisiciond set 
  
  Status                ='Abierta'

    WHERE Id_Requisicion=?");
  $queryD->bind_param("i",$Id_Requisicion);
  $queryD->execute();

//echo "exito doble";

}else{
  echo "No se inserto nada";
}}

?>



<?php
if (isset($_POST['Cancelar'])){
$Id_Requisicion = $_GET['Id_Requisicion'];
$com            = $mysqli ->real_escape_string($_POST["com"]);

 $query = $mysqli->prepare( "UPDATE rq_requisicione set 
  
  Status                ='Cancelado'

    WHERE Id_Requisicion=?");
  $query->bind_param("i",$Id_Requisicion);
  $query->execute();

if ($query== true){
$queryD = $mysqli->prepare( "UPDATE rq_requisiciond set 
  
  Status                ='Cancelado'

    WHERE Id_Requisicion=?");
  $queryD->bind_param("i",$Id_Requisicion);
  $queryD->execute();

$query = $mysqli->prepare("INSERT INTO cancelado(
  Id_Requisicion,
  Nombre,
  Comentario)
  VALUES ('$Id_Requisicion',' $usuario','$com')");
$query->execute();
}}
?>




<?php
if (isset($_POST['Seguimiento'])) {
$com            = $mysqli ->real_escape_string($_POST["com"]);
$Id_Requisicion = $_GET['Id_Requisicion'];
$usuario = $_SESSION['usuario'];

$query = mysqli_query($mysqli, "INSERT INTO rq_seguimiento(
  Id_Requisicion,
  Comentarios,
  Solicita)
  VALUES ('$Id_Requisicion','$com','$usuario')");
$result = mysqli_query($mysqli, $query);
  

}
?>

<?php
if (isset($_POST['Rechazo'])) {
$Id_Requisicion = $_GET['Id_Requisicion'];
$com            = $mysqli ->real_escape_string($_POST["com"]);

$query = mysqli_query($mysqli, "INSERT INTO rechazado(
  Id_Requisicion,
  nombre,
  comentario)
  VALUES ('$Id_Requisicion',' $usuario','$com')");


if ($query== true){
 $query = $mysqli->prepare( "UPDATE rq_requisicione set 
  
  Status                ='Rechazada'

    WHERE Id_Requisicion=?");
  $query->bind_param("i",$Id_Requisicion);
  $query->execute();

$queryD = $mysqli->prepare( "UPDATE rq_requisiciond set 
  
  Status                ='Rechazada'

    WHERE Id_Requisicion=?");
  $queryD->bind_param("i",$Id_Requisicion);
  $queryD->execute();


}}
?>

<?php
if (isset($_POST['Reenviar'])) {
$Id_Requisicion = $_GET['Id_Requisicion'];

$Id_Requisicion = $_GET['Id_Requisicion'];
$com            = $mysqli ->real_escape_string($_POST["com"]);

$query = mysqli_query($mysqli, "INSERT INTO reenvio(
  Id_Requisicion,
  nombre)
  VALUES ('$Id_Requisicion',' $usuario')");

if ($query== true){
 $query = $mysqli->prepare( "UPDATE rq_requisicione set 
  
  Status                ='Reenviado'

    WHERE Id_Requisicion=?");
  $query->bind_param("i",$Id_Requisicion);
  $query->execute();

$queryD = $mysqli->prepare( "UPDATE rq_requisiciond set 
  
  Status                ='Reenviado'

    WHERE Id_Requisicion=?");
  $queryD->bind_param("i",$Id_Requisicion);
  $queryD->execute();


header('Location: principal.php');
}
}
?>


<?php
include('conexion.php');
if (isset($_POST['Cambiar'])) {

$NumOC=        $mysqli ->real_escape_string($_POST["NumeroOC"]);
$Id_Requisicion = $_GET['Id_Requisicion'];

$query = $mysqli->prepare( "UPDATE rq_requisicione set 
   NumCompras  ='$NumOC',
   Status      ='numeroOC'

    WHERE Id_Requisicion=?");
  $query->bind_param("i",$Id_Requisicion);
  $query->execute();

if ($query== true){

$query = $mysqli->prepare( "UPDATE rq_requisiciond set 
    numeroOC  ='$NumOC',
    Status      ='numeroOC'
    WHERE Id_Requisicion=?");
  $query->bind_param("i",$Id_Requisicion);
  $query->execute();

}

header('Location: AcomprasAsig.php');
if(!$query) {
    die("Query Failed.");
  }

}


?>

<?php
include('conexion.php');
if (isset($_POST['Cambiard'])) {

$NumOC=        $mysqli ->real_escape_string($_POST["NumeroOC"]);
 $Id_Registro = $_GET['Id_Registro'];

$query = $mysqli->prepare( "UPDATE rq_requisiciond set 
   numeroOC  ='$NumOC'

    WHERE  Id_Registro=?");
  $query->bind_param("i",$Id_Registro);
  $query->execute();


if(!$query) {
    die("Query Failed.");
  }
header('Location: Acompras.php');
}


?>

<?php
include('conexion.php');
if (isset($_POST['Cambiar_Recibo_Estatus'])) {


 $Id_Registro = $_GET['Id_Registro'];

$query = $mysqli->prepare( "UPDATE rq_requisiciond set 
   Status  ='Recepcionado'

    WHERE  Id_Registro=?");
  $query->bind_param("i",$Id_Registro);
  $query->execute();

header('Location: Rproducto.php');

if(!$query) {
    die("Query Failed.");
  }
}


?>

<?php
include('conexion.php');
if (isset($_POST['R_Recepcionado'])) {


 $Id_Requisicion = $_GET['Id_Requisicion'];

$query = $mysqli->prepare( "UPDATE rq_requisicione set 
   Status  ='Recepcionado'

    WHERE  Id_Requisicion=?");
  $query->bind_param("i",$Id_Requisicion);
  $query->execute();

header('Location: Rproducto.php');

if(!$query) {
    die("Query Failed.");
  }
}


?>


















<?php/*
if  (isset($_POST['dirigir'])) {
$Id_Requisicion = $_GET['Id_Requisicion'];
$Status = $_GET['Status'];

$query = "SELECT RE.Id_Requisicion, RE.Requisicion, RE.Proveedor, RE.Fecha_solicitud, RE.Fecha_requerida, RE.Importe, RE.Status FROM rq_requisicione RE WHERE Id_Requisicion=Id_Requisicion";

if(isset($_GET['Id_Requisicion']) || isset($_GET['Status'])=="Abierta"){

header('Location: Mrequisicion.php?Id_Requisicion=[Id_Requisicion]&Status=[Status]');




}else{
  echo 'no se recibio ID';
}
}




*/
?>