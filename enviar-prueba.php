<?php



include("conexion.php");
    
$Requisicion          ='';
$Proveedor            ='';
$Maquila              ='';
$Descripcion          ='';
$Fecha_solicitud      ='';
$Fecha_requerida      ='';
$Moneda               ='';
$Requisitor           ='';
$Importe              ='';
$Autoriza1            ='';
$Fec_Autoriza1        ='';
$Hr_Autoriza1         ='';
$Com_Autoriza1        ='';

if  (isset($_GET['Id_Requisicion']) ) {


  $Id_Requisicion = $mysqli ->real_escape_string($_GET['Id_Requisicion']);

  $query = "SELECT RE.Id_Requisicion,AUTUNO.Id_Autoriza, RE.Requisicion, RE.Proveedor,RE.Maquila, RE.Descripcion, RE.Fecha_solicitud ,RE.Fecha_requerida,RE.Moneda,RE.Requisitor,RE.Importe ,AUTUNO.Autoriza1,AUTUNO.Fec_Autoriza1,AUTUNO.Hr_Autoriza1,AUTUNO.Com_Autoriza1 from rq_requisicione RE INNER JOIN autorizar AUTUNO ON RE.Id_Requisicion=AUTUNO.Id_Requisicion WHERE RE.Id_Requisicion=$Id_Requisicion";

  $result = mysqli_query($mysqli, $query);

  if (mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_array($result);

$Requisicion          =$mysqli ->real_escape_string($row['Requisicion']);
$Proveedor            =$mysqli ->real_escape_string($row['Proveedor']);
$Maquila              =$mysqli ->real_escape_string($row['Maquila']);
$Descripcion          =$mysqli ->real_escape_string($row['Descripcion']);
$Fecha_solicitud      =$mysqli ->real_escape_string($row['Fecha_solicitud']);
$Fecha_requerida      =$mysqli ->real_escape_string($row['Fecha_requerida']);
$Moneda               =$mysqli ->real_escape_string($row['Moneda']);
$Requisitor           =$mysqli ->real_escape_string($row['Requisitor']);
$Importe              =$mysqli ->real_escape_string($row['Importe']);
$Autoriza1            =$mysqli ->real_escape_string($row['Autoriza1']);
$Fec_Autoriza1        =$mysqli ->real_escape_string($row['Fec_Autoriza1']);
$Hr_Autoriza1         =$mysqli ->real_escape_string($row['Hr_Autoriza1']);
$Com_Autoriza1        =$mysqli ->real_escape_string($row['Com_Autoriza1']);







    
    
   

}
else{
  echo 'no se recibio ID';
}
}

?>

























<?php


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
    $CorreoRequisicion ='';

if  (isset($_GET['Id_Requisicion'])) {


  $Id_Requisicion = $mysqli ->real_escape_string($_GET['Id_Requisicion']);

  $query = "SELECT RE.Id_Requisicion,RE.NumCompras, RE.Requisicion, RE.Proveedor,RE.Maquila, RE.Descripcion, RE.Fecha_solicitud ,RE.Fecha_requerida,RE.Moneda,RE.CorreoRequisicion,RE.Requisitor, RE.Status,RE.Importe from rq_requisicione RE WHERE RE.Id_Requisicion=$Id_Requisicion";

  $result = mysqli_query($mysqli, $query);

  if (mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_array($result);

    $Requisicion     = $mysqli ->real_escape_string($row['Requisicion']);
    $Proveedor       = $mysqli ->real_escape_string($row['Proveedor']);
    $Maquila         = $mysqli ->real_escape_string($row['Maquila']);
    $Descripcion     = $mysqli ->real_escape_string($row['Descripcion']);
    $Fecha_requerida = $mysqli ->real_escape_string($row['Fecha_requerida']);
    $Moneda          = $mysqli ->real_escape_string($row['Moneda']);
    $Requisitor      = $mysqli ->real_escape_string($row['Requisitor']);
    $Status          = $mysqli ->real_escape_string($row['Status']);
    $Fecha_solicitud = $mysqli ->real_escape_string($row['Fecha_solicitud']);
    $NumCompras      = $mysqli ->real_escape_string($row['NumCompras']);
    $CorreoRequisicion      = $mysqli ->real_escape_string($row['CorreoRequisicion']);
    
   

}
else{
  echo 'no se recibio ID';
}
}

?>



<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.live.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   =  'samuel_anton60@hotmail.com';                                         // SMTP username
    $mail->Password   = '<B4740806sam>_2';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($CorreoRequisicion, 'SAM ANTON');
    $mail->addAddress('samuel_anton60@hotmail.com');     // Add a recipient
    

    // Attachments
   

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'No importante';
    $mail->Body    = 'hola';
    

    $mail->send();
    echo 'El mensaje se envio correctamente';
} catch (Exception $e) {
    echo "hubo un herror al enviar el mensaje: {$mail->ErrorInfo}";
}
?>



<?php
 header('Location: AutJefe.php');


?>