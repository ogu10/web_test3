<?php
ini_set('display_errors',1);//画面にエラーを表示
error_reporting(E_ALL);//全ての種類のエラーを表示
session_start();
if(isset($_POST['datapost'])) {
    $_SESSION['No'] = $_POST['No'];
    $_SESSION['team'] = $_POST['team'];
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['age'] = $_POST['age'];
    header('Location: pages/regist.php');
}
?>
<html lang="ja">
<head>
    <script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>
</head>
<font color='white'><div align='center'><br>
        <body background="images/0_<?php echo rand(1,9); ?>.jpg"></body>
        <head>
            <meta charset="UTF-8">
            <title>PHP_TEST</title>
        </head>
        <h1>Welcome to JoBins Test2!</h1>
        </p>add your </font><font color='red'>favorite Soccer player </font><font color='white'>below!</p>

    <form action="" method="post">
        <input type="int" name="No" placeholder="No"><br>
        <input type="text" name="name" placeholder="name"><br>
        <input type="text" name="team" placeholder="team"><br>
        <input type="int" name="age" placeholder="age"><br><br>
        <button type="submit" name="datapost">
            <i class="fa-regular fa-futbol"></i> Kick off！</button></script>
        <br><br>
        <p><h1><font color='Green'><div style="padding: 10px; margin-bottom: 10px; width:300px; border: 5px double #333333; background-color: #e0ff80;">
                    <i class="fa-solid fa-list"></i><a> </a>
                    <a href="players_list.php">Answer list</a></h1></form></div>
    </p>

</html>
