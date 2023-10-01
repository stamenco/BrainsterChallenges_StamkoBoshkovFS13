<?php

require_once(__DIR__ . '/functions.php');

session_start();
notauth();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: admins.php');
    die;
}

require_once(__DIR__ . '/Database/db.php');

$sqlChassis = 'SELECT vehicle_chassis_number FROM registrations';
$stmtChassis = $pdo->prepare($sqlChassis);
$stmtChassis->execute();

$flag = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['action'] == 'add') {

        if (
            empty($_POST['vehicleModel']) || empty($_POST['chassisNumber']) || empty($_POST['registrationNumber']) || empty($_POST['registrationTo'])
            || empty($_POST['vehicleType']) || empty($_POST['productionYear']) || empty($_POST['fuelType'])
        ) {
            $flag = false;
            $_SESSION['error'] = 'All fields are required!';
            header('Location: admins.php');
            die();
        }
        while ($chassis = $stmtChassis->fetch()) {
            if ($_POST['chassisNumber'] == $chassis['vehicle_chassis_number']) {
                $flag = false;
                $_SESSION['error'] = 'A vehicle with the same chassis number already exists';
                header('Location: admins.php');
                die();
            }
        }
        if ($flag) {
            $sql = "INSERT INTO registrations (vehicle_model, vehicle_type, vehicle_chassis_number, vehicle_production_year, registration_number, fuel_type, registration_to) 
                    VALUES(:vehicle_model, :vehicle_type, :vehicle_chassis_number, :vehicle_production_year, :registration_number, :fuel_type, :registration_to)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                [
                    'vehicle_model' => $_POST['vehicleModel'],
                    'vehicle_type' => $_POST['vehicleType'],
                    'vehicle_chassis_number' => $_POST['chassisNumber'],
                    'vehicle_production_year' => $_POST['productionYear'],
                    'registration_number' => $_POST['registrationNumber'],
                    'fuel_type' => $_POST['fuelType'],
                    'registration_to' => $_POST['registrationTo'],
                ]
            );

            $_SESSION['success'] = 'Vehicle added!';
            header('Location: admins.php');
        }
    }
}
