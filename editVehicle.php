<?php

require_once(__DIR__ . '/functions.php');

session_start();
notauth();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: admins.php');
    die();
}

require_once(__DIR__ . '/Database/db.php');

$sqlModel = 'SELECT model FROM vehicle_models';
$stmtModel = $pdo->prepare($sqlModel);
$stmtModel->execute();

$sqlType = 'SELECT type FROM vehicle_types';
$stmtType = $pdo->prepare($sqlType);
$stmtType->execute();

$sqlFuel = 'SELECT fuel FROM fuel_types';
$stmtFuel = $pdo->prepare($sqlFuel);
$stmtFuel->execute();


$sql = "SELECT * FROM registrations WHERE id = :id LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $_POST['edit']]);
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

    <title>Edit vehicle</title>

</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Vehicle Registration</a>
        <p class="mb-0 font-weight-bold">Logged in as <?= $_SESSION['email'] ?></p>
        <a href="logout.php" class="navbar-brand">Logout</a>
    </nav>
    <div class="jumbotron text-center mb-0">
        <h1 class="display-4">Edit vehicle</h1>
        <div class="container">
            <form method="POST" action="updateVehicle.php" class="text-left font-weight-bold">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?= $vehicle['id'] ?>">
                <div class="row">
                    <div class="col">
                        <label class="mt-2" for="vehiclemodel">Vehicle model</label>
                        <select class="form-control" name="vehicleModel" id="vehicleModel">
                            <option value="<?= $vehicle['vehicle_model'] ?>"><?= $vehicle['vehicle_model'] ?></option>
                            <?php while ($model = $stmtModel->fetch()) { ?>
                                <option value="<?= $model['model'] ?>"><?= $model['model'] ?></option>
                            <?php } ?>
                        </select>
                        <label class="mt-2" for="chassisNumber">Vehicle chassis number</label>
                        <input readonly class="form-control" type="text" name="chassisNumber" id="chassisNumber" value="<?= $vehicle['vehicle_chassis_number'] ?>">
                        <label class="mt-2" for="registrationNumber">Vehicle registration number</label>
                        <input class="form-control" type="text" name="registrationNumber" id="registrationNumber" value="<?= $vehicle['registration_number'] ?>">
                    </div>
                    <div class="col">
                        <label class="mt-2" for="vehicleType">Vehicle type</label>
                        <select class="form-control" name="vehicleType" id="vehicleType">
                            <option value="<?= $vehicle['vehicle_type'] ?>"><?= $vehicle['vehicle_type'] ?></option>
                            <?php while ($type = $stmtType->fetch()) { ?>
                                <option value="<?= $type['type'] ?>"><?= $type['type'] ?></option>
                            <?php } ?>
                        </select>
                        <label class="mt-2" for="productionYear">Vehicle production year</label>
                        <input class="form-control" type="text" name="productionYear" id="productionYear" placeholder="dd/mm/yyyy" value="<?= $vehicle['vehicle_production_year'] ?>">
                        <label class="mt-2" for="fuelType">Fuel type</label>
                        <select class="form-control" name="fuelType" id="fuelType">
                            <option value="<?= $vehicle['fuel_type'] ?>"><?= $vehicle['fuel_type'] ?></option>
                            <?php while ($fuel = $stmtFuel->fetch()) { ?>
                                <option value="<?= $fuel['fuel'] ?>"><?= $fuel['fuel'] ?></option>
                            <?php } ?>
                        </select>
                        <label class="mt-2 invisible" for="button2">button</label>
                        <button class="btn btn-block btn-primary" id="button2" type="submit" formaction="updateVehicle.php" formmethod="POST">Submit</button>
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