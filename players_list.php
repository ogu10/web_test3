<html lang="ja">
<font color='white'>
<?php session_start() ?>
you are <?php echo "</font>"."<font color='lime'>".$_SESSION['user_name']."</font>"; ?>
<script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/web_test3/pages/style1.css"></head>
<script src="/web_test3/pages/function.js"></script>
<div align="right">
    <a href="pages/log_out.php">
        <button type="button" name="out_button" id="button">
            <i class="fa-solid fa-right-from-bracket"></i> log out</button></a></div>
<body background="images/1_4.jpg"><br>
<font color='#e0ff80'>
    <div align='center'>
<!--<div style="padding: 10px; margin-bottom: 10px; width:380px; border: 5px double #333333; background-color: white;">-->
    <font color=blue>
        <?php
        include 'pages/connection.php';
        // check if column exists
        if(isset($_REQUEST["column"]) && isset($_REQUEST["sort"])){
            // extract if exist from request array
            $column = $_REQUEST["column"];
            // set column and sort variable
            $sort= $_REQUEST['sort'];
        }else{
            $column= "name";
            $sort= "ASC";}
/*        {$stmt = $dbh->query('SELECT * FROM players ORDER BY length(`players`.`team`) DESC,`No` ASC LIMIT 16');}*/
        $stmt = $dbh->query('SELECT * FROM players ORDER BY '.$column.' '.$sort.', Length(`team`) LIMIT 16');
        $result = 0;
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $id_max = intval($dbh->query("SELECT max(id) FROM players")->fetchColumn());
/*        echo "<table>\n";
        echo "<tr>\n";
        echo "<th>No</th>";
        echo "</th><th>player</th><th><th>team</th>\n";
        echo "</tr>\n";
        foreach ($result as $players) {
            echo "<tr>\n";
            echo "<td>" . $players["No"] . "</td>\n";
            echo "<td>" . $players["name"] . "</td>\n";
            echo "<td>" ."<td>".$players["team"] . "</td>\n";
            echo "<td><td>\n";
            echo "<button><a href=pages/edit.php?id=" . $players["id"] . ">update</a></button>";
            echo "<td><td>";
            echo "<button><a href=pages/delete.php?id=" . $players["id"] . ">delete</a></button>\n";
            echo "</tr>\n";
        }
        echo "</table>\n";*/
        ?>
<form action="pages/search.php" method="POST">
    <input type="text" id="name" name="search_word" placeholder="search name">
    <button type="submit" name="login" id="button" class="button3">
        <i class="fa-regular fa-futbol"></i> Search it！</button>
    <div align="right">
    <select name="sort" onChange="location.href=value;">
        <option value="" selected>えらべ！</option>
        <option value="players_list.php?sort=ASC&column=id">id up!</option>
        <option value="players_list.php?sort=DESC&column=id">id down!</option>
        <option value="players_list.php?sort=ASC&column=Length(team)">team up!</option>
        <option value="players_list.php?sort=DESC&column=Length(team)">team down!</option>
    </select></div>
    <table class="players=country">
    </div>
        <tr>
            <th>No.<a href="players_list.php?sort=ASC&column=No">↓</a><a href="players_list.php?sort=DESC&column=No">↑</a></th>
            <th>name<a href="players_list.php?sort=ASC&column=name">↓</a><a href="players_list.php?sort=DESC&column=name">↑</a></th>
            <th>team<a href="players_list.php?sort=ASC&column=Length(team)">↓</a><a href="players_list.php?sort=DESC&column=Length(team)">↑</a></th>
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
                <?php echo "<button class=`button3`><a href=pages/edit.php?id=" . $value["id"] . ">update</a></button>";
                echo "<td>";
                echo "<button class=`button3`><a href=pages/delete.php?id=" . $value["id"] . ">delete</a></button>\n";
                echo "</tr>\n"; ?>
                <?php $x++ ?>
            </tr>
        <?php endforeach ?>
    </table>
        <p>
            <a href="submit.php">go back to index</a>
        </p>
    </font></div>
        </form>
<!--    </div>-->
</font></html>

<?php
if(!isset($_SESSION["user_name"])) {
    header("Location: pages/ban.php");} ?>