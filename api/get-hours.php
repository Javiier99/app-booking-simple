<?php


header('Content-type: application/json; charset=utf-8');

// Requerimos la conección a la Base de datos
require_once __DIR__ . "/../config/database.php";

// Obtenemos las horas de la base de datos, todas las horas disponibles


try{
    $sql = "SELECT id, hora FROM horarios_disponibles WHERE activo = 1 ORDER BY  hora ASC";

    $stmt = $pdo-> prepare($sql);
    $stmt-> execute();

    $horasDisponibles = $stmt->fetchAll();
    echo json_encode($horasDisponibles);

}catch (PDOException $e){
    echo "Error al obtener las horas {$e->getMessage()}";
}

















?>