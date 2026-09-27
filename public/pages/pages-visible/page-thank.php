




<!-- ! Apuntes: Falta que al seleccionar los servicios, primero se guarde los precios de los servicios para mostrarlo en la página de gracias y en el popup y posteriormente se guarde en la base de datos -->






<?php
    session_start();
    $nombre = $_SESSION['name'];
    $telefono= $_SESSION['phone'];
    $email = $_SESSION['email'];
    $servicios = $_SESSION['servicios'];
    $fecha = $_SESSION['fecha'];
    $horaText = $_SESSION['horaText'];
    $lugar = $_SESSION['localizacion'];
    $priceTotal = $_SESSION['price_total'];
    



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias <?php echo $nombre; ?> por reservar</title>
    <link rel="stylesheet" href="../../css/main.css">

</head>
<body>
    <div class="page-thank-container">

        <div>
            <img src="../../img/check.png" alt="">
        </div>
        <p>RESERVA COMPLETADA</p>
        <h1>¡Gracias por confiar en nosotros <?php echo $nombre;?>!</h1>

        <p>Tu cita ha quedado confirmada. Hemos enviado todos los detalles al correo electrónico que nos has proporcionado</p>

        <div>
            <div>
                <img src="../../img/calendar.png" alt="">
                <p>Fecha:</p>
                <p>La cita es el dia <?php echo $fecha;?></p>
            </div>
            <div>
                <img src="../../img/clock.png" alt="">
                <p>La hora es a las <?php echo $horaText; ?></p>
                <p></p>
            </div>
            <div>
                <img src="../../img/localization.png" alt="">
                <p>La localización es <?php echo $lugar; ?></p>
                <p></p>
            </div>
            <div>
                <img src="../../img/heart.png" alt="">
                <p>Servicios</p>
                <p>Tus servicios<?php foreach($servicios as $servicio){echo ", {$servicio}";}?></p>
                <p>El total sería de: <?php echo $priceTotal;?>€</p>
            </div>
        </div>

        <div>
            <img src="../../img/envelope.png" alt="">
            <p>Revisa tu bandeja de entrada para consultar la confirmación.</p>
        </div>
        <p>Si necesitas modificar tu cita, ponte en contacto con nosotros, al teléfono: +34 633 37 49 25</p>

    </div>
</body>
</html>