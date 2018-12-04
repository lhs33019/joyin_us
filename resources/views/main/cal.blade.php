<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>풀캘린더</title>
    <style type="text/css">
        body {
            margin :40px 10px;
            padding : 0;
            font-family : "Lucida Grande", Helvetica, Arial, Verdana,sans-serif;
            font-size : 14px;
        }
        #calendar {
            max-width : 900px;
            margin : 0 auto;
        }
    </style>
    <link href="css/fullcalendar.css" rel="stylesheet"/>
    <link href="css/fullcalendar.print.css" rel="stylesheet" media="print"/>
    <script type="text/javascript" src="js/moment.min.js"></script>
    <script type="text/javascript" src="js//jquery.min.js"></script>
    <script type="text/javascript" src="js/fullcalendar.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery("#calendar").fullCalendar({
                defaultDate : "2018-12-06"
                , editable : true
                , eventLimit : true
                , events: [
                    {
                        title : "All Day Event"
                        , start : "2016-05-01"
                    },
                    {
                        title : "가난했던 그 시절"
                        , start : "2018-12-01"
                        , end : "2018-12-10"
                    },
                    {
                        id : 999
                        , title : "Repeating Event"
                        , start : "2016-05-09T16:00:00"
                    },
                    {
                        id : 999
                        , title : "Repeating Event"
                        , start : "2016-05-16T16:00:00"
                    },
                    {
                        title : "Conference"
                        , start : "2016-05-11"
                        , end : "2016-05-13"
                    },
                    {
                        title : "잡스 묘지 찾아가서 Meeting"
                        , start : "2018-12-26T10:30:00"
                        , end : "2018-12-27T12:30:00"
                    },
                    {
                        title : "Lunch"
                        , start : "2016-05-12T12:00:00"
                    },
                    {
                        title : "Meeting"
                        , start : "2016-05-12T14:30:00"
                    },
                    {
                        title : "Happy Hour"
                        , start : "2016-05-12T17:30:00"
                    },
                    {
                        title : "Dinner"
                        , start : "2016-05-12T20:00:00"
                    },
                    {
                        title : "Birthday Party"
                        , start : "2016-05-13T07:00:00"
                    },
                    {
                        title : "Click for Google"
                        , url : "http://google.com/"
                        , start : "2016-05-28"
                    }
                ]
            });
        });
    </script>
<body>
<div id="calendar"></div>
</body>
</html>

