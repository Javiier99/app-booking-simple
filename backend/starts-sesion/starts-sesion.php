<!-- Todo el backend para iniciar la sesión en el programa -->



<?php

    $errores = [];
    try{
        session_start();

        header('Content-type: application/json; charset=utf-8');

        require_once __DIR__ . "/../../config/database.php";

        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $emailUser = $_POST['email'] ? : "";
            $passwordUser = $_POST['password'];

            // Obtener los datos de la BBDD
            $stmt = $pdo -> prepare("SELECT admin_id ,admin_name, admin_email, admin_password FROM admin WHERE admin_email = ?");
            $stmt->execute([$emailUser]);
            $resultados = $stmt->fetch(PDO::FETCH_ASSOC);


            if($resultados === true){
                $name = $resultados['admin_name'];
                $email = $resultados['admin_email'];
                $password = $resultados['admin_password'];
                $userOk = false;
                $paswordOk = false;
                

                if($email == $emailUser){
                    $userOk = true;
                }else{
                    array_push($errores, "El email no es el correcto");
                }

                if($passwordUser == $password){
                    $paswordOk = true;
                }else{
                    array_push($errores, "La contraseña no es la correcta");
                }


                if($paswordOk == true && $userOk == true){
                    // Entramos y redireccionamos  con $_SESSION
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;
                    header("Location: ../../../../public/pages/pages-ocults/index-users.php");
                }else{
                    $_SESSION['error'] = $errores;
                    header("Location: ../../../../public/pages/start-sesion.php");
                    exit();
                }



            }else{

                array_push($errores, "Error, no existe ese email");
                $_SESSION['error'] = $errores;
                header("Location: ../../../../public/pages/start-sesion.php");
                exit();
            }   

        }

    }catch (PDOException $e){

        array_push($errores, "Error, del sistema vuelvelo a intentar");
        $_SESSION['error'] = $errores;
        header("Location: ../../../../public/pages/pages-visible/page-thank.php");
        exit();
        
    }


?>