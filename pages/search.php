<?php session_start() ?>
<?php
include 'connection.php';/*
if(isset($_REQUEST["column"]) && isset($_REQUEST["sort"])){
    // extract if exist from request array
    $column = $_REQUEST["column"];
    // set column and sort variable
    $sort= $_REQUEST['sort'];
}else{
    $column= "name";
    $sort= "ASC";}
if(isset($_SESSION["search_word"]) or isset($_POST["search_word"])){*/
    $stmt = $dbh->query("SELECT * FROM players WHERE `No` LIKE '%${_POST['search_word']}%'
                         OR `name` LIKE '%${_POST['search_word']}%' 
                         OR `team` LIKE '%${_POST['search_word']}%' ORDER BY length(team) DESC, `No`");/*}else{
    $stmt = $dbh->query('SELECT * FROM players ORDER BY Length(`team`) LIMIT 16');}*/
$result = 0;
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$id_max = intval($dbh->query("SELECT max(id) FROM players")->fetchColumn());
?>
you are <?php echo "</font>"."<font color='lime'>".$_SESSION['user_name']."</font>"; ?>
<script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/web_test3/pages/style1.css"></head>
<div align="right">
    <a href="log_out.php">
        <button type="button" name="out_button" id="button">
            <i class="fa-solid fa-right-from-bracket"></i> log out</button></a></div>
<div align='center'>
<body background="images/1_3.jpg"><br>
<font color='#e0ff80'>
<form action="search.php" method="POST">
    <input type="text" id="name" name="search_word" placeholder="search name">
    <button type="submit" name="login" id="button" class="button3" value="<?php if (!empty($_SESSION['search_word'])) echo(htmlspecialchars($_SESSION['search_word'], ENT_QUOTES, 'UTF-8'));?>">
        <i class="fa-regular fa-futbol"></i> Search it！</button></form>
<!--    <div align="right">
        <select name="sort" onChange="location.href=value;">
            <option value="" selected>えらべ！</option>
            <option value="search.php?sort=ASC&column=id">id up!</option>
            <option value="search.php?sort=DESC&column=id">id down!</option>
            <option value="search.php?sort=ASC&column=Length(team)">team up!</option>
            <option value="search.php?sort=DESC&column=Length(team)">team down!</option>
        </select></div>-->
<table>

    <tr>
        <th>No.</th>
        <th>なまえ</th>
        <th>ちいむ</th>
        <th>あぷで</th>
        <th>けす</th>
    </tr>
    　 <?php $x=1; foreach ($result as $value): ?>
        <tr>
            <td>
                　<?php echo $value['No'] ?></td>
            <td>
                　<?php echo $value['name'] ?>
                <?php
                if ($value["id"]== $id_max){echo "<font color='red'>"."new!"."</font>";} ?></td>
            <td>
                　<?php echo $value['team'] ?></td>
            <td>
                <?php echo "<button class=`button3`><a href=edit.php?id=" . $value["id"] . ">update</a></button>";
                echo "<td>";
                echo "<button class=`button3`><a href=delete.php?id=" . $value["id"] . ">delete</a></button>\n";
                echo "</tr>\n"; ?>
                <?php $x++ ?>
        </tr>
    <?php endforeach ?>
</table>
    <br>
    <p>
        <a href="../submit.php">go back to index</a>
    </p>
    <p>
        <a href="../players_list.php">go back to list</a>
    </p>
</font></div></body>