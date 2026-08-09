<?php


    $host = "localhost";
    $usuario = "root"; // usuario por defecto de laragon
    $password = ""; // Contraseña por defecto de laragon (vacia)
    $baseData = "booking"; // El nombre exacto de la BBDD


    try{
        $pdo = new PDO("mysql:host=$host;dbname=$baseData;charset=utf8", $usuario, $password);

        $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo-> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e){
        die("Error de conexión: " . $e->getMessage());
    }


?>