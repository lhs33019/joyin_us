<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>글쓰기</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
    <style>
        .pad{
            padding-top : 80px;
        }
    </style>
<body>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>


<div class="panel panel-default pad">
    <!-- Default panel contents -->
    <div class="panel-heading"><h2></h2></div>

    <div class="panel-body"> <!-- 패널 사용 -->

        <div class="container">
            <form action="{{ route('create_card') }}" method="post" id="make">
                {{--// board테이블에 저장하기 위한 form. 저장한 내용을 insert.php를 통해서 넣을 것이다.--}}
                    @csrf
                    {{--//글제목 입력 폼--}}
                    <div class="form-group">
                        <label for="subject">Title</label>
                        <input type="text" class="form-control" name ="title" id="title" placeholder="Enter title">
                    </div>
                    <!-- 인원수 -->
                    <div class="form-group">
                        <label for="subject">
                            최대 인원수</label>
                        <input type="number" name="limit" min="1" max="50">

                    </div>
                    <label for="subject">
                        모집기한</label>
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
                    {{--//글내용 입력 폼--}}
                    <div class="form-group">
                        <label for="content">Comment:</label>
                        <textarea class="form-control" rows="10" name="content" id="content"></textarea>
                        {{--//글 내용이 많으므로 <textarea>태그를 쓴다 rows는 textarea의 높이 조절--}}
                    </div>
                    {{--//버튼 저장하기, 다시쓰기, 되돌아가기--}}
                    <div class="center-block" style='width:300px'>
                        <button type="submit" class="btn btn-info" id="make">저장하기</button>
                        <button type="button" class="btn btn-info" onclick="history.back(1)">돌아가기</button>
                        <!--<input type="submit" value="저장하기"> <input type="reset" value="다시쓰기"> <input type="button" value="Back" onclick="history.back(1)"> -->
                    </div>
                    {{--//되돌아가기에서 onclick이벤트로 history.back(1) 왔던곳에서 1만큼 back (-1을 써도 된다)--}}
            </form> <!--//내용폼 end -->
        </div>
    </div> <!--panel end-->
</div>

</div>
</body>
</html>

