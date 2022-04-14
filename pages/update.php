<?php
try {$dbh = new PDO("mysql:host=localhost; dbname=jobins; charset=utf8", "root", "");
    $stmt = $dbh->prepare('UPDATE players SET No = :No, name = :name, team = :team WHERE id = :id');
    $stmt->execute(array(':No' => $_POST['No'],':name' => $_POST['name'], ':team' => $_POST['team'], ':id' => $_POST['id']));

    header('Location: ../players_list.php');

} catch (Exception $e) {
    echo 'エラーが発生しました。:' . $e->getMessage();
}

?>