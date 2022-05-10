<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("button").click(function(){
                $("#p1").css("color", "red","transition", "0.1s").css("color", "yelow")
                    .css("color", "pink")
                    .css("color", "skyblue")
                    .css("color", "green")
                    .css("color", "orange")
                    .css("color", "red")
            });
        });
    </script>
</head>
<body>

<p id="p1">jQuery is fun!!</p>

<button>Click me</button>

</body>
</html>