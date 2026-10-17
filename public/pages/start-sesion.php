<!-- Esta es la página para iniciar sesión y redirigirse a la página de usuarios -->

<?php


    session_start();
    $error = $_SESSION['error'] ?? "";


?>





<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    

    <main class="startSesion-main">
        <form action="../../backend/starts-sesion/starts-sesion.php" method="POST" class="startSesion-main-form">
            <div class="startSesion-main-form-div1">
                <label for="email" class="startSesion-main-form-div1--label">Email</label>
                <input type="email" class="startSesion-main-form-div1--input" name="email" placeholder="Tu email" id="email">
            </div> 

            <div class="startSesion-main-form-div2">
                <label for="password" class="startSesion-main-form-div2--label">Contraseña</label>
                <input type="password" name="password" placeholder="Tu contraseña" class="startSesion-main-form-div2--input" id="password">
            </div>

            <button class="startSesion-main-form--button button" type="submit">Entrar en el Dashboard</button>

            <div class="startSesion-main-form-div3">
                <input type="checkbox"> 
                <p>Mantener la sesión iniciada</p>
            </div>
        </form>

        <?php if($error != ""){ ?> 
            <?php foreach($error as $errorMensaje){
                echo "<p>$errorMensaje;</p>";
            }?>
            
        <?php }?>

    </main>



    <script src="../js/stars-sesion/main-stars-sesion.js"></script>
</body>
</html>