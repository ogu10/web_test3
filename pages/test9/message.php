<?php

$errors = [];
$data = [];
$data['message'] = '';

if (!empty($_POST['name2'])) {

    include '../connection.php';
    $name = ($_POST['name2']) ? $_POST['name2'] : "???";//ユーザーから受け取った値を変数に入れる
    $checkQuery = $query = "SELECT * FROM players WHERE `name` = '$name' ";
    $checkAction = $dbh->query($checkQuery);
    $checkResult = $checkAction->fetchAll(PDO::FETCH_ASSOC);
    if ($checkResult) {
        $data['message'] = "please use new name! 😡";
    }
}
echo json_encode($data);


