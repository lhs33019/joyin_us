<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

        <link rel="stylesheet" href="css/bootstrap.min.css">

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{ URL::asset('css/todo_main.css')}}" rel="stylesheet" >
        <style>

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }


            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .card{margin-top:20px;border-right:5px solid #fccb48;}
            #topline{background-color:#32bcb8;}

        </style>
    </head>
    <body>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <a class="navbar-brand" href="{{ url('/') }}">TODO List</a>
                        <form class="navbar-form navbar-left" method="POST" action="{{ route('create_todo_List') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="생성할 List 이름.." name="name">
                            </div>
                            <button type="submit" class="btn btn-default">생성</button>
                        </form>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <nav class="navbar navbar-default">
            <a href="/"><button class="btn btn-default" >홈으로</button></a>
            </nav>
            <div class="container-fluid">
                <div class="row" style="margin-top:20px;">
                    @foreach($lists as $list)
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <span class="card-text " id="topline" style="font-size:12px;color:white; padding:1px">TODO : {{$list->todo_count}}개</span>
                                            <br>
                                            <a href="{{route('todoList')}}/{{$list->id}}"><p class="card-text" style="font-weight: 700;color:#404041;line-height:30px;font-size: 20px;">
                                                    {{$list->name}}
                                                </p></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </div>
    <script>
        $(function () {
            $('[data-tooltip="tooltip"]').tooltip()
        });
    </script>
    <br/>
    <div class="box">
        <div class="notifications">
            <i class="fa fa-bell"></i>
            <span class="num">{{$count}}</span>
            <ul id="uls" onload="window.self.focus();">
                @foreach($todos as $todo)
                <li class="icon" >
                    <span class="icon"><i class="fa fa-user"></i></span>
                    <span class="text">[{{$todo->title}}]-{{$todo->content}} 마감시간 경과</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>
