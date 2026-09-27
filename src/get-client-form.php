<!-- Aquí irá la logica para obtener los clientes de los formularios -->


<?php

try {
    session_start();
    header('Content-type: application/json; charset=utf-8');

    require_once __DIR__ . "/../config/database.php";


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['name'] ?? '';
        $telefono = $_POST['phone'] ?? '';
        $email = $_POST['email'] ?? '';
        $servicios = $_POST['service-select'] ?? '';
        $serviceID = $_POST['id-service-select'] ?? '';
        $priceServiceTotal = $_POST['precio-service'] ?? '';
        $fecha = $_POST['date'] ?? '';
        $horaId = $_POST['timeId'] ?? '';
        $horaText = $_POST['timeText'] ?? '';
        $fechaModificada = null;
        $lugar = $_POST['place_cite_send'] ?? '';

        if (!empty($fecha)) {
            $dateObject = DateTime::createFromFormat('d-m-Y', $fecha);
            if ($dateObject) {
                $fechaModificada = $dateObject->format('Y-m-d'); // Se convierte a "2026-09-24"
            }
        }



        $sql = "INSERT INTO booking (cliente_nombre, phone, email, hora, id_hours_available, fecha, localization, price_total)
                VALUES (:nombre, :telefono, :email, :hora, :hora_id , :fecha, :lugar, :price_total)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':nombre' => $nombre,
            ':telefono' => $telefono,
            ':email' => $email,
            ':hora' => $horaText,
            ':hora_id' => $horaId,
            ':fecha' => $fechaModificada,
            ':lugar' => $lugar,
            ':price_total' => $priceServiceTotal,
        ]);

        // Guardar todos los servicios
        $bookingId = $pdo->lastInsertId(); // Guardamos el id del cliente

        $insertService = $pdo->prepare("INSERT INTO services_client_booking (booking_id, service_id) 
                                        VALUES (:booking_id, :service_id)");
        
        foreach($serviceID as $serviciosIDIndividual){
            $insertService ->execute([
                ':booking_id' => $bookingId,
                ':service_id' => $serviciosIDIndividual

            ]);
        }



        // Enviar por correo todo los datos de la cita del cliente con python

        if(is_array($servicios)){ // En caso de ser un array lo debo de pasar a texto
            $serviciosTexto = implode(', ', $servicios);
        }else{
            $serviciosTexto = (string)$servicios;
        }

        $nombreEmail = escapeshellarg($nombre);
        $emailEmail = escapeshellarg($email);
        $horaEmail = escapeshellarg($horaText);
        $fechaEmail = escapeshellarg($fechaModificada);
        $priceTotalEmail = escapeshellarg($priceServiceTotal);
        $lugarEmail = escapeshellarg($lugar);
        $serviceEmail = escapeshellarg($serviciosTexto);


        $python = __DIR__ . '/../.venv/Scripts/python.exe';
        $scripts = __DIR__ . '/../backend/automatisation/send_first_email.py';

        $comando = "$python $scripts $nombreEmail $emailEmail $horaEmail $fechaEmail $priceTotalEmail $lugarEmail $serviceEmail";
        pclose(popen("start /B " . $comando, "r"));


        // Guardar todos los datos para la página de gracias

        echo json_encode(['success' => true]);
        $_SESSION['name'] = $nombre;
        $_SESSION['phone'] = $telefono;
        $_SESSION['email'] = $email;
        $_SESSION['servicios'] = $servicios;
        $_SESSION['fecha'] = $fecha;
        $_SESSION['horaText'] = $horaText;
        $_SESSION['localizacion'] = $lugar;
        $_SESSION['price_total'] = $priceServiceTotal;
        header("Location: ../public/pages/pages-visible/page-thank.php");
        exit();
    }
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'error' => 'Error en la base de datos: ' . $e->getMessage()
    ]);
    exit();
}


?>