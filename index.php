<?php
    require "conexion.php";

    session_start();

    if($_POST){

            $usuario =  $_POST['usuario'];
            $password = $_POST['password'];
           
        
            $sql ="SELECT idusuario, password, Puesto, usuario, JefeAutoriza, tipo_usuario, Maquila, Correo FROM usuario WHERE usuario='$usuario'"; /*CONSULTA*/
    
            $resultado = $mysqli->query($sql);
            $num = $resultado->num_rows;

    if($num>0){

        $row = $resultado->fetch_assoc();
        $password_bd = $row['password'];

        $pass_c = sha1($password);

    if($password_bd == $pass_c){

         $_SESSION['idusuario'] = $row['idusuario'];
         $_SESSION['Puesto'] = $row['Puesto'];
         $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
         $_SESSION['Correo'] = $row['Correo'];
         $_SESSION['JefeAutoriza'] = $row['JefeAutoriza'];
         $_SESSION['usuario'] = $row['usuario'];
         $_SESSION['Maquila'] = $row['Maquila'];


        header("Location: principal.php");

    }else{
        echo "La contraseña no coincide";
    }

    }else{

        echo "no existen usuario";
    }

    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Uyeda Industrial</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
           <link rel="icon" type="image/png" sizes="32x32" href="images/d.ico">
    </head>
<!--<body style="background: #EDEDEE;">-->

    <body style="background-repeat: no-repeat; background-size: 100% 100%;" background="images/c.png">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5" style="opacity: 0.9;">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><img src="images/b.png" alt="Mi titulo de la imagen" style="width: 90px; height: 60px; margin:10px auto; display:block;"></h3></div>
                                    <div class="card-body" >
                                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Usuario</label>
                                                <input class="form-control py-4" id="inputEmailAddress" name="usuario" type="text" placeholder="ingresar Usuario" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="ingresar contraseña" />
                                            </div>
                                            <div class="form-group">
                                                
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!--<a class="small" href="password.html">Forgot Password?</a>-->
                                                <button type="submit" class="btn btn-primary" >Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <!--<div class="small"><a href="register.html">Need an account? Sign up!</a></div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
