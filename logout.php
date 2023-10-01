<?php

require_once(__DIR__ . '/functions.php');

session_start();
notauth();
session_destroy();

header('Location: index.php');
die();
