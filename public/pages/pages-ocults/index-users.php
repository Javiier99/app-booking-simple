<!-- Esta es la página para los usuarios que están registrados -->

<?php 

    session_start();
    require_once dirname(__DIR__, 3) . '/backend/automating/verify-session-users.php';
    verifySessionUsers();

    require_once dirname(__DIR__, 3) . '/config/database.php';
    // id, cliente_nombre, id_hours_available, fecha, hora, localization, phone, email, price_total from booking
    try{
        $sql = "SELECT 
                booking.id AS id_cita,
                booking.cliente_nombre,
                booking.fecha,
                booking.hora,
                booking.localization,
                booking.phone,
                booking.email,
                GROUP_CONCAT(services_business.service_name SEPARATOR ', ') AS servicios,
                SUM(services_business.precio) AS precio_total
            FROM services_client_booking
            INNER JOIN booking ON services_client_booking.booking_id = booking.id
            INNER JOIN services_business ON services_client_booking.service_id = services_business.service_id
            WHERE booking.fecha >= CURDATE()
            GROUP BY booking.id, booking.cliente_nombre, booking.fecha, booking.hora, booking.localization, booking.phone, booking.email";
        $resultado = $pdo->query($sql);
        $citas = $resultado->fetchAll();
    }catch (PDOException $e) {
        die("Error en la consulta: " . $e->getMessage());
    }




?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../css/main.css">
</head>
<body class="dashboard-body">
    <section class="dashboard-section">
        <h1>Dashboard con todas las citas</h1>
        <div class="dashboard-section-div">
            <!-- Aquí aparecerán todos los clientes -->
            <table class="dashboard-section-div-table">
                <tr>
                    <th class="dashboard-section-div-table-td">ID</th>
                    <th class="dashboard-section-div-table-td">Nombre</th>
                    <th class="dashboard-section-div-table-td">Fecha</th>
                    <th class="dashboard-section-div-table-td">Hora</th>
                    <th class="dashboard-section-div-table-td">Localización</th>
                    <th class="dashboard-section-div-table-td">Teléfono</th>
                    <th class="dashboard-section-div-table-td">Email</th>
                    <th class="dashboard-section-div-table-td">Servicios</th>
                    <th class="dashboard-section-div-table-td">Cobrar</th>
                    <th class="dashboard-section-div-table-td">Acciones</th>
                </tr>
                
                <tbody>
                    <?php if (empty($citas)): ?>
                        <tr>
                            <td colspan="10" style="text-align: center;">No hay citas registradas.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($citas as $cita): ?>
                            <tr>
                                <td class="dashboard-section-div-table-tbody-tr"><?php echo htmlspecialchars($cita['id_cita']); ?></td>
                                <td class="dashboard-section-div-table-tbody-tr"><?php echo htmlspecialchars($cita['cliente_nombre']); ?></td>
                                <td class="dashboard-section-div-table-tbody-tr"><?php echo htmlspecialchars($cita['fecha']); ?></td>
                                <td class="dashboard-section-div-table-tbody-tr"><?php echo htmlspecialchars($cita['hora']); ?></td>
                                <td class="dashboard-section-div-table-tbody-tr"><?php echo htmlspecialchars($cita['localization']); ?></td>
                                <td class="dashboard-section-div-table-tbody-tr"><?php echo htmlspecialchars($cita['phone']); ?></td>
                                <td class="dashboard-section-div-table-tbody-tr"><?php echo htmlspecialchars($cita['email']); ?></td>
                                <td class="dashboard-section-div-table-tbody-tr"><?php echo htmlspecialchars($cita['servicios']); ?></td>
                                <td class="dashboard-section-div-table-tbody-tr">$<?php echo htmlspecialchars($cita['precio_total']); ?></td>
                                <td class="dashboard-section-div-table-td--button">
                                    <button>
                                        Actualizar
                                    </button>
                                    <button>
                                        Borrar
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
                
                



            </table>
        </div>
    </section>


    <script src="../../js/index-users/main-index-users.js"></script>
</body>
</html>