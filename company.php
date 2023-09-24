<?php

if (isset($_GET['id'])) {
    try {
        $conn = new PDO("mysql:dbname=challenge_16_php_pdo;host=localhost;", "root", "", [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    } catch (PDOException $e) {
        echo "Something went wrong!!!";
        die();
    }

    $sql = "SELECT * FROM company_webs WHERE id=:id";
    $statement = $conn->prepare($sql);
    $statement->execute(['id' => $_GET['id']]);
    $row = $statement->fetch();

    if ($row == false) {
        header("Location: index.php");
        die();
    }
} else {
    header("Location: index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <!-- Local CSS -->
    <link rel="stylesheet" href="./css/style.css" />

    <title>Company WebPage</title>

    <style>
        html {
            scroll-padding-top: 56px !important;
        }

        .my-background {
            background-image: url("<?= $row['cover_img'] ?>") !important;
            background-color: #cccccc;
            height: 100vh;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        img:hover {
            cursor: pointer !important;
        }

        .backdrop-cust {
            backdrop-filter: blur(6px) !important;
            background: linear-gradient(rgba(0, 0, 0, 0.6),
                    rgba(0, 0, 0, 0.6));
        }
    </style>
</head>

<body>
    <!-- -->
    <nav class="navbar navbar-expand-lg fixed-top shadow-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Webster</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#top-view">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about-us">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services-products"><?= ucfirst($row['offer']) ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contacts</a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="top-view" class="container-fluid">
        <div class="row">
            <div class="col-12 bg-secondary my-background">
                <div class="row">
                    <div class="col-4 offset-4 text-center mt-5 pt-5">
                        <p class="h1 py-5"><span class="p-4 rounded-pill text-light backdrop-cust"><?= $row['main_title'] ?></span></p>
                        <p class="h1 py-5 my-5"></p>
                        <p class="h3 py-5"><span class="p-4 rounded-pill text-light backdrop-cust"><?= $row['subtitle'] ?></span></p>
                        <p class="h1 py-5 my-5"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-4 text-center">
                <p id="about-us" class="h2 pt-4 pb-3">About us</p>
                <p class="pb-2"><?= $row['about_you'] ?></p>
            </div>
            <div class="col-4 offset-4 border-bottom border-secondary my-3"></div>
            <div class="col-4 offset-4 text-center">
                <p class="">Tel: <?= $row['phone'] ?></p>
                <p class="">Location: <?= $row['location'] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <p id="services-products" class="h3"><?= ucfirst($row['offer']) ?></p>
                <div class="row">
                    <div class="col-4">
                        <div class="col">
                            <div id="accordion1">
                                <div class="card">
                                    <div class="card-header p-0 m-0" id="headingOne">
                                        <img class="card-img-top" src="<?= $row['img_url_1'] ?>" alt="Card image cap">
                                    </div>
                                    <div class="card-body bg-dark text-light">
                                        <?= $row['description_1'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="col">
                            <div id="accordion2">
                                <div class="card">
                                    <div class="card-header p-0 m-0" id="headingTwo">
                                        <img class="card-img-top" src="<?= $row['img_url_2'] ?>" alt="Card image cap">
                                    </div>
                                    <div class="card-body bg-dark text-light">
                                        <?= $row['description_2'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="col">
                            <div id="accordion3">
                                <div class="card">
                                    <div class="card-header p-0 m-0" id="headingThree">
                                        <img class="card-img-top" src="<?= $row['img_url_3'] ?>" alt="Card image cap">
                                    </div>
                                    <div class="card-body bg-dark text-light">
                                        <?= $row['description_3'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col border-bottom border-secondary my-5"></div>
                <div class="row">
                    <div class="col-6">
                        <p id="contact" class="h3">Contact</p>
                        <p><?= $row['company_description'] ?></p>
                    </div>
                    <div class="col-6">
                        <form>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="name">
                            </div>
                            <div class="form-group">
                                <label for="message">Example textarea</label>
                                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                            </div>
                            <div class="col text-center pb-3">
                                <button type="submit" class="btn btn-info align-self-center">Send</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col text-center bg-dark">
                <p class="pb-2 m-0 text-light">Copyright by Stamko @ Brainster</p>
                <p class="pt-2 m-0">
                    <a href="<?= $row['linkedin'] ?>">LinkedIn</a>
                    <a href="<?= $row['facebook'] ?>">Facebook</a>
                    <a href="<?= $row['twitter'] ?>">Twitter</a>
                    <a href="<?= $row['instagram'] ?>">Instagram</a>
                </p>
            </div>
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