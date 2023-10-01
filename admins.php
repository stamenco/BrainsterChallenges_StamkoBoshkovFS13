<?php

require_once(__DIR__ . '/functions.php');

session_start();
notauth();

require_once(__DIR__ . '/Database/db.php');

error_reporting(0);

$sqlModel = 'SELECT model FROM vehicle_models';
$stmtModel = $pdo->prepare($sqlModel);
$stmtModel->execute();

$sqlType = 'SELECT type FROM vehicle_types';
$stmtType = $pdo->prepare($sqlType);
$stmtType->execute();

$sqlFuel = 'SELECT fuel FROM fuel_types';
$stmtFuel = $pdo->prepare($sqlFuel);
$stmtFuel->execute();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['action'] == 'search') {

        $sqlSearch = 'SELECT * FROM registrations WHERE vehicle_model LIKE :model OR registration_number LIKE :registration OR vehicle_chassis_number LIKE :chassis';
        $stmtSearch = $pdo->prepare($sqlSearch);
        $stmtSearch->execute(['model' => $_POST['search'], 'registration' => $_POST['search'], 'chassis' => $_POST['search']]);

        if ($stmtSearch->rowCount() == 0) {

            $_SESSION['error'] = 'There is no such record!';
        }
    }

    if ($_POST['action'] == 'show') {

        $sqlVehicles = 'SELECT * FROM registrations';
        $stmtVehicles = $pdo->prepare($sqlVehicles);
        $stmtVehicles->execute();
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />

    <title>Admins</title>

</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Vehicle Registration</a>
        <p class="mb-0 font-weight-bold">Logged in as <?= $_SESSION['email'] ?></p>
        <a href="logout.php" class="navbar-brand">Logout</a>
    </nav>
    <?php if (isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger mb-0">
            <?= $_SESSION['error'] ?>
        </div>
    <?php }
    unset($_SESSION['error']) ?>

    <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success mb-0">
            <?= ($_SESSION['success']) ?>
        </div>
    <?php }
    unset($_SESSION['success']) ?>
    <div class="jumbotron text-center mb-0">
        <h1 class="display-4">Vehicle Registration</h1>
        <p class="lead">Enter your registration number to check its validity</p>
        <div class="container">
            <form method="POST" action="addVehicle.php" class="text-left font-weight-bold">
                <input type="hidden" name="action" value="add">
                <div class="row">
                    <div class="col">
                        <label class="mt-2" for="vehiclemodel">Vehicle model</label>
                        <select class="form-control" name="vehicleModel" id="vehicleModel">
                            <option value="">Select model</option>
                            <?php while ($model = $stmtModel->fetch()) { ?>
                                <option value="<?= $model['model'] ?>"><?= $model['model'] ?></option>
                            <?php } ?>
                        </select>
                        <label class="mt-2" for="chassisNumber">Vehicle chassis number</label>
                        <input class="form-control" type="text" name="chassisNumber" id="chassisNumber">
                        <label class="mt-2" for="registrationNumber">Vehicle registration number</label>
                        <input class="form-control" type="text" name="registrationNumber" id="registrationNumber">
                        <label class="mt-2" for="registrationRo">Registration to</label>
                        <input class="form-control" type="date" name="registrationTo" id="registrationTo" placeholder="dd/mm/yyyy">
                    </div>
                    <div class="col">
                        <label class="mt-2" for="vehicleType">Vehicle type</label>
                        <select class="form-control" name="vehicleType" id="vehicleType">
                            <option value="">Select type</option>
                            <?php while ($type = $stmtType->fetch()) { ?>
                                <option value="<?= $type['type'] ?>"><?= $type['type'] ?></option>
                            <?php } ?>
                        </select>
                        <label class="mt-2" for="productionYear">Vehicle production year</label>
                        <input class="form-control" type="date" name="productionYear" id="productionYear" placeholder="dd/mm/yyyy">
                        <label class="mt-2" for="fuelType">Fuel type</label>
                        <select class="form-control" name="fuelType" id="fuelType">
                            <option value="">Select fuel</option>
                            <?php while ($fuel = $stmtFuel->fetch()) { ?>
                                <option value="<?= $fuel['fuel'] ?>"><?= $fuel['fuel'] ?></option>
                            <?php } ?>
                        </select>
                        <label class="mt-2 invisible" for="button1">button</label>
                        <button class="btn btn-block btn-primary" id="button1" type="submit" formaction="addVehicle.php" formmethod="POST">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container-fluid">
        <table class="table table-bordered">
            <thead>
                <tr class="bg-light">
                    <th colspan="9" class="text-right">
                        <form class="form-inline d-inline" method="POST" action="admins.php">
                            <input type="hidden" name="action" value="search">
                            <input class="form-control d-inline w-50 " type="text" name="search" id="search" placeholder="Search...">
                            <button type="submit" formaction="admins.php" formmethod="POST" class="btn btn-primary p-2 mb-1 mx-3">Search</button>
                        </form>
                        <form class="form-inline d-inline" method="POST" action="admins.php">
                            <input type="hidden" name="action" value="show">
                            <input type="hidden" name="show">
                            <button type="submit" formaction="admins.php" formmethod="POST" class="btn btn-primary p-2 mb-1 mx-3">Show all</button>
                        </form>
                    </th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">vehicle model</th>
                    <th scope="col">vehicle type</th>
                    <th scope="col">vehicle chassis number</th>
                    <th scope="col">vehicle production year</th>
                    <th scope="col">registration number</th>
                    <th scope="col">fuel type</th>
                    <th scope="col">registration to</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($_POST['action'] == 'search') {
                    while ($searchResult = $stmtSearch->fetch()) {
                        $vehicleDate = $searchResult['registration_to'];
                        $vehicleDate = explode('-', $vehicleDate);
                        $currentDate = date('Y-m-d');
                        $currentDate = explode('-', $currentDate);
                        $monthLimit = $currentDate[0] . '-' . $currentDate[1] + 1;
                        $vehicleLimit = $vehicleDate[0] . '-' . $vehicleDate[1];
                        $monthDue = $vehicleDate[0] == $currentDate[0] && $vehicleDate[1] <= $currentDate[1];
                        $yearDue = $vehicleDate[0] < $currentDate[0];


                ?>
                        <tr <?= $vehicleLimit == $monthLimit ? "class='bg-warning'" : ""; ?> <?= $yearDue || $monthDue ? "class='bg-danger'" : ""; ?>>
                            <th scope="row"><?= $searchResult['id'] ?> </th>
                            <td><?= $searchResult['vehicle_model'] ?></td>
                            <td><?= $searchResult['vehicle_type'] ?></td>
                            <td><?= $searchResult['vehicle_chassis_number'] ?></td>
                            <td><?= $searchResult['vehicle_production_year'] ?></td>
                            <td><?= $searchResult['registration_number'] ?></td>
                            <td><?= $searchResult['fuel_type'] ?></td>
                            <td><?= $searchResult['registration_to'] ?></td>
                            <td>
                                <form class="d-inline" method="POST" action="deleteVehicle.php">
                                    <input type="hidden" name="delete" value="<?= $searchResult['id'] ?>">
                                    <button class="btn btn-danger p-2 <?= $yearDue || $monthDue ? "bg-dark" : "" ?>" type="submit" formaction="deleteVehicle.php" formmethod="POST">Delete</button>
                                </form>
                                <form class="d-inline" method="POST" action="editVehicle.php">
                                    <input type="hidden" name="edit" value="<?= $searchResult['id'] ?>">
                                    <button class="btn btn-warning p-2 <?= $vehicleLimit == $monthLimit ? "bg-dark text-light" : "" ?>" type="submit" formaction="editVehicle.php" formmethod="POST">Edit</button>
                                </form>
                                <form class="d-inline  <?= $vehicleLimit == $monthLimit || $yearDue || $monthDue ? "visible" : "invisible" ?>" method="POST" action="extendRegistration.php">
                                    <input type="hidden" name="extend" value="<?= $searchResult['id'] ?>">
                                    <button class="btn btn-success p-2" type="submit" formaction="extendRegistration.php" formmethod="POST">Extend</button>
                                </form>
                            </td>
                        </tr>
                <?php }
                } ?>
                <?php if ($_POST['action'] == 'show') {
                    while ($vehiclesResult = $stmtVehicles->fetch()) {
                        $vehicleDate = $vehiclesResult['registration_to'];
                        $vehicleDate = explode('-', $vehicleDate);
                        $currentDate = date('Y-m-d');
                        $currentDate = explode('-', $currentDate);
                        $monthLimit = $currentDate[0] . '-' . $currentDate[1] + 1;
                        $vehicleLimit = $vehicleDate[0] . '-' . $vehicleDate[1];
                        $monthDue = $vehicleDate[0] == $currentDate[0] && $vehicleDate[1] <= $currentDate[1];
                        $yearDue = $vehicleDate[0] < $currentDate[0];

                ?>
                        <tr <?= $vehicleLimit == $monthLimit ? "class='bg-warning'" : ""; ?> <?= $yearDue || $monthDue ? "class='bg-danger'" : ""; ?>>
                            <th scope="row"><?= $vehiclesResult['id'] ?> </th>
                            <td><?= $vehiclesResult['vehicle_model'] ?></td>
                            <td><?= $vehiclesResult['vehicle_type'] ?></td>
                            <td><?= $vehiclesResult['vehicle_chassis_number'] ?></td>
                            <td><?= $vehiclesResult['vehicle_production_year'] ?></td>
                            <td><?= $vehiclesResult['registration_number'] ?></td>
                            <td><?= $vehiclesResult['fuel_type'] ?></td>
                            <td><?= $vehiclesResult['registration_to'] ?></td>
                            <td>
                                <form class="d-inline" method="POST" action="deleteVehicle.php">
                                    <input type="hidden" name="delete" value="<?= $vehiclesResult['id'] ?>">
                                    <button class="btn btn-danger p-2 <?= $yearDue || $monthDue ? "bg-dark" : "" ?> " type="submit" formaction="deleteVehicle.php" formmethod="POST">Delete</button>
                                </form>
                                <form class="d-inline" method="POST" action="editVehicle.php">
                                    <input type="hidden" name="edit" value="<?= $vehiclesResult['id'] ?>">
                                    <button class="btn btn-warning p-2 <?= $vehicleLimit == $monthLimit ? "bg-dark text-light" : "" ?> " type="submit" formaction="editVehicle.php" formmethod="POST">Edit</button>
                                </form>
                                <form class="d-inline <?= $vehicleLimit == $monthLimit || $yearDue || $monthDue ? "visible" : "invisible" ?>" method="POST" action="extendRegistration.php">
                                    <input type="hidden" name="extend" value="<?= $vehiclesResult['id'] ?>">
                                    <button class="btn btn-success p-2" type="submit" formaction="extendRegistration.php" formmethod="POST">Extend</button>
                                </form>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <!-- JQUERY CDN LINK -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- POPPER JS CDN LINK  -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP JS CDN LINK  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>