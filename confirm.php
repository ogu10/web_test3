<?php
session_start();
include 'pages/connection.php';
    $name = $_SESSION['name'];
    $pass = $_SESSION['pass'];
    $stmt = $dbh->prepare("SELECT * FROM passwords WHERE username = '$name' and pass = '$pass'");
    $stmt->execute();

    if($rows = $stmt->fetch()) {
        if($rows["pass"] ==  $_SESSION['pass']) {
            $_SESSION["user_name"] = $_SESSION["name"];
            header('Location: pages/test4/test5.php');
        }else {
            print "<p>ログイン失敗 Passがちがうよ</p>";
            echo "<a href=index.php><button type=button> もどる！ </button></a>";
        }
    }else {
        print "<p>ログイン失敗 名前なくね</p>";
    }
?>