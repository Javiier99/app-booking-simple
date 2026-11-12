<!-- Todo el backend para iniciar la sesión en el programa -->



<?php
    
    $errores = [];
    try{
        session_start();

        header('Content-type: application/json; charset=utf-8');

        require_once __DIR__ . "/../../config/database.php";

        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $emailUser = $_POST['email'];
            $passwordUser = $_POST['password'];

            // Obtener los datos de la BBDD
            $stmt = $pdo -> prepare("SELECT admin_id ,admin_name, admin_email, admin_password FROM admin WHERE admin_email = ?");
            $stmt->execute([$emailUser]);
            $resultados = $stmt->fetch(PDO::FETCH_ASSOC);


            if($resultados['admin_email'] === $emailUser){
                $name = $resultados['admin_name'];
                $email = $resultados['admin_email'];
                $password = $resultados['admin_password'];
                $userOk = false;
                $paswordOk = false;
                $_SESSION['start_session_automatic'] = false;

                if($email == $emailUser){
                    $userOk = true;
                }else{
                    array_push($errores, "El usuario o la contraseña no es correcta");
                }

                if($passwordUser == $password){
                    $paswordOk = true;
                }else{
                    array_push($errores, "El usuario o la contraseña no es correcta");
                }


                if($paswordOk == true && $userOk == true){
                    // Entramos y redireccionamos  con $_SESSION
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;
                    $_SESSION['start_session_automatic'] = true;
                    header("Location: /app-booking-simple/public/pages/pages-ocults/index-users.php");
                    exit();
                }else{
                    $_SESSION['error'] = $errores;
                    header("Location: /app-booking-simple/public/pages/start-sesion.php");
                    exit();
                }



            }else{

                array_push($errores, "Error, no existe esa cuenta");
                $_SESSION['error'] = $errores;
                header("Location: /app-booking-simple/public/pages/start-sesion.php");
                exit();
            }   

        }

    }catch (PDOException $e){

        array_push($errores, "Error, del sistema vuelvelo a intentar");
        $_SESSION['error'] = $errores;
        header("Location: /app-booking-simple/public/pages/start-sesion.php");
        exit();
        
    }


?>