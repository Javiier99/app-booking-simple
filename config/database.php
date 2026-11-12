<?php

    require_once __DIR__ . '/env.php';

    $host = env('DB_HOST', 'localhost');
    $usuario = env('DB_USER', 'root'); 
    $password = env('DB_PASS', ''); 
    $baseData = env('DB_NAME', 'booking'); 


    try{
        $pdo = new PDO("mysql:host=$host;dbname=$baseData;charset=utf8", $usuario, $password);

        $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo-> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e){
        die("Error de conexión: " . $e->getMessage());
    }


?>