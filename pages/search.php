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
    $sort= "ASC";}*/
if(isset($_POST["search_word"]) || isset($_POST["team_belongings"]))
{
    if(isset($_POST["search_word"]) && isset($_POST["team_belongings"]))
    {
        $_SESSION["search_word"] = $_POST["search_word"];
        $_SESSION["team_belongings"] = $_POST["team_belongings"];
    }
    elseif(isset($_POST["search_word"]))
    {
        $_SESSION["search_word"] = $_POST["search_word"];
    }
    elseif(isset($_POST["team_belongings"]))
    {
        $_SESSION["team_belongings"] = $_POST["team_belongings"];

    }
    $_SESSION['team_belongings'] = '';

        $stmt = $dbh->query("SELECT * FROM players WHERE /*`No` LIKE '%${_SESSION['search_word']}%'
                             OR */`name` LIKE '%${_SESSION['search_word']}%' 
                             AND `team` LIKE '%${_SESSION['team_belongings']}%' ORDER BY length(team) DESC, `No`");/*else{
        echo "href=player_list.php";}*/
        $teams = $dbh->query('SELECT DISTINCT `team` FROM players ORDER BY Length(`team`) DESC LIMIT 15');
        $result = 0;
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result_t = 0;
        $result_t = $teams->fetchAll(PDO::FETCH_ASSOC);$id_max = intval($dbh->query("SELECT max(id) FROM players")->fetchColumn());
}
else{
    header('Location: ../players_list.php');
    }
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
<font color='red'>
<form action="search.php" method="POST">
    <input type="text" id="name" name="search_word" placeholder="search name"  value="<?php echo $_SESSION['search_word'] ?>"><br><br><b>
    　 <?php $x=1; foreach ($result_t as $value): ?><input type="radio" name="team_belongings" value="<?php echo $value['team'] ?>" <?php if($value['team'] == $_SESSION['team_belongings']){echo 'checked';}?>>
        <?php echo $value['team'] ?><?php if($x % 5 ==0){echo "<br>";}?><?php $x++ ?><?php endforeach ?></b><br><br>
    <button type="submit" name="login" id="button" class="button3">
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
        <th>No. <?php
            if($_SERVER['REQUEST_URI'] <> '/web_test3/pages/search.php?sort=ASC&column=No'){echo"<a href=search.php?sort=ASC&column=No>";}else{echo "<a href=search.php?sort=DESC&column=No>";}?><i class="fa-solid fa-bars"></i>
            <?php echo"</a>"?>
        <th>name <?php
            if($_SERVER['REQUEST_URI'] <> '/web_test3/pages/search.php?sort=ASC&column=name'){echo"<a href=search.php?sort=ASC&column=name>";}else{echo "<a href=search.php?sort=DESC&column=name>";}?><i class="fa-solid fa-bars"></i>
            <?php echo"</a>"?>
        <th>team <?php
            if($_SERVER['REQUEST_URI'] <> '/web_test3/pages/search.php?sort=ASC&column=Length(team)'){echo"<a href=search.php?sort=ASC&column=Length(team)>";}else{echo "<a href=search.php?sort=DESC&column=Length(team)>";}?><i class="fa-solid fa-bars"></i>
            <?php echo"</a>"?>
        <th>update</th>
        <th>delete</th>
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
                <?php echo "<!--<button class=`button3`>--><a href=edit.php?id=" . $value["id"] . ">"; ?>
                <i class="fa-solid fa-pen-nib"></i>
                <?php echo "</a>\n";
                echo "<td>";
                echo "<!--<button class=`button3`>--><a href=delete.php?id=" . $value["id"] . ">"; ?>
                <i class="fa-solid fa-trash"></i>
                <?php echo "</a>\n";
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