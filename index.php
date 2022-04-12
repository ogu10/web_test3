<?php
ini_set('display_errors',1);//画面にエラーを表示
error_reporting(E_ALL);//全ての種類のエラーを表示
session_start();
if(isset($_POST['datapost'])) {
    $_SESSION['No'] = $_POST['No'];
    $_SESSION['team'] = $_POST['team'];
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['league_id'] = $_POST['league_id'];
    header('Location: regist.php');
}
?>
<html lang="ja">
<head>
<!--    <script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>
    <script>
        function func() {
            const name = document.getElementById("name");
            const button = document.getElementById("button");
            if (name.value= 0) {
                button.disable = true;
            } else {button.disabled = false;}
        }
    </script>-->
</head>
<font color='white'><div align='center'><br>
        <body background="images/2_<?php echo rand(1,3); ?>.jpg"></body>
        <head>
            <meta charset="UTF-8">
            <title>PHP_TEST</title>
        </head>
        <h1>Welcome to JoBins Test4!</h1>
        </p>add your </font><font color='red'>favorite Soccer player </font><font color='white'>below!</p></font>

<form action="" method="post">
    <input type="int" name="No" placeholder="No"><br>
    <input type="text" id="name" name="name" placeholder="name" oninput="checkName()"><br>
    <input type="text" name="team" placeholder="team"><br><br><font color='Lime'>
    <input type="radio" name="league_id" value="1">Premium League<br>
    <input type="radio" name="league_id" value="2">Serie A<br>
    <input type="radio" name="league_id" value="3">Bundesliga<br>
    <input type="radio" name="league_id" value="4">La Liga<br>
    <input type="radio" name="league_id" value="5">Ligue 1</font>
    <br><br>
    <button type="submit" name="datapost" id="button" style="cursor:pointer" disabled>
        <i class="fa-regular fa-futbol"></i> Kick off！</button>
    <br><br>
    <p><h1><font color='Green'><div style="padding: 10px; margin-bottom: 10px; width:300px; border: 5px double #333333; background-color: #e0ff80;">
                <i class="fa-solid fa-list"></i><a> </a>
                <a href="players_list.php">Answer list</a></h1></form>
</p>
<p>
    <a href="unit.php">go to unit!</a>
</p>
</div>
</html>
