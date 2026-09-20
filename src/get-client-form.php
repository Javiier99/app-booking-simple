Aquí irá la logica para obtener los clientes de los formularios


<?php

    try{
        session_start();
        header('Content-type: application/json; charset=utf-8');

        require_once __DIR__ . "/../config/database.php";


        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $nombre = $_POST['name'] ?? '';
            $telefono = $_POST['phone'] ?? '';
            $email = $_POST['email'] ?? '';
            $servicios = $_POST['service-select'] ?? '';
            $price = $_POST['price-service-select'] ?? '';
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
                ':nombre'=> $nombre,
                ':telefono'=> $telefono,
                ':email' => $email,
                ':hora' => $horaText,
                ':hora_id' => $horaId,
                ':fecha' => $fechaModificada,
                ':lugar' => $lugar,
                ':price_total' => $price,
            ]);

            echo json_encode(['success'=>true]);
            $_SESSION['name'] = $nombre;
            $_SESSION['phone'] = $telefono;
            $_SESSION['email'] = $email;
            $_SESSION['servicios'] = $servicios;
            $_SESSION['fecha'] = $fecha;
            $_SESSION['horaText'] = $horaText;
            $_SESSION['localizacion'] = $lugar;
            $_SESSION['price_total'] = $price;
            header("Location: ../public/pages/pages-visible/page-thank.php");
            exit();
        }

        

    }catch(PDOException $e){
        echo json_encode([
            'success' => false, 
            'error' => 'Error en la base de datos: ' . $e->getMessage()
        ]);
        exit();
    }


?>



