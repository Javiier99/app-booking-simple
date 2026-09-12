<?php


header('Content-type: application/json; charset=utf-8');

// Requerimos la conección a la Base de datos
require_once __DIR__ . "/../config/database.php";


// Obtenemos las horas de la base de datos, todas las horas disponibles

try{
    $sqlHorariosDisponibles = "SELECT id_hours_available, hora FROM hours_available WHERE activo = 1 ORDER BY  hora ASC";
    $sqlReservas = "SELECT id_hours_available, hora, fecha FROM booking ORDER BY id ASC";

    $stmtHorariosDisponibles = $pdo-> prepare($sqlHorariosDisponibles);
    $stmtHorariosDisponibles-> execute();

    $stmtReservas = $pdo-> prepare($sqlReservas);
    $stmtReservas-> execute();



    $horasDisponibles = $stmtHorariosDisponibles->fetchAll();
    

    $horasReservas = $stmtReservas->fetchAll();

    $horas = [$horasDisponibles, $horasReservas];

    echo json_encode($horas);

}catch (PDOException $e){
    echo "Error al obtener las horas {$e->getMessage()}";
}






// try{
//     $sql = "SELECT id_hours_available, hora FROM horarios_disponibles WHERE activo = 1 ORDER BY  hora ASC";

//     $stmt = $pdo-> prepare($sql);
//     $stmt-> execute();

//     $horasDisponibles = $stmt->fetchAll();
//     echo json_encode($horasDisponibles);

// }catch (PDOException $e){
//     echo "Error al obtener las horas {$e->getMessage()}";
// }






?>