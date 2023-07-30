<?php

declare(strict_types=1);

function checkEmptyFieldsUserPass(string $username, string $password): bool
{
    return (empty($username) || empty($password));
}

function checkEmptyFields(string $username, string $password, string $email): bool
{
    return (empty($username) || empty($password) || empty($email));
}

function checkUsername(string $username): bool
{
    // return (!empty($username) && !preg_match("/^[A-Za-zZ0-9']$/", $username));
    // return (!empty($username) && !preg_match('/^[A-Za-z0-9]$/', $username));
    // $regularExpression = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{4,}$/";
    // return (!empty($username) && !preg_match($regularExpression, $username));
    // return true;


    return (!empty($username) && !preg_match("/^[A-Za-zZ0-9']*$/", $username));
    // if (preg_match("^/[a-zA-Z0-9]+$/", $username)) {
    //     return true;
    // } elseif (preg_match("/^[^ ].* .*[^ ]$/", $username)) {
    //     return true;
    // }
    // return false;
}

function checkPassword(string $password): bool
{
    $regularExpression = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{4,}$/";
    return (!empty($password) && !preg_match($regularExpression, $password));
}

function checkEmail(string $email): bool
{
    return ((!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) || (strpos($email, '@') < 5));
}

function userRegistration(string $username, string $password, string $email): string
{
    $flagUsername = false;
    $flagEmail = false;
    $users = explode(PHP_EOL, trim(file_get_contents('users.txt')));

    $userEmail = '';
    $userUsername = '';
    $userPassword = '';

    foreach ($users as $user) {
        $explodeByComma = explode(',', $user);
        $userEmail = $explodeByComma[0];
        $userPass = explode("=", $explodeByComma[1]);
        $userUsername = $userPass[0];
        $userPassword = $userPass[1];

        if ($username === $userUsername) {
            $flagUsername = true;
        }
        if ($email === $userEmail) {
            $flagEmail = true;
        }
    }

    if ($flagUsername) {
        $errorMsg = 'Username Taken';
        echo "<p class='text-danger text-center'> $errorMsg </p>";
    } elseif ($flagEmail) {
        $errorMsg = 'A user with this email already exists';
        echo "<p class='text-warning text-center'> $errorMsg </p>";
    } else {

        $userData = "$email,$username=" . password_hash($password, PASSWORD_DEFAULT);
        file_put_contents('users.txt', $userData . PHP_EOL, FILE_APPEND);

        return header("Location: dashboard.php?user={$username}");
    }

    return '';
}

function checkLogin($username, $password): string
{
    $users = explode(PHP_EOL, trim(file_get_contents('users.txt')));

    $userUsername = '';
    $userPassword = '';

    foreach ($users as $user) {
        $explodeByComma = explode(',', $user);
        $userPass = explode("=", $explodeByComma[1]);
        $userUsername = $userPass[0];
        $userPassword = $userPass[1];

        if ($username === $userUsername && password_verify($password, $userPassword)) {
            return header("Location: dashboard.php?user={$username}");
        }
    }

    return "<p class='text-danger text-center'> Wrong Credentials!</p>";
}
