<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . '/Database/db.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE email = :email LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);

    if ($stmt->rowCount() == 1) {
        $admin = $stmt->fetch();
        if (password_verify($password, $admin['password'])) {
            $_SESSION['email'] = $admin['email'];

            header('Location: admins.php');
        } else {
            $_SESSION['error'] = 'Wrong email and password combination!';

            header('Location: login.php');
            die();
        }
    } else {
        $_SESSION['error'] = 'Wrong credentials!';

        header('Location: login.php');
        die();
    }
} else {
    header('Location: index.php');
    die();
}
