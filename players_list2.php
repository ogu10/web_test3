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
    <body background="images/1_3.jpg"><br>
    <div align='center'>
    <font color=red>
    <?php
    include 'pages/connection.php';
        // check if column exists
    if(isset($_GET["column"]) && isset($_GET["sort"])){
        // extract if exist from get array
        $column = $_GET["column"];
        // set column and sort variable
        $sort= $_GET["sort"];
    }else{
        $column= "name";
        $sort= "ASC";}
/*    if(isset($_GET["button_No"])){
    if($_SESSION["column"] == 'No' && $_SESSION["sort"] = 'DESC'){
        $_SESSION["sort"] = 'ASC';
        $_SESSION["column"] = 'No';
        }elseif($_SESSION["column"] == 'No' && $_SESSION["sort"] = 'ASC'){
        $_SESSION["sort"] = 'DESC';
        $_SESSION["column"] = 'No';}}*/
echo    $column;
echo    $sort;
echo "<br><br>";
    if(isset($_GET["search_word"]) && (isset($_GET["team_belongings"]))){/*
    if(isset($_GET["search_word"]) && (isset($_GET["team_belongings"]) || is_array($_GET["team_belongings"]))) {*/
    }elseif(isset($_GET["search_word"])){
        $_GET["team_belongings"] = '';
    }else{
        $_GET["search_word"] = '';
        $_GET["team_belongings"] = '';
}

/*    foreach( $_GET['team_belongings'] as $value ){
          print_r("$value, ");}
        echo "teams";*/
/*    echo $_GET['team_belongings'][0];
        die;*/
        $result = 0;
/*        $teams_selected = SELECT `team` FROM $_GET['team_belongings'];*/


/*       $teamsData = $_GET['team_belongings'];
       $arr = implode(',',$teamsData);*/
    if(is_array($_GET['team_belongings'])){
       $elements = count($_GET['team_belongings']);
       echo $elements;}elseif(isset($_GET['team_belongings'])){$elements = 1;
        echo $elements;
    }else{$elements = 0;
        echo $elements;}

    if($elements == 0){
        $query =  "SELECT * FROM players WHERE `name` LIKE '%${_GET['search_word']}%' ORDER BY `$column` $sort";
    }elseif($elements == 1){
        $query =  "SELECT * FROM players WHERE `name` LIKE '%${_GET['search_word']}%' AND `team` LIKE '%".$_GET['team_belongings'][0]."%' ORDER BY `$column` $sort";
    }elseif($elements == 2){
        $query =  "SELECT * FROM players WHERE `name` LIKE '%${_GET['search_word']}%' AND (`team` LIKE '".$_GET['team_belongings'][0]."' or `team` LIKE '".$_GET['team_belongings'][1]."')ORDER BY `$column` $sort";
    }elseif($elements == 3){
        $query =  "SELECT * FROM players WHERE `name` LIKE '%${_GET['search_word']}%' AND (`team` LIKE '".$_GET['team_belongings'][0]."' or `team` LIKE '".$_GET['team_belongings'][1]."' or `team` LIKE '".$_GET['team_belongings'][2]."') ORDER BY `$column` $sort";
    }elseif($elements == 4){
        $query =  "SELECT * FROM players WHERE `name` LIKE '%${_GET['search_word']}%' AND (`team` LIKE '".$_GET['team_belongings'][0]."' or `team` LIKE '".$_GET['team_belongings'][1]."' or `team` LIKE '".$_GET['team_belongings'][2]."' or `team` LIKE '".$_GET['team_belongings'][3]."') ORDER BY `$column` $sort";
    }elseif($elements >= 5){
        $query =  "SELECT * FROM players WHERE `name` LIKE '%${_GET['search_word']}%' AND (`team` LIKE '".$_GET['team_belongings'][0]."' or `team` LIKE '".$_GET['team_belongings'][1]."' or `team` LIKE '".$_GET['team_belongings'][2]."' or `team` LIKE '".$_GET['team_belongings'][3]."' or `team` LIKE '".$_GET['team_belongings'][4]."') ORDER BY `$column` $sort";}
/*        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':values', $teamsData, PDO::PARAM_STR);*/
/*        var_dump($query);*/
//    die;
//
        $stmt = $dbh->query($query);
/*        $stmt = $dbh->query('SELECT * FROM players ORDER BY '.$column.' '.$sort.', Length(`team`) LIMIT 16');*/
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result_t = 0;
        $teams = $dbh->query('SELECT DISTINCT `team` FROM players ORDER BY Length(`team`) DESC LIMIT 15');
        $result_t = $teams->fetchAll(PDO::FETCH_ASSOC);
        $id_max = intval($dbh->query("SELECT max(id) FROM players")->fetchColumn());
    ?>

<form action="players_list2.php" method="GET">
    <input type="text" id="name" name="search_word" placeholder="search name"  value="<?php echo $_GET['search_word'] ?>"><br><br><b>
        <?php $x=1; foreach ($result_t as $value_t): ?>
            <input type="checkbox" name="team_belongings[]" value="<?php echo $value_t['team'] ?>"
                <?php if(is_array($_GET["search_word"])){if($value_t['team'] == $_GET['team_belongings'][0]) /* or $value_t['team'] == $_GET['team_belongings'][1] or$value_t['team'] == $_GET['team_belongings'][2] or $value_t['team'] == $_GET['team_belongings'][3])*/{echo 'checked';}}?>>
            <?php echo $value_t['team'] ?><?php if($x % 5 ==0){echo "<br>";}?><?php $x++ ?>
        <?php endforeach ?></b><br><br>
    <button type="submit" id="button" class="button3">
        <i class="fa-regular fa-futbol"></i> Search it！</button><br>
<table class="players=country">
    </div>
    <tr>
        <th>No. <!--<button name="button_No" value="1" class='button5' type='submit';><i class="fa-solid fa-bars"></i></button>
            --><?php /*if((strpos($_SERVER['REQUEST_URI'],'sort=DESC&column=No')) && isset($_POST['button_No'])){
            echo '<input type="hidden" name="sort" value="ASC">';
            echo '<input type="hidden" name="column" value="No">';
            }elseif(isset($_POST['button_No'])){
            echo '<input type="hidden" name="sort" value="DESC">';
            echo '<input type="hidden" name="column" value="No">';} */?>
        <th>name
            <?php if(strpos($_SERVER['REQUEST_URI'],'sort=DESC&column=name')){
            echo '<input type="hidden" name="sort" value="ASC">';
            echo '<input type="hidden" name="column" value="name">';
            echo "<button class='button5' type='submit';>";
            echo '<i class="fa-solid fa-bars"></i>';
            echo "</button>";
            }else{
            echo '<input type="hidden" name="sort" value="DESC">';
            echo '<input type="hidden" name="column" value="name">';
            echo "<button class='button5' type='submit';>";
            echo '<i class="fa-solid fa-bars"></i>';
            echo "</button>";} ?>
        <th>team <?php
            if($_SERVER['REQUEST_URI'] <> '/web_test3/players_list2.php?sort=ASC&column=Length(team)'){echo"<a href=players_list2.php?sort=ASC&column=Length(team)>";}else{echo "<a href=players_list2.php?sort=DESC&column=Length(team)>";}?><i class="fa-solid fa-bars"></i>
            <?php echo"</a>"?></form>
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
                <?php echo "<!--<button class=`button3`>--><a href=pages/edit.php?id=" . $value["id"] . ">"; ?>
                <i class="fa-solid fa-pen-nib"></i>
                <?php echo "</a>\n";
                echo "<td>";
                echo "<!--<button class=`button3`>--><a href=pages/delete.php?id=" . $value["id"] . ">"; ?>
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

