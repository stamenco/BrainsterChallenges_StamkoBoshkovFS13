<?php
$error = '';
if (isset($_GET['status'])) {
    if ($_GET['status'] == "error") {
        if ($_GET['reason'] == "fieldsempty") {
            $error = "<b>* All fields are required</b>";
        }
    }
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

    <title>Create WebPage</title>
</head>

<body>
    <!-- -->
    <div class="container-fluid custom-background background-img-2">
        <div class="row justify-content-center">
            <div class="col-10">
                <h1 class="text-center pt-5 pb-2">You are one step away from your webpage</h1>
                <div class="form-group">
                    <form class="" method="POST" action="insert.php">
                        <div class="row">
                            <div class="col-4">
                                <div class="border border-secondary rounded-lg p-4 mb-4 form-bg">

                                    <label class="" for="cover-img">Cover image URL</label>
                                    <input class="form-control" type="text" id="cover-img" name="cover-img">

                                    <label class="pt-4" for="main-title">Main Title of Page</label>
                                    <input class="form-control" type="text" id="main-title" name="main-title">

                                    <label class="pt-4" for="subtitle">Subtitle of Page</label>
                                    <input class="form-control" type="text" id="subtitle" name="subtitle">

                                    <label class="pt-4" for="about">Something about you</label>
                                    <textarea class="form-control" type="textarea" rows="3" id="about" name="about"></textarea>

                                    <label class="pt-4" for="phone">Your telephone number</label>
                                    <input class="form-control" type="number" id="phone" name="phone">

                                    <label class="pt-4" for="location">Location</label>
                                    <input class="form-control mb-5" type="text" id="location" name="location">

                                </div>
                                <div class="border border-secondary rounded-lg p-4 form-bg">

                                    <label class="" for="offer">Do you provide servives or products?</label>
                                    <select class="form-control" id="offer" name="offer">
                                        <option selected disabled value="">Choose one option</option>
                                        <option value="services">Services</option>
                                        <option value="products">Products</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="border border-secondary rounded-lg p-4 form-bg">
                                    <p class="mb-4 font-weight-bold">Provide an image and description for your service/product</p>

                                    <label class="" for="catalogue-img-1">Image URL</label>
                                    <input class="form-control" type="text" id="catalogue-img-1" name="catalogue-img-1">

                                    <label class="pt-4" for="catalogue-desc-1">Description of service/product</label>
                                    <textarea class="form-control" type="textarea" rows="3" id="catalogue-desc-1" name="catalogue-desc-1"></textarea>

                                    <label class="pt-4" for="catalogue-img-2">Image URL</label>
                                    <input class="form-control" type="text" id="catalogue-img-2" name="catalogue-img-2">

                                    <label class="pt-4" for="catalogue-desc-2">Description of service/product</label>
                                    <textarea class="form-control" type="textarea" rows="3" id="catalogue-desc-2" name="catalogue-desc-2"></textarea>

                                    <label class="pt-4" for="catalogue-img-3">Image URL</label>
                                    <input class="form-control" type="text" id="catalogue-img-3" name="catalogue-img-3">

                                    <label class="pt-4" for="catalogue-desc-3">Description of service/product</label>
                                    <textarea class="form-control mb-4" type="textarea" rows="3" id="catalogue-desc-3" name="catalogue-desc-3"></textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="border border-secondary rounded-lg p-4 form-bg">
                                    <p class="mb-4 font-weight-bold">Provide a description for your company, something people should be aware of before they contact you:</p>

                                    <textarea class="form-control" type="textarea" rows="3" id="contact-info" name="contact-info"></textarea>

                                    <div class="border-bottom border-dark my-5"></div>

                                    <label class="" for="linkedin">linkedIn</label>
                                    <input class="form-control" type="text" id="linkedin" name="linkedin">

                                    <label class="" for="facebook">Facebook</label>
                                    <input class="form-control" type="text" id="facebook" name="facebook">

                                    <label class="" for="twitter">Twitter</label>
                                    <input class="form-control" type="text" id="twitter" name="twitter">

                                    <label class="" for="instagram">Instagram</label>
                                    <input class="form-control" type="text" id="instagram" name="instagram">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 offset-3">
                                <div class="row pt-5">
                                    <div class="col pt-4 text-center">
                                        <p class="bg-dark text-danger"><?= $error; ?></p>
                                        <button type="submit" class="btn btn-dark btn-lg btn-block">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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