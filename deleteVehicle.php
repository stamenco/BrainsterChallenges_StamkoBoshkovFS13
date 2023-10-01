<?php

require_once(__DIR__ . '/functions.php');

session_start();
notauth();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once(__DIR__ . '/Database/db.php');

    $sql = "DELETE FROM registrations WHERE id = :id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $_POST['delete']]);

    $_SESSION['success'] = 'Vehicle deleted!';
    header('Location: admins.php');
} else {
    header('Location: admins.php');
}
