<!-- En esta hoja lo que se averiguará es en el caso de que el usuario no haya iniciado sesion y entra en una página prohibida, se va a redirigir a la página de inicio sesión -->





<?php

    function verifySessionUsers(){
    
    if(!isset($_SESSION['start_session_automatic'])){
        $_SESSION['start_session_automatic'] = false;
    }

    $sessionStartAutomatic = $_SESSION['start_session_automatic'];
    
    if($sessionStartAutomatic === false){
        header("Location: /app-booking-simple/public/pages/start-sesion.php");
        exit();
    }

    }

?>



