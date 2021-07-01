



<?php
if (isset($_POST['Autoriza_Jefe'])) {

    if (!empty($_POST['name']) && !empty($_POST['asunto']) && !empty($_POST['msg']) && !empty($_POST['email'])){
    $name = $Requisitor;
    $asunto = "la requisición fue Autorizada por el jefe";
    $msg = $_POST['com'];
    $email = $correo;

    $header  = "From: noreply@example.com" . "\r \n";
    $header .= "Reply-To: noreply@example.com" . "\r \n";
    $header .= "X-Mailer: PHP/" . phpversion();
    $mail = @mail($email,$asunto,$msg,$header);

    if ($mail){
      echo "<h4>¡enviado exitosamente!</h4>";
    } 

    if (!$mail){
      echo "<h4>¡no enviado exitosamente!</h4>";
    } 



  }
}

?>