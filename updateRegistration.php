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

    if ($_POST['action'] == 'extend') {

        if (
            empty($_POST['registrationTo'])
        ) {
            $flag = false;
            $_SESSION['error'] = 'All fields are required!';
            header('Location: extendRegistration.php');
            die();
        }

        if ($flag) {
            $sql = "UPDATE registrations SET registration_to = :registration_to WHERE id = :id ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                [
                    'id' => $_POST['id'],
                    'registration_to' => $_POST['registrationTo']
                ]
            );

            $_SESSION['success'] = 'Registration updated!';
            header('Location: admins.php');
        }
    }
}
