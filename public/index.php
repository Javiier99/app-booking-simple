<!-- Crearé todo aquí y luego lo llevaré a index.php -->



<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sitio de reservas</title>
        <link rel="stylesheet" href="./css/main.css">
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" /> -->
    </head>
    <body>
        <div class="body-div-h1h2p">
            <h1 class="body-div-h1h2p--h1">Reserva tu cita</h1>
            <h2 class="body-div-h1h2p--h2">Estética Mar Delgado</h2>
            <p class="body-div-h1h2p--p">Elige tu tratamiento, dónde quieres recibirlo y el momento perfecto</p>
        </div>
        

        
        <form class="body-form-div box-shadow" action="../src/get-client-form.php" method="POST" id="form">
            <div class="body-form-div-divx3button">
                <div class="form-div-divx3Button-divx4">
                    <div class="form-div-divx3Button-divx4-labelinput">
                        <label class="form-div-divx3Button-divx4-labelinput--label" for="name">Nombre</label>
                        <input class="form-div-divx3Button-divx4-labelinput--input" id="name" name="name" type="text">
                        <span id="name-error"></span>
                    </div>
                    <div class="form-div-divx3Button-divx4-labelinput">
                        <label class="form-div-divx3Button-divx4-labelinput--label" for="phone">Teléfono</label>
                        <input class="form-div-divx3Button-divx4-labelinput--input" id="phone" name="phone" type="number">
                        <span id="phone-error"></span>
                    </div>
                    <div class="form-div-divx3Button-divx4-labelinput">
                        <label class="form-div-divx3Button-divx4-labelinput--label" for="email">Email</label>
                        <input class="form-div-divx3Button-divx4-labelinput--input" id="email" name="email" type="email">
                        <span id="email-error"></span>
                    </div>
                    <div class="form-div-divx3Button-divx4-labelinput">
                        <label class="form-div-divx3Button-divx4-labelinput--label" for="service">Servicios</label>
                        <div class="form-div-divx3Button-divx4-labelinput-services" id="form-div-divx3Button-divx4-labelinput-services">
                            
                        </div>
                        <span id="service-error"></span>
                        
                    </div>
                    
                </div>

                

                <div class="body-form-div-divx2">
                    <div class="body-form-div-divx2-labelDiv">
                        <!-- Colocamos todo el calendario -->
                        <label class="body-form-div-divx2-labelDiv--label" for="fecha-cita">Selecciona tu cita:</label>
                        <div id="calendar"></div>
                    </div>
                    <div class="body-form-div-divx2-h2Div">
                        <!-- Selección de las horas -->
                        <label class="body-form-div-divx2-h2Div--label" for="hours">Selecciona tu hora:</label>
                        <div id="calendar-hours" class="body-form-div-divx2-h2Div-divHours">
                            <p class="body-form-div-divx2-h2Div-divHours--p">Selecciona una fecha para que aparezcan las horas</p>
                        </div>
                    </div>
                </div>

                <div class="body-form-div-divx3button-labelDiv">
                    <label class="body-form-div-divx3button-labelDiv--label" for="localization">Localización</label>
                    <div class="body-form-div-divx3button-labelDiv-divx2">
                        <button class="body-form-div-divx3button-labelDiv-divx2-divx2" name="place_cite" value="Negocio" type="button">
                            <div class="body-form-div-divx3button-labelDiv-divx2-divx2-img">
                                <img class="body-form-div-divx3button-labelDiv-divx2-divx2-img--img" src="./img/enterprise-white.png" alt="">
                            </div>
                            <div class="body-form-div-divx3button-labelDiv-divx2-divx2-h3P">
                                <h3>En la estética</h3>
                                <p>Localización o calle</p>
                            </div>
                        </button>
                        <button class="body-form-div-divx3button-labelDiv-divx2-divx2" name="place_cite" value="En tu casa" type="button">
                            <div class="body-form-div-divx3button-labelDiv-divx2-divx2-img">
                                <img class="body-form-div-divx3button-labelDiv-divx2-divx2-img--img " src="./img/house-white.png" alt="">
                            </div>
                            <div class="body-form-div-divx3button-labelDiv-divx2-divx2-h3P">
                                <h3>En mi casa</h3>
                                <p>Servicio a domicilio</p>
                            </div>
                        </button>
                    </div>
                    
                </div>

                <button class="button button-popup" type="button">
                    Comprobar datos antes de enviar
                    <img class="img-button-arrow img-arrow-black" src="./img/flecha-derecha-negra.png" alt=""> 
                    <img class="img-arrow-white img-button-arrow" src="./img/flecha-derecha-blanca.png" alt="">
                </button>
            </div>
            <input type="hidden" name="place_cite_send" id="place_cite" data-place="place_cite">
            <input type="hidden" name="date" id="date">
            <input type="hidden" name="time" id="time">



            <!-- Popup -->
            <div class="body-form-div-divx3button-h2div--dark hidden">
                <div class="body-form-div-divx3button-h2div box-shadow ">
                    <h2 class="body-form-div-divx3button-h2div--h2">Datos del {cliente}</h2> 
                    <p>Comprueba que esté todo bien antes de crear la cita</p>
                    <div class="body-form-div-divx3button-h2div-Px6">
                        <p class="body-form-div-divx3button-h2div-Px6--p__name">- Nombre: {nombre}</p>
                        <p class="body-form-div-divx3button-h2div-Px6--p__phone">- Teléfono: {teléfono}</p>
                        <p class="body-form-div-divx3button-h2div-Px6--p__email">- Email: {Email}</p>
                        <p class="body-form-div-divx3button-h2div-Px6--p__service">- Servicio: {Servicio}</p>
                        <p class="body-form-div-divx3button-h2div-Px6--p__localization">- Localización: {Localización}</p>
                        <p class="body-form-div-divx3button-h2div-Px6--p__dates">- Fecha y Hora: El día: {día} a las {hora}</p>
                    </div>
                    <p>Me pondré en contacto contigo muy pronto!</p>
                    <button class="button" type="submit">
                        ¡Quiero mi reserva!
                        <img class="img-button-arrow img-arrow-black" src="./img/flecha-derecha-negra.png" alt=""> 
                        <img class="img-arrow-white img-button-arrow" src="./img/flecha-derecha-blanca.png" alt="">
                    </button>
                    <p class="body-form-div-divx3button-h2div--p__faltan-cosas"></p>
                    <!-- Es un botón para que los usuarios puedan cerrar la pestaña por si necesitan cambiar algo -->
                    <p class="body-form-div-divx3button-h2div--p">Cerrar pestaña</p>
                </div>
            </div>
            



        </form>

        <script type="module" src="./js/main.js"></script>

    </body>
</html>








