<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ URL::asset('css/todo_detail.css')}}" rel="stylesheet" >


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
        .pad2{
            padding-bottom: 20px;
        }
        .wid{
            width:200px;
            height: 50px;

        }
        .paddpx{
            text-align: center;
            padding-top: 80px;
            padding-bottom: 20px;
        }

    </style>
</head>

<body id="page-top" >
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

        @guest
            <li class="nav-item mx-0 mx-lg-1" >
                <a class="nav-link py-3 px-0 px-lg-3" href="{{ route('login') }}">login</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
                <a class="nav-link py-3 px-0 px-lg-3" href="{{ route('register') }}">sign in </a>
            </li>
        @endguest
        @auth
            <li class="nav-item mx-0 mx-lg-1" >

                {{--<a class="nav-link py-3 px-0 px-lg-3" href="{{ route('logout') }}">logout</a>--}}
                <a class="nav-link py-3 px-0 px-lg-3" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
                <a class="nav-link py-3 px-0 px-lg-3" href="">my page </a>
            </li>
        @endauth

    </nav>

    <section class="portfolio " id="portfolio">
        <div class="container paddpx">
            <a href="{{ route('write') }}">
                <button class="navbar-toggler navbar-toggler-left bg-primary text-white rounded wid" type="button" >
                    모임 만들기

                </button>
            </a>
        </div>
        <div class="row">
            @foreach($meetings as $meeting)
                <div class="col-md-6 col-lg-4 pad2">
                    <div class="card">
                        <img class="card-img-top" src="//placeimg.com/280/180/tech" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title border-bottom pb-3">{{ $meeting->title }}<a href="#" class="float-right d-inline-flex share"><i class="fas fa-share-alt text-primary"></i></a></h5>
                            <p class="card-text">{{$meeting->content}}</p>
                            {{--마감기한--}}
                            <span class="media-meta pull-right"> {{$meeting->due_date}}까지</span>
                            {{--신청버튼(링크 알아서 넣으셈)--}}
                            <button type="button" class="btn btn-success btn-sm">신청</button>

                            <p>참여인원 / 총인원 : {{$meeting->join_number}} / {{$meeting->limit}}</p>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </section>




</body>
</html>
