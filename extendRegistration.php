<?php

require_once(__DIR__ . '/functions.php');

session_start();
notauth();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: admins.php');
    die();
}

require_once(__DIR__ . '/Database/db.php');

$sql = "SELECT * FROM registrations WHERE id = :id LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $_POST['extend']]);
$vehicle = $stmt->fetch();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />

    <title>Extend registration</title>

</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Vehicle Registration</a>
        <p class="mb-0 font-weight-bold">Logged in as <?= $_SESSION['email'] ?></p>
        <a href="logout.php" class="navbar-brand">Logout</a>
    </nav>
    <div class="jumbotron text-center mb-0">
        <h1 class="display-4">Edit registration</h1>
        <div class="container">
            <form method="POST" action="updateRegistration.php" class="text-left font-weight-bold">
                <input type="hidden" name="action" value="extend">
                <input type="hidden" name="id" value="<?= $vehicle['id'] ?>">
                <div class="row">
                    <div class="col">
                        <label class="mt-2" for="vehiclemodel">Vehicle model</label>
                        <input readonly type="text" class="form-control" name="vehicleModel" id="vehicleModel" value="<?= $vehicle['vehicle_model'] ?>"><?= $vehicle['vehicle_model'] ?></input>
                        <label class="mt-2" for="chassisNumber">Vehicle chassis number</label>
                        <input readonly class="form-control" type="text" name="chassisNumber" id="chassisNumber" value="<?= $vehicle['vehicle_chassis_number'] ?>">
                        <label class="mt-2" for="registrationNumber">Vehicle registration number</label>
                        <input readonly class="form-control" type="text" name="registrationNumber" id="registrationNumber" value="<?= $vehicle['registration_number'] ?>">
                    </div>
                    <div class="col">
                        <label class="mt-2" for="registrationTo">Registration to</label>
                        <input class="form-control" type="date" name="registrationTo" id="registrationTo" value="<?= $vehicle['registration_to'] ?>">

                        <label class="mt-2 invisible" for="button2">button</label>
                        <button class="btn btn-block btn-primary" id="button2" type="submit" formaction="updateRegistration.php" formmethod="POST">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- JQUERY CDN LINK -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- POPPER JS CDN LINK  -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP JS CDN LINK  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>