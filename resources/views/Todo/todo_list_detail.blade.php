<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

   <!-- <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}"> -->

    <script src="{{ URL::asset('js/todo_detail.js')}}"></script>
    <link href="{{ URL::asset('css/todo_detail.css')}}" rel="stylesheet" >


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://momentjs.com/downloads/moment-with-locales.js"></script>
    <script src="http://momentjs.com/downloads/moment-timezone-with-data.js"></script>

    <script>
        function addNow() {
            nowDate = moment().tz("Asia/Seoul").format('YYYY-MM-DD');
            nowTime = moment().tz("Asia/Seoul").format('HH:mm');
            document.getElementById('registration-date').value = nowDate;
            document.getElementById('registration-time').value = nowTime;
            set = setTimeout(function () { addNow(); }, 1000);
        }

        function stopNow() {
            clearTimeout(set);
        }
    </script>

</head>

<body>

<div class="container">
    <div class="row">
        <section class="content">
            <h1>{{$list->name}}</h1>
            <a href="{{route('todoList')}}"><button class="btn btn-outline-warning">돌아가기</button></a>
            <div class="col-md-8 col-md-offset-2">
                <form method="POST" action="{{ url()->current() }}">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="id" value="{{$list->id}}">
                    <button type="submit" class="btn btn-outline-warning" >리스트 전체삭제</button>
                </form>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-success btn-filter" data-target="complete">완료</button>
                                <button type="button" class="btn btn-warning btn-filter" data-target="progress">진행중</button>
                                <button type="button" class="btn btn-danger btn-filter" data-target="over">기간 만료</button>
                                <button type="button" class="btn btn-default btn-filter" data-target="all">전체보기</button>
                            </div>
                        </div>
                        <div class="btn-group">
                            <div class="row">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTodo" data-whatever="@mdo">TODO 추가하기</button>
                                <div class="modal fade" id="createTodo" tabindex="-1" role="dialog" aria-labelledby="createTodoLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title" id="createTodoLabel">새로운 할 일</h4>
                                            </div>
                                            <form action="{{ url()->current().'/todo' }}" method="POST" id="make">
                                                <input type="hidden" name="list_id" value="{{$list->id}}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">제목:</label>
                                                        <input type="text" class="form-control" id="recipient-name" name="title">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">내용:</label>
                                                        <textarea class="form-control" id="message-text" name="content"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">우선순위:</label>
                                                        <input type="number" class="form-control" id="recipient-name" name="seq" value=1 min="1" max="{{$list->todo_count+1}}">
                                                    </div>
                                                    <div class="form-group registration-date">
                                                        <label class="control-label col-sm-3" for="registration-date">올바른 형식만 전송</label>
                                                        <br/>
                                                        <br/>
                                                        <div class="input-group registration-date-time">
                                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                                                            <input class="form-control" name="date" id="registration-date" type="date">
                                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-time" aria-hidden="true"></span></span>
                                                            <input class="form-control" name="time" id="registration-time" type="time">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-default" type="button" onclick="addNow()"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Now</button>
                                                                <button class="btn btn-default" type="button" onclick="stopNow()"><span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span> Stop</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" id="make">Send message</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-container">
                            <table class="table table-filter">
                                <tbody>
                                @foreach($todos as $todo)
                                    <tr data-status="{{$todo->isComplete}}">
                                        <td>
                                            <div class="media">
                                                <a href="#" class="pull-left">
                                                    <img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
                                                </a>
                                                <div class="media-body">
                                                    <span class="media-meta pull-right">{{$todo->due_date}}까지</span>
                                                    <h4 class="title">
                                                        {{$todo->title}}
                                                        <span class="pull-right {{$todo->isComplete}}">{{$todo->isComplete}}</span>
                                                    </h4>
                                                    <p class="summary">{{$todo->content}}</p>
                                                    <a href="{{route('todoList').'/'.$list->id.'/todo/'.$todo->id}}"><button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#putTodo" data-whatever="@mdo">수정하기</button></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="content-footer">
                    <p>
                        Page © - 2016 <br>
                        Powered By <a href="https://www.facebook.com/tavo.qiqe.lucero" target="_blank">TavoQiqe</a>
                    </p>
                </div>
            </div>
        </section>

    </div>
</div>

<script src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
