<?php
session_start();
$nombre = $_SESSION['name'];
$telefono = $_SESSION['phone'];
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
    <main class="page-thank-container">
        <section class="page-thank-container-section box-shadow">
            <div class="page-thank-container-section-div1">
                <img src="../../img/check.png" alt="" class="page-thank-container-section-div1-img">
            </div>
            <p class="page-thank-container-section-p1">RESERVA COMPLETADA</p>
            <h1 class="page-thank-container-section-h1">¡Gracias por confiar en nosotros <?php echo $nombre; ?>!</h1>

            <p class="page-thank-container-section-p2">Tu cita ha quedado confirmada. Hemos enviado todos los detalles al correo electrónico que nos has proporcionado</p>

            <div class="page-thank-container-section-div2">
                <div class="page-thank-container-section-div2-div">
                    <div class="page-thank-container-section-div2-div-div">
                        <img src="../../img/calendar.png" alt="">
                    </div>
                    <p>Fecha:</p>
                    <p class="page-thank-container-section-div2-div-div-p">La cita es el dia <?php echo $fecha; ?></p>
                </div>
                <div class="page-thank-container-section-div2-div">
                    <div class="page-thank-container-section-div2-div-div">
                        <img src="../../img/clock.png" alt="">
                    </div>
                    <p>Hora:</p>
                    <p class="page-thank-container-section-div2-div-div-p">La hora es a las <?php echo $horaText; ?></p>
                    
                </div>
                <div class="page-thank-container-section-div2-div">
                    <div class="page-thank-container-section-div2-div-div-localization">
                        <img src="../../img/localization.png" alt="">   
                    </div>
                    <p>Localización: </p>
                    <p class="page-thank-container-section-div2-div-div-p">La localización es <?php echo $lugar; ?></p>
                    
                </div>
                <div class="page-thank-container-section-div2-div">
                    <div class="page-thank-container-section-div2-div-div">
                        <img src="../../img/heart.png" alt="">
                    </div>
                    <p>Servicios</p>
                    <p class="page-thank-container-section-div2-div-div-p">Tus servicios<?php foreach ($servicios as $servicio) {echo ", {$servicio}";} ?></p>
                    <p>El total sería de: <span class="page-thank-container-section-div2-div-div-p-priceService"> <?php echo $priceTotal; ?>€</span></p>
                </div>
            </div>

            <div class="page-thank-container-section-div3">
                <img src="../../img/envelope.png" class="page-thank-container-section-div3-img" alt="">
                <p>Revisa tu bandeja de entrada para consultar la confirmación.</p>
            </div>
            <p class="page-thank-container-section-p3">Si necesitas modificar tu cita, ponte en contacto con nosotros, al teléfono:<span class="page-thank-container-section-p3-span"> +34 633 37 49 25</span></p>
        </section>

    </main>
</body>

</html>