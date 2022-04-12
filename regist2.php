<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=jobins;charset=utf8','root','');

$namae = $_SESSION['namae'];//ユーザーから受け取った値を変数に入れる
$pass = $_SESSION['pass'];//ユーザーから受け取った値を変数に入れる
$stmt = $pdo -> prepare("INSERT INTO passwords(namae,pass) VALUES(:namae,:pass)");//登録準備
$stmt -> bindValue(':namae', $namae, PDO::PARAM_STR);//登録する文字の型を固定
$stmt -> bindValue(':pass', $pass, PDO::PARAM_STR);//登録する文字の型を固定
$stmt -> execute();//データベースの登録を実行
$pdo = NULL;//データベース接続を解除
header('Location: submit.php');
?>
