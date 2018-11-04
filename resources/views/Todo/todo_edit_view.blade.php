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
<form action="{{ url()->current()}}" method="POST" id="put">
    <input type="hidden" name="list_id" value="{{$list->id}}">
    <input type="hidden" name="id" value="{{$todo->id}}">
    <input name="_method" type="hidden" value="PUT">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="recipient-name" class="control-label">제목:</label>
            <input class="form-control" type="text" id="recipient-name" name="title" value="{{$todo->title}}">
        </div>
        <div class="form-group">
            <label for="message-text" class="control-label">내용:</label>
            <textarea class="form-control" id="message-text" name="content">{{$todo->content}}</textarea>
        </div>
        <div class="form-group">
            <label for="message-text" class="control-label">우선순위:</label>
            <input type="number" class="form-control" id="recipient-name" name="seq" min="1" max="{{$list->todo_count}}">
        </div>
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-secondary">
                <input type="radio" name="isComplete" id="option1" autocomplete="off" value="complete"> 완료
            </label>
            <label class="btn btn-secondary">
                <input type="radio" name="isComplete" id="option2" autocomplete="off" value="progress"> 진행
            </label>
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
        <button type="submit" class="btn btn-primary" id="put">수정</button>
    </div>
</form>
<div class="modal-footer">
    <form method="POST" action="{{ url()->current()}}">
        @csrf
        <input name="_method" type="hidden" value="DELETE">
        <input type="hidden" name="list_id" value="{{$list->id}}">
        <input type="hidden" name="id" value="{{$todo->id}}">
        <button type="submit" class="btn btn-danger" >삭제</button>
    </form>
</div>


<script src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
