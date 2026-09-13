<!-- Aquí irá la logica para obtener los clientes de los formularios


<?php

// try{
//     header('Content-type: application/json; charset=utf-8');

//     require_once __DIR__ . "/../config/database.php";


//     if($_SERVER['REQUEST_METHOD'] === 'POST')
//     {
//         $nombre = $_POST['name'] ?? '';
//         $telefono = $_POST['phone'] ?? '';
//         $email = $_POST['email'] ?? '';
//         $servicios = $_POST['service-select[]'] ?? '';
//         $fecha = $_POST['time'] ?? '';
//         $hora = $_POST['date'] ?? '';
//         $fecha = null;
//         if (!empty($fechaInput)) {
//             $dateObject = DateTime::createFromFormat('d-m-Y', $fechaInput);
//             if ($dateObject) {
//                 $fecha = $dateObject->format('Y-m-d'); // Se convierte a "2026-09-24"
//             }
//         }
//         $hora = null;
//         if (!empty($horaInput)) {
//             $hora = (strlen($horaInput) === 5) ? $horaInput . ':00' : $horaInput; // Se convierte a "20:00:00"
//         }
//         $lugar = $_POST['place_cite_send'] ?? '';

//         $sql = "INSERT INTO booking (cliente_nombre, phone, email, hora, fecha, localization)
//             VALUES (:nombre, :telefono, :email, :hora, :fecha, :lugar)";
    
//         $stmt = $pdo->prepare($sql);

//         $stmt->execute([
//             ':nombre'=> $nombre,
//             ':telefono'=> $telefono,
//             ':email' => $email,
//             ':lugar' => $lugar,
//             ':fecha' => $fecha,
//             ':hora' => $hora
//         ]);

//         echo json_encode(['success'=>true]);
//         exit();
//     }

    

// }catch(PDOException $e){
//     echo json_encode([
//         'success' => false, 
//         'error' => 'Error en la base de datos: ' . $e->getMessage()
//     ]);
//     exit();
// }
















try {
    header('Content-type: application/json; charset=utf-8');

    require_once __DIR__ . "/../config/database.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre   = $_POST['name'] ?? '';
        $telefono = $_POST['phone'] ?? '';
        $email    = $_POST['email'] ?? '';
        
        // Corrección de lectura de servicios
        $servicios = $_POST['service-select'] ?? ''; 

        // 1. Recoger datos de fecha y hora correctamente asignados
        $fechaInput = $_POST['date'] ?? ''; // Viene "24-09-2026"
        $horaInput  = $_POST['time'] ?? ''; // Viene "20:00"

        // 2. Formatear la fecha a YYYY-MM-DD
        $fecha = null;
        if (!empty($fechaInput)) {
            $dateObject = DateTime::createFromFormat('d-m-Y', $fechaInput);
            if ($dateObject) {
                $fecha = $dateObject->format('Y-m-d');
            }
        }

        // 3. Formatear la hora a HH:MM:SS
        $hora = null;
        if (!empty($horaInput)) {
            $hora = (strlen($horaInput) === 5) ? $horaInput . ':00' : $horaInput;
        }

        $lugar = $_POST['place_cite_send'] ?? '';

        // 4. Sentencia SQL
        $sql = "INSERT INTO booking (cliente_nombre, phone, email, hora, fecha, localization)
                VALUES (:nombre, :telefono, :email, :hora, :fecha, :lugar)";
    
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':nombre'   => $nombre,
            ':telefono' => $telefono,
            ':email'    => $email,
            ':lugar'    => $lugar,
            ':fecha'    => $fecha,
            ':hora'     => $hora
        ]);

        echo json_encode(['success' => true]);
        exit();
    }

} catch (PDOException $e) {
    echo json_encode([
        'success' => false, 
        'error'   => 'Error en la base de datos: ' . $e->getMessage()
    ]);
    exit();
}


?>



