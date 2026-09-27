

<?php
header('Content-type: application/json; charset=utf-8');

require_once __DIR__ . "/../config/database.php";

try{
    $sql = "SELECT service_id, service_name, precio FROM services_business WHERE activo = 1 ORDER BY service_name ASC";

    $stmt = $pdo-> prepare($sql);
    $stmt-> execute();

    $serviceAvailable = $stmt->fetchAll();
    echo json_encode($serviceAvailable);
    

}catch (PDOException $e){
    echo "Error al obtener las horas {$e->getMessage()}";
}



?>









