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
<div lang="ja">
    <head>
        <link rel="stylesheet" href="style.css">
    <script src="/web_test3/function.js"></script>
    <script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>
    </head>
    <font color='white'><div align='center'><br>
            <body background="images/0_<?php echo rand(1,1); ?>.jpg"></body>
            <head>
                <meta charset="UTF-8">
                <title>PHP_TEST</title>
            </head>
            <h1>Your login has succeeded!</h1>
            </p>add your </font><font color='red'>favorite Soccer player </font><font color='white'>below!</p></font>

    <form action="" method="post">
        <input type="int" name="No" placeholder="No"><br>
        <input type="text" id="name" name="name" placeholder="name" oninput="checkName()"><br>
        <input type="text" name="team" placeholder="team"><br><br><font color='Lime'>
            <input type="radio" name="league_id" value="1">Premium League<br>
            <input type="radio" name="league_id" value="3">Bundesliga<br>
            <input type="radio" name="league_id" value="2">Serie A<br>
            <input type="radio" name="league_id" value="4">La Liga<br>
            <input type="radio" name="league_id" value="5">Ligue 1</font>
        <br><br>
        <button type="submit" name="datapost" id="button" disabled>
            <i class="fa-regular fa-futbol"></i> Kick off！</button>
        <p><font color='Green'></font><h1>
            <a href='players_list.php'><i class="fa-solid fa-list"></i> Answer list</a></h1></form>
    </p>
    <p>
        <a href="pages/unit.php">go to unit!</a>
    </p></div>
</html>

<?php
session_start();
if(!isset($_SESSION["user_name"])) {
    header("Location: pages/ban.php");} ?>