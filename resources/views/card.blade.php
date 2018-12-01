<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/vue-material@beta/dist/theme/default.css">
    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <style>
        body{
            background-color : white;
            color : black;
        }
        .padd{
            padding-top: 50px;
        }
        .padd_r{
            padding-bottom: 100px;
            padding-right: 300px;
            font-size:1.3em;
        }
        .float_left{
            float:left;
        }
        #write{
            text-align: right;
        }
        .wrap {
            position: relative;
        }
        .second {
            position: absolute;
            top: 100px;
            right: 130px;
        }
        .paddpx{
            padding-left:50%;
        }

    </style>
</head>

<body id="page-top" >
<div class= "padd" id="app">
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="/">Po Do</a>
            <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfoli">Portfolio</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3" href="{{ route('todoList') }}">Todo Service</a>
                    </li>
                    <div id="app">
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3" href="{{ route('card') }}">모집하기</a>
                        </li>
                    </div>

                </ul>
            </div>
        </div>

        <li class="nav-item mx-0 mx-lg-1" >
            <a class="nav-link py-3 px-0 px-lg-3" href="{{ route('login') }}">login</a>
        </li>
        <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3" href="{{ route('register') }}">sign in </a>
        </li>

    </nav>

    <section class="portfolio " id="portfolio">
        <h1 class="text-center">리스트</h1>
        <div class="container paddpx">
            <a href="#">
            <button class="navbar-toggler navbar-toggler-left text-uppercase bg-primary text-white rounded" type="button" >
                글쓰기
                <i class="fas fa-bars"></i>
            </button>
            </a>
        </div>
        <div class="container">

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <a class="portfolio-item d-block mx-auto">

                        <hello-world-component></hello-world-component>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a class="portfolio-item d-block mx-auto" >

                        <hello-world-component></hello-world-component>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a class="portfolio-item d-block mx-auto">

                        <hello-world-component></hello-world-component>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a class="portfolio-item d-block mx-auto">

                        <hello-world-component></hello-world-component>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a class="portfolio-item d-block mx-auto">

                        <hello-world-component></hello-world-component>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a class="portfolio-item d-block mx-auto">

                        <hello-world-component></hello-world-component>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
