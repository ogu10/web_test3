<?php
ini_set('display_errors',1);//画面にエラーを表示
error_reporting(E_ALL);//全ての種類のエラーを表示
session_start();
if(isset($_POST['datapost'])) {
    $_SESSION['username'] = $_POST['name'];
    $_SESSION['pass'] = $_POST['pass'];
    header('Location: regist2.php');
}
?>
<html>
<div lang="ja">
    <head>
        <link rel="stylesheet" href="style.css"></head>
    <div class="anim-box">
        <body background="images/0_7.jpg">
    </div>
    <script src="/web_test3/function.js"></script>
    <script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>
    </head>
    <font color='white'><div align='center'><br><br><br>
<!--            session ID is <font color='yellow'>
                <?php /*echo($_COOKIE['PHPSESSID'] );*/?></font><br>-->
            <head>
                <meta charset="UTF-8">
                <title>PHP_TEST_no_5</title>
            </head>
            <h1>Welcome to JoBins Test5!</h1><br><br><br>
            <form action="regist2.php" method="post">
                <input type="text" id="name" name="name" placeholder="name" oninput="checkName()"><br>
                <input type="password" name="pass" placeholder="pass"><br>
                <br><br>
                <button type="submit" name="datapost" id="button" disabled>
                        <i class="fa-solid fa-pen-to-square"></i> Apply！</button><br><br><br>
                <font color='black'>or </font><br><font color='white'>
                go back to <a href="index.php">log in page</a>
        </div></font><
</html>
