<?php
ini_set('display_errors',1);//画面にエラーを表示
error_reporting(E_ALL);//全ての種類のエラーを表示
session_start();
if(isset($_POST['datapost'])) {
    $_SESSION['namae'] = $_POST['namae'];
    $_SESSION['pass'] = $_POST['pass'];
    header('Location: regist2.php');
}
?>
<div lang="ja">
    <head>
        <link rel="stylesheet" href="style.css"></head>
    <script src="/web_test3/function.js"></script>
    <script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>
    </head>
    <font color='white'><div align='center'><br>
    <a href="submit.php">go to index</a><br><font color='yellow'>
                <?php echo('session ID is ' . $_COOKIE['PHPSESSID'] );?></font><br>
            <body background="images/2_<?php echo rand(1,3); ?>.jpg"></body>
            <head>
                <meta charset="UTF-8">
                <title>PHP_no_TEST</title>
            </head>
            <h1>Welcome to JoBins Test5!</h1>
            </p>add your </font><font color='red'>favorite Soccer player </font><font color='white'>below!</p></font>

    <form action="" method="post">
        <input type="text" id="name" name="namae" placeholder="name" oninput="checkName()"><br>
        <input type="text" name="pass" placeholder="pass"><br>
        <br><br>
        <button type="submit" name="login" id="button" disabled>
            <i class="fa-regular fa-futbol"></i> log in！</button>
</div>
</html>
