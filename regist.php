<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=jobins;charset=utf8','root','');

$No = $_SESSION['No'];//ユーザーから受け取った値を変数に入れる
$name = $_SESSION['name'];//ユーザーから受け取った値を変数に入れる
$team = $_SESSION['team'];//ユーザーから受け取った値を変数に入れる
$league_id = $_SESSION['league_id'];//ユーザーから受け取った値を変数に入れる
$stmt = $pdo -> prepare("INSERT INTO players(No,name,team,league_id) VALUES(:No,:name,:team,:league_id)");//登録準備
$stmt -> bindValue(':name', $name, PDO::PARAM_STR);//登録する文字の型を固定
$stmt -> bindValue(':team', $team, PDO::PARAM_STR);//登録する文字の型を固定
$stmt -> bindValue(':No', $No, PDO::PARAM_STR);//登録する文字の型を固定
$stmt -> bindValue(':league_id', $league_id, PDO::PARAM_STR);//登録する文字の型を固定
$stmt -> execute();//データベースの登録を実行
$pdo = NULL;//データベース接続を解除
?>

<div align='center'>
    <body background="images/1_3.jpg">
    <body id="log_body">
    <main class="main_log">
        <h2>
            <p>Thank you for your Answer!<br>
            <h1>
                <br>your hero is... <font color='red'><?php echo $name; ?></font></p>
                </h1>
        </h2>


    </body>
    <br>
    <p>
        <a href="index.php">go back to index</a><br><br>
        <a href="players_list.php">go to answer list!</a>
    </p>

<!--    <div style="padding: 10px; margin-bottom: 10px; width:300px; border: 5px double #333333; background-color: white;">
    <font color=blue>
    <?php
/*    $db = new PDO('mysql:host=localhost;dbname=jobins;charset=utf8','root','');
    echo "Results!".'<br>';
    $table = "SELECT * FROM players";
    $sql = $db->query($table);
    foreach ($sql as $row){
        echo $row['name'].'は'.$row['team'].'の'.$row['No'].'番です。'.'<br>';
    }
    */?>
    </font>
    </div>-->
