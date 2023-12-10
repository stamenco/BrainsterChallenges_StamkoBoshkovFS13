<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <!-- Latest compiled and minified Bootstrap 4.6 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- CSS script -->
    <link rel="stylesheet" href=" {{ URL::asset('css/style.css'); }} ">
    <!-- Latest Font-Awesome CDN -->
    <script src="https://kit.fontawesome.com/64087b922b.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="jumbotron text-white text-center bg-transparent">
        <h1>BUSINESS CASUAL</h1>
    </div>

    <nav class="navbar navbar-expand-lg  text-white d-flex align-items-center justify-content-center">
        <div class=" text-center " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto text-white">
                <li class="nav-item active mx-2">
                    <a class="nav-link text-warning" href="#">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href=" {{ route('login') }}">LOG IN</a>
                </li>
                @if (null !== (session('name')) && null !== (session('surname')))
                <li class="nav-item mx-2">
                    <a class="nav-link" href=" {{ route('clear') }}">LOG OUT</a>
                </li>
                @endif
            </ul>
        </div>
    </nav>

    <div class="container content vh-50 mb-5">
        <img id="cafeImg" src="/img/cafe.jpg" alt="">

        <div class="card text-center">
            <h4 class="font-weight-normal mt-2 mb-0">Lorem ipsum</h4>
            <h2 class="font-weight-normal my-2">Lorem ipsum</h2>
            <p class="px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sit quam voluptates maiores iste libero esse fugiat quisquam officia nam quae itaque vitae laudantium atque, odit consequatur minus rem voluptas ducimus. Libero consectetur dolorum veniam reiciendis impedit id enim ad!</p>
            <button class="buttonVisit btn btn-inline btn-warning">Visit us today</button>
        </div>
    </div>

    <div class="wrapper2 container-fluid py-5 mb-5">
        <div class="container text-center content2 p-3">
            <h5>Our promise</h5>
            @if (null !== (session('name')) && null !== (session('surname')))
            <h2 class="font-weight-normal"> To {{ session('name') . ' ' . session('surname') }}</h2>
            @else
            <h2 class="font-weight-normal">To YOU</h2>
            @endif
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid dolores tenetur facilis sint ipsa qui reiciendis laborum dicta. Fugit cum ea architecto, labore saepe rerum dolore est temporibus pariatur aliquid eum iste facere quisquam necessitatibus nemo voluptatibus enim, totam repudiandae ratione tempora reiciendis nostrum dignissimos placeat perspiciatis? Saepe, nulla laboriosam.</p>
        </div>
    </div>

    <footer class="text-center text-white">
        <p class="m-0 p-2">Copyright &copy Your Website 2023</p>
    </footer>


    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>

</html>