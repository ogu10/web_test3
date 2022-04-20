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
    <font color=lime>
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
        $_SESSION["search_word"] = "";
        $_SESSION["team_belongings"] = "";
/*        {$stmt = $dbh->query('SELECT * FROM players ORDER BY length(`players`.`team`) DESC,`No` ASC LIMIT 16');}*/
        $stmt = $dbh->query('SELECT * FROM players ORDER BY '.$column.' '.$sort.', Length(`team`) LIMIT 16');
        $teams = $dbh->query('SELECT DISTINCT `team` FROM players ORDER BY Length(`team`) DESC LIMIT 15');
        $result = 0;
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result_t = 0;
        $result_t = $teams->fetchAll(PDO::FETCH_ASSOC);
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
    <input type="text" id="name" name="search_word" placeholder="search name"><br><br><b>
    　 <?php $x=1; foreach ($result_t as $value): ?>
            <input type="radio" name="team_belongings" value="<?php echo $value['team'] ?>">
        <?php echo $value['team'] ?><?php if($x % 5 ==0){echo "<br>";}?><?php $x++ ?><?php endforeach ?><br>
    <button type="submit" name="login" id="button" class="button3">
        <i class="fa-regular fa-futbol"></i> Search it！</button></form>
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
            <th>No. <?php
                if($_SERVER['REQUEST_URI'] <> '/web_test3/players_list.php?sort=ASC&column=No')
                {echo"<a href=players_list.php?sort=ASC&column=No>";}
                else{echo "<a href=players_list.php?sort=DESC&column=No>";}?><i class="fa-solid fa-bars"></i>
                <?php echo"</a>"?>
            <th>name <?php
                if($_SERVER['REQUEST_URI'] <> '/web_test3/players_list.php?sort=ASC&column=name'){echo"<a href=players_list.php?sort=ASC&column=name>";}else{echo "<a href=players_list.php?sort=DESC&column=name>";}?><i class="fa-solid fa-bars"></i>
                <?php echo"</a>"?>
            <th>team <?php
            if($_SERVER['REQUEST_URI'] <> '/web_test3/players_list.php?sort=ASC&column=Length(team)'){echo"<a href=players_list.php?sort=ASC&column=Length(team)>";}else{echo "<a href=players_list.php?sort=DESC&column=Length(team)>";}?><i class="fa-solid fa-bars"></i>
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