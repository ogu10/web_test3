<?php


ini_set('display_errors',1);
error_reporting(E_ALL);
/*var_dump($_POST['name']);
var_dump($_POST['pass']);*/

session_start();
$pdo = new PDO('mysql:host=localhost;dbname=jobins;charset=utf8','root','');

$name = $_POST['name'];//ユーザーから受け取った値を変数に入れる
$password = $_POST['pass'];//ユーザーから受け取った値を変数に入れる
$stmt = $pdo -> prepare("INSERT INTO passwords(username,pass) VALUES(:username,:pass)");//登録準備
$stmt -> bindValue(':username', $name, PDO::PARAM_STR);//登録する文字の型を固定
$stmt -> bindValue(':pass', $password, PDO::PARAM_STR);//登録する文字の型を固定
$stmt -> execute();//データベースの登録を実行
$pdo = NULL;//データベース接続を解除
header('Location: index.php');
?>
