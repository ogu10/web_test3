<?php
session_start();
include 'pages/connection.php';
    $stmt = $dbh->prepare("SELECT * FROM passwords WHERE username = :name");
    $stmt->bindParam(':name', $_SESSION['name']);
    $stmt->execute();

    if($rows = $stmt->fetch()) {
        if($rows["pass"] ==  $_SESSION['pass']) {
            $_SESSION["user_name"] = $_SESSION["name"];
            header('Location: submit.php');
        }else {
            print "<p>ログイン失敗 Passがちがうよ</p>";
            echo "<a href=index.php><button type=button> もどる！ </button></a>";
        }
    }else {
        print "<p>ログイン失敗 名前なくね</p>";
    }
?>