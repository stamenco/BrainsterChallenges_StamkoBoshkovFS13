<?php
require("./functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Stamko Boshkov" />

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />

    <!-- Local CSS -->
    <link rel="stylesheet" href="./style.css" />

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/3257d9ad29.js"></script>

    <title>Register</title>
</head>

<body class="background">
    <div class="container-fluid">
        <h1 class="text-primary py-5 text-center">Sign up form</h1>
        <div class="row flex-column">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $email = $_POST["email"];
                $errors = false;
                if (checkEmptyFields($username, $password, $email)) {
                    $errorMsg = "All inputs are required (no empty fields are allowed)";
                    echo "<p class='text-danger text-center'> $errorMsg </p>";
                    $errors = true;
                }
                if (checkUsername($username)) {
                    $errorMsg = "Username cannot contain empty spaces or special signs";
                    echo "<p class='text-danger text-center'> $errorMsg </p>";
                    $errors = true;
                }
                if (checkPassword($password)) {
                    $errorMsg = 'Password must have at least one number, one special sign and one uppercase letter';
                    echo "<p class='text-danger text-center'> $errorMsg </p>";
                    $errors = true;
                }
                if (checkEmail($email)) {
                    $errorMsg = 'Please insert a valid email with least 5 characters before @';
                    echo "<p class='text-danger text-center'> $errorMsg </p>";
                    $errors = true;
                }

                if (!$errors) {
                    userRegistration($username, $password, $email);
                }
            }
            ?>
            <div class="mx-auto">
                <form action="register.php" method="POST">
                    <div class="form-row text-center">
                        <div class="form-group mb-2 col-8 mx-auto">
                            <label class="text-light text-right" for="username">Username</label>
                            <input class="form-control bg-dark text-light" type="text" id="username" name="username">
                        </div>
                        <div class="form-group mb-2 col-8 mx-auto">
                            <label class="text-light text-right" for="password">Password</label>
                            <input class="form-control bg-dark text-light" type="password" id="password" name="password">
                        </div>
                        <div class="form-group mb-2 col-8 mx-auto">
                            <label class="text-light text-right" for="email">Email</label>
                            <input class="form-control bg-dark text-light" type="text" id="email" name="email">
                        </div>
                        <div class="form-group mb-2 col-8 mt-4 mx-auto">
                            <button class="btn btn-primary w-50">Register</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>

    <!-- JQUERY CDN LINK -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- POPPER JS CDN LINK  -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP JS CDN LINK  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="./js/main.js"></script>
</body>

</html>