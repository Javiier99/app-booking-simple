



<?php


    function verifySession(){
        // Calculo para cerrar sesión y que vuelva a poner de nuevo el usuario y contraseña será de 7 días por el momento
        $sessionNowSession = new DateTime();
        $sessionDateStart = $_SESSION['date-start'] ?? 0;

        if($sessionDateStart == 0 || $sessionDateStart == null){
            $_SESSION['date-start'] = date('Y-m-d H:i:s');
            $sessionDateStart = $_SESSION['date-start'];
        }

        // Calculo de las sesiones:
        $dateFirstSession = new DateTime($sessionDateStart);
        $calculationDate = $dateFirstSession->diff($sessionNowSession);

        $days = $calculationDate->d;
        $min = $calculationDate->i;

        if($days == 7){
            session_destroy();
            $_SESSION['start_session_automatic'] = false;
            $_SESSION['date-start'] = date('Y-m-d H:i:s');
            $sessionDateStart = $_SESSION['date-start'];
        }


        if(isset($_SESSION['start_session_automatic'])){
            if($_SESSION['start_session_automatic'] == true){
                header("Location: /app-booking-simple/public/pages/pages-ocults/index-users.php");
                exit();
            }
        }
    }


?>

