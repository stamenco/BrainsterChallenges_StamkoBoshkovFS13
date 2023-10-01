<?php

require_once(__DIR__ . '/functions.php');

session_start();
notauth();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: admins.php');
    die();
}
require_once(__DIR__ . '/Database/db.php');

$flag = true;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['action'] == 'update') {

        if (
            empty($_POST['vehicleModel']) || empty($_POST['chassisNumber']) || empty($_POST['registrationNumber']) || empty($_POST['vehicleType']) || empty($_POST['productionYear']) || empty($_POST['fuelType'])
        ) {
            $flag = false;
            $_SESSION['error'] = 'All fields are required!';
            header('Location: editVehicle.php');
            die();
        }

        if ($flag) {
            $sql = "UPDATE registrations SET vehicle_model = :vehicle_model,  vehicle_type = :vehicle_type, vehicle_chassis_number = :vehicle_chassis_number, vehicle_production_year = :vehicle_production_year, registration_number = :registration_number, fuel_type = :fuel_type WHERE id = :id ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                [
                    'id' => $_POST['id'],
                    'vehicle_model' => $_POST['vehicleModel'],
                    'vehicle_type' => $_POST['vehicleType'],
                    'vehicle_chassis_number' => $_POST['chassisNumber'],
                    'vehicle_production_year' => $_POST['productionYear'],
                    'registration_number' => $_POST['registrationNumber'],
                    'fuel_type' => $_POST['fuelType']
                ]
            );

            $_SESSION['success'] = 'Vehicle updated!';
            header('Location: admins.php');
        }
    }
}
