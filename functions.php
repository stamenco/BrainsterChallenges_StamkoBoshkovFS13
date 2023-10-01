<?php

function auth()
{
    if (isset($_SESSION['email'])) {
        header('Location: admins.php');
    }
}

function notauth()
{
    if (!isset($_SESSION['email'])) {
        header('Location: index.php');
    }
}
