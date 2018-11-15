<html>
<head>
    <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#b01").click(function(){
                htmlobj=$.ajax({url:"/test/2",async:false});
                $("#myDiv").html(htmlobj.responseText);
            });
        });
    </script>
</head>
<body>

<div id="myDiv"><h2>Let AJAX change this text</h2></div>
<button type="button" id="b01">通过 AJAX 改变内容</button>

</body>
</html>
