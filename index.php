<?php
session_start();
include 'pages/connection.php';
if (!isset($_SESSION["user_name"])) {}else{
    header("Location: pages/are_you_ready.php");}
if(isset($_POST['login'])) {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['pass'] = $_POST['pass'];
    header('Location: confirm.php');}
?>
<div lang="ja">
    <head>
        <link rel="stylesheet" href="style.css"></head>
    <script src="/web_test3/pages/function.js"></script>
    <script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>
    </head>
    <font color='white'><div align='center'><br>
<!--    <a href="submit.php">go to index</a>--><br><br>
<!--                session ID is <font color='yellow'>
                <?php /*echo($_COOKIE['PHPSESSID'] );*/?></font>--><br>
            <body background="images/3_<?php echo rand(1,3); ?>.jpg">
            <head>
                <meta charset="UTF-8">
                <title>PHP_TEST_no_5</title>
            </head>
            <h1>Welcome to JoBins Test5!</h1>

    <form action="" method="POST">
        <input type="text" id="name" name="name" placeholder="name" oninput="checkName()"><br>
        <input type="password" name="pass" placeholder="pass"><br>
        <br><br>
        <button type="submit" name="login" id="button" class="black_button" disabled>
            <i class="fa-regular fa-futbol"></i> log in！</button></form><br>

            <p> if you are not registered, <br>
        <a href="pages/apply.php"><button type="button"><i class="fa-solid fa-pen-to-square"></i> Apply!</button></a>
    </p>
</div></body>
</html>
