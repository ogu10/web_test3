<?php
/*ini_set('display_errors',1);//画面にエラーを表示
error_reporting(E_ALL);//全ての種類のエラーを表示*/
session_start();
$error_message = "";
$pdo = new PDO('mysql:host=localhost;dbname=jobins;charset=utf8','root','');
if(isset($_POST['login'])) {
    if($_POST['name'] == 'user' && $_POST['pass'] == 'pass'){
        $_SESSION["user_name"] = $_POST["name"];
        header('Location: submit.php');}else{
$error_message = "you failed...";
if($error_message) {echo "<font color='white'>".$error_message."</font>";}
unset($_SESSION["user_name"] );}
}
?>
<div lang="ja">
    <head>
        <link rel="stylesheet" href="style.css"></head>
    <script src="/web_test3/pages/function.js"></script>
    <script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>
    </head>
    <font color='white'><div align='center'><br>
<!--    <a href="submit.php">go to index</a>--><br><br>
                session ID is <font color='yellow'>
                <?php echo($_COOKIE['PHPSESSID'] );?></font><br>
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
        <button type="submit" name="login" id="button" disabled>
            <i class="fa-regular fa-futbol"></i> log in！</button></form><br>

            <p> if you are not registered, <br>
        <a href="pages/apply.php"><button type="button"><i class="fa-solid fa-pen-to-square"></i> Apply!</button></a>
    </p>
</div></body>
</html>
