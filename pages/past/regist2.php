<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();
$dbh = new PDO('mysql:host=mysql1.php.xdomain.ne.jp;dbname=ogu11_01;charset=utf8','ogu11_001','jobins2022');

$No = $_SESSION['No'];//ユーザーから受け取った値を変数に入れる
$name = $_SESSION['name'];//ユーザーから受け取った値を変数に入れる
$team = $_SESSION['team'];//ユーザーから受け取った値を変数に入れる
$age = $_SESSION['age'];//ユーザーから受け取った値を変数に入れる
$stmt = $dbh -> prepare("INSERT INTO players(No,name,team,age) VALUES(:No,:name,:team,:age)");//登録準備
$stmt -> bindValue(':name', $name, PDO::PARAM_STR);//登録する文字の型を固定
$stmt -> bindValue(':team', $team, PDO::PARAM_STR);//登録する文字の型を固定
$stmt -> bindValue(':No', $No, PDO::PARAM_STR);//登録する文字の型を固定
$stmt -> bindValue(':age', $age, PDO::PARAM_STR);//登録する文字の型を固定
$stmt -> execute();//データベースの登録を実行
$dbh = NULL;//データベース接続を解除
?>

<div align='center'>
    <body background="images/1_<?php echo rand(3,6); ?>.jpg">
    <body id="log_body">
    <main class="main_log">
        <h2>
            <p>Thank you for your Answer!<br>
            <h1>
                <br>your hero is... <font color='red'><?php echo $name; ?></font></p>
            <h1>
        </h2>


    </body>