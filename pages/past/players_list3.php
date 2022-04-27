<html lang="ja">
<font color='white'>
    <?php session_start() ?>
    you are <?php echo "</font>"."<font color='lime'>".$_SESSION['user_name']."</font>"; ?>
    <script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/web_test3/pages/style1.css"></head>
    <script src="pages/function.js"></script>
    <div align="right">
        <a href="pages/log_out.php">
            <button type="button" name="out_button" id="button">
                <i class="fa-solid fa-right-from-bracket"></i> log out</button></a></div>
    <body id="background" background="images/3_2.jpg">
    <br>
    <div align='center'>
        <font color=red>

<?php
include 'pages/connection.php';

$sortBy = isset($_GET["column"])? $_GET["column"] : "id";
$sortOrder = isset($_GET["sort"])? $_GET["sort"] : "DESC";
$searchName = isset($_GET["search_word"])? $_GET["search_word"] : '';
$searchTeam = isset($_GET["team_belongings"])? $_GET["team_belongings"] : '';
$elements = is_array($searchTeam)? count($searchTeam): '0';

if($elements == 0){
    $query =  "SELECT * FROM players WHERE `name` LIKE '%$searchName%' ORDER BY $sortBy $sortOrder, Length(team)";
}elseif($_GET['team_belongings'] == '') {
    $query =  "SELECT * FROM players WHERE `name` LIKE '%${_GET['search_word']}%' AND `team` LIKE '%" . $_GET['team_belongings'] . "%' ORDER BY $sortBy $sortOrder, Length(team)";
}elseif($elements == 1){
    $query =  "SELECT * FROM players WHERE `name` LIKE '%${_GET['search_word']}%' AND `team` LIKE '%".$_GET['team_belongings'][0]."%' ORDER BY $sortBy $sortOrder";
}elseif($elements == 2){
    $query =  "SELECT * FROM players WHERE `name` LIKE '%${_GET['search_word']}%' AND (`team` LIKE '".$_GET['team_belongings'][0]."' or `team` LIKE '".$_GET['team_belongings'][1]."')ORDER BY $sortBy $sortOrder, Length(team)";
}elseif($elements == 3){
    $query =  "SELECT * FROM players WHERE `name` LIKE '%${_GET['search_word']}%' AND (`team` LIKE '".$_GET['team_belongings'][0]."' or `team` LIKE '".$_GET['team_belongings'][1]."' or `team` LIKE '".$_GET['team_belongings'][2]."') ORDER BY $sortBy $sortOrder, Length(team)";
}elseif($elements == 4){
    $query =  "SELECT * FROM players WHERE `name` LIKE '%${_GET['search_word']}%' AND (`team` LIKE '".$_GET['team_belongings'][0]."' or `team` LIKE '".$_GET['team_belongings'][1]."' or `team` LIKE '".$_GET['team_belongings'][2]."' or `team` LIKE '".$_GET['team_belongings'][3]."') ORDER BY $sortBy $sortOrder, Length(team)";
}elseif($elements >= 5){
    $query =  "SELECT * FROM players WHERE `name` LIKE '%${_GET['search_word']}%' AND (`team` LIKE '".$_GET['team_belongings'][0]."' or `team` LIKE '".$_GET['team_belongings'][1]."' or `team` LIKE '".$_GET['team_belongings'][2]."' or `team` LIKE '".$_GET['team_belongings'][3]."' or `team` LIKE '".$_GET['team_belongings'][4]."') ORDER BY $sortBy $sortOrder, Length(team)";}

    $result = 0;
    $stmt = $dbh->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result_t = 0;
    $teams = $dbh->query('SELECT DISTINCT `team` FROM players ORDER BY Length(`team`) DESC LIMIT 15');
    $result_t = $teams->fetchAll(PDO::FETCH_ASSOC);
    $id_max = intval($dbh->query("SELECT max(id) FROM players")->fetchColumn());
?>

<form action="players_list3.php" method="GET">
<input type="text" id="name" name="search_word" placeholder="search name"  value="<?php echo $searchName ?>"><br><br><b>
    <?php $x=1; foreach ($result_t as $value_t): ?>
        <input type="checkbox" name="team_belongings[]" value="<?php echo $value_t['team'] ?>"
            <?php if(is_array($searchTeam)){if($value_t['team'] == $searchTeam[0]){echo "checked";}} ?>
            <?php if($elements == 2){if($value_t['team'] == $searchTeam[1]){echo "checked";}} ?>
            <?php if($elements == 3){if(($value_t['team'] == $searchTeam[1])or($value_t['team'] == $searchTeam[2])){echo "checked";}} ?>
            <?php if($elements >= 4){if(($value_t['team'] == $searchTeam[1])or($value_t['team'] == $searchTeam[2])or($value_t['team'] == $searchTeam[3])){echo "checked";}} ?>>
        <?php echo $value_t['team'] ?><?php if($x % 5 ==0){echo "<br>";}?><?php $x++ ?>
    <?php endforeach ?></b><br><br>
    <input type="hidden" name="sort" id="searchSort" value="<?php echo $sortOrder ?>">
    <input type="hidden" name="column" id="searchColumn" value="<?php echo $sortBy ?>">
    <button type="submit" id="submitButton" class="button3">
    <i class="fa-regular fa-futbol"></i> Search it！</button><br>

<table class="players=country">
</div>
<tr>
    <th>No. <button class='button5' type="submit" onclick='sortNo()'><i class="fa-solid fa-bars"></i></button>
    <th>name <button class='button5' type="submit" onclick='sortName()'><i class="fa-solid fa-bars"></i></button>
    <th>team <button class='button5' type="submit" onclick='sortTeam()'><i class="fa-solid fa-bars"></i></button>
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
</font></div>
</form>
</font></html>
<div align="right">
    <br>
    <button class="button5" onclick="window.print()">Print this page</button><br>
    <button onclick="document.getElementById('background').background='images/3_3.jpg'"><i class="fa-solid fa-play"></i></button>
    <button onclick="document.getElementById('background').background='images/1_3.jpg'"><i class="fa-solid fa-play"></i></button>
    <button onclick="document.getElementById('background').background='images/0_2.jpg'"><i class="fa-solid fa-play"></i></button>
</div>
<div align="center">
<p>
    <a href="submit.php">go back to index</a>
</p>
</div>

<?php
if(!isset($_SESSION["user_name"])) {
    header("Location: pages/ban.php");} ?>
<script>
    $URL = location.href;
    function sortNo(){
        if ($URL.match(/sort=ASC&column=No/)){
            document.getElementById("searchSort").setAttribute("value","DESC")
        }else{
            document.getElementById("searchSort").setAttribute("value","ASC")
            document.getElementById("searchColumn").setAttribute("value","No")}}
    function sortName(){
        if ($URL.match(/sort=ASC&column=name/)){
            document.getElementById("searchSort").setAttribute("value","DESC")
        }else{
            document.getElementById("searchSort").setAttribute("value","ASC")
            document.getElementById("searchColumn").setAttribute("value","name")}}
    function sortTeam(){
        if ($URL.match(/sort=ASC&column=Length%28team%29/)){
            document.getElementById("searchSort").setAttribute("value","DESC")
        }else{
            document.getElementById("searchSort").setAttribute("value","ASC")
            document.getElementById("searchColumn").setAttribute("value",'Length(team)')}}
</script>
