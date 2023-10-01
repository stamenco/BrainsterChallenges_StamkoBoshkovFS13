<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=challenge_17_php_pdo;", "root", "", [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
} catch (PDOException $e) {
    echo "Database down";
    die();
}
