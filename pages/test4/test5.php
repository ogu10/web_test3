<head>
    <link rel="icon" type="image/png" sizes="192x192" href="../images/favicons/android-chrome-192x192.png">
    <link rel="stylesheet" href="/web_test3/pages/test4/test5.css">
    <link rel="stylesheet" href="/web_test3/pages/test4/test4.css">
    <link rel="stylesheet" href="/web_test3/pages/test4/Mr_button.css">
    <!--<link rel="stylesheet" href="/web_test3/pages/style1.css">--></head>
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
<div class="content">
</div>
</div >
<?php session_start();
/*header("Refresh:2");*/?>
<font color='white'>&nbsp;you are <?php echo "</font>"."<font color='lime'>".$_SESSION['user_name']."</font>"; ?>
<script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>
<script src="pages/function.js"></script>
<div align="right">
    <a href="../log_out.php">
        <button type="button" name="out_button" id="button">
            <i class="fa-solid fa-right-from-bracket"></i> log out</button></a>&nbsp;&nbsp;</div>
<body id="background" background="../../images/4_9.jpg" alt="objectfit"></body>
<!--    <div class="main_imgBox">
        <div class="main_img" style="background-image: url(images/3_3.jpg)"></div>
        <div class="main_img" style="background-image: url(images/3_2.jpg)"></div>-->
</div>
<br>
<div align='center'>
<font color=red>
<?php
include '../connection.php';
$sortBy = isset($_GET["column"])? $_GET["column"] : "id";
$sortOrder = isset($_GET["sort"])? $_GET["sort"] : "DESC";
$searchName = isset($_GET["search_word"])? $_GET["search_word"] : '';
$searchTeam = isset($_GET["team_belongings"])? $_GET["team_belongings"] : [];
$elements = is_array($searchTeam)? count($searchTeam): '0';
$deleteID = isset($_GET["deleteID"])? $_GET["deleteID"]: '0000';
/*echo "<input type=hidden id='elementNumber' value='$elements'> ";*/

$array = '';
$y = 1;
foreach ($searchTeam as $teams):
    $array .= "'".$teams."'";
    if($y < $elements){
        $array .= ", ";}
    $y ++;
endforeach;


$del = $dbh->prepare('DELETE FROM players WHERE id = :id');
$del->execute(array(':id' => $deleteID));
/*echo $deleteID;*/
if($array == ''){
    $query =  "SELECT * FROM players WHERE `name` LIKE '%$searchName%' ORDER BY $sortBy $sortOrder, Length(team) LIMIT 14";
}else{
    $query =  "SELECT * FROM players WHERE `name` LIKE '%$searchName%' AND `team` IN ($array) ORDER BY $sortBy $sortOrder, Length(team) LIMIT 14";}
/*var_dump($query);*/

$result = 0;
$stmt = $dbh->query($query);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$result_t = 0;
$teams = $dbh->query('SELECT DISTINCT `team` FROM players ORDER BY Length(`team`) DESC LIMIT 15');
$result_t = $teams->fetchAll(PDO::FETCH_ASSOC);
$id_max = intval($dbh->query("SELECT max(id) FROM players")->fetchColumn());
?>
<div class="wrap">
        <div align="center" class="box box2">
            <div class="submitForm">
                <font color='Yellow'>
                    <h1>Add Form!</h1></font>
                <form name="form2" id="form2" action="../regist4.php" method="post">
                    <input type="int" id="no2" name="no2" placeholder="No"  value="8888"><br>
                    <input type="text" id="name2" name="name2" placeholder="name" oninput="checkName()"><br>
                    <input type="text" id="team2" name="team2" placeholder="team"><br><br><font color='Lime'>
                                <font color=#ff4500><b>
                                    <?php
                                    if($_SESSION['message']){
                                        /*echo $_SESSION['message'];*/
                                        if($_SESSION['message'] == "success"){
                                            echo "上手くいったっぽいっす☆";
                                        }else{
                                            echo "もうあるって!!!";
                                        }
                                    echo "<br>";
                                    }
                                    $_SESSION['message'] = "";
                                    /*echo "<br>";
                                    echo $_SESSION['message'];*/ ?>
                                    </b></font><br>
                        <input type="radio" name="league_id2" value="5">Ligue 1
                        <input type="radio" name="league_id2" value="4">La Liga
                        <input type="radio" name="league_id2" value="2">Serie A<br>
                        <input type="radio" name="league_id2" value="3">Bundesliga
                        <input type="radio" name="league_id2" value="1" checked>Premium League
                    </font>
                    <br><br>
                    <button type="button" name="datapost" class="button3" onclick="checkBlank()">
                        <i class="fa-regular fa-futbol"></i> Add it！</button></form>
            </div></div>


    <div class="box box1">
        <form name="form1" id="form1" action="test5.php" method="GET">
            <br><br>
            <font color='red'>
                <h1>Search Form!</h1></font>
            <input type="text" id="search_word" name="search_word" placeholder="search name"  value="<?php echo $searchName ?>">
            <input type="button" value="clear" onclick="clearName()" /><br><br><b>
                <?php $x=1; foreach ($result_t as $value_t): ?>
                    <input type="checkbox" name="team_belongings[]" value="<?php echo $value_t['team'] ?>" id="checkbox"
                        <?php if(is_array($searchTeam)){if(in_array($value_t['team'], $searchTeam)){echo "checked";}} ?>>
                    <?php if($value_t['team'] == ''){echo "-no data-";}else{echo $value_t['team'];} ?><?php if($x % 5 ==0){echo "<br>";}?><?php $x++ ?>
                <?php endforeach ?><br><br></b>
            <input type="hidden" name="sort" id="searchSort" value="<?php echo $sortOrder ?>">
            <input type="hidden" name="column" id="searchColumn" value="<?php echo $sortBy ?>">
            <input type="hidden" name="deleteID" id="deleteID" value="<?php echo $deleteID ?>">
            <button type="submit" id="submitButton" class="button3">
                <i class="fa-regular fa-futbol"></i> Search it！</button><br><br>

        <table class="players_list">
            <th>No. <button class='button5' type="submit" onclick="sortFunction('No')"><i class="fa-solid fa-bars"></i></button>
            <th>name <button class='button5' type="submit" onclick="sortFunction('name')"><i class="fa-solid fa-bars"></i></button>
            <th>team <button class='button5' type="submit" onclick="sortFunction('Length(team)')"><i class="fa-solid fa-bars"></i></button>
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
                    　<?php /*$team_list = isset($value['team'])? $value['team']: "-no data-";*/
                    echo $value['team']; ?></td>
                <td>
                    <?php echo "<!--<button class=`button3`>--><a href=../edit.php?id=" . $value["id"] . ">"; ?>
                    <i class="fa-solid fa-pen-nib"></i>
                    <?php echo "</a>\n";
                    echo "<td>";
                    echo "<button class='button3' id='deleteButton' value='${value["id"]}' type= 'button' onclick='deleteFunc(this)'>";
                    echo "<input type=hidden id='name${value["id"]}' value='${value["name"]}'> ";
                    /*                echo $value["id"];*/?>
                    <i class="fa-solid fa-trash"></i>
                    <?php echo "</button>\n";
                    echo "</tr>\n"; ?>
                    <?php $x++ ?>
                    <?php endforeach ?>
        </table></form>
</div>


<script>
    function sortFunction(param){
        var oldSortColumn = "<?php echo $sortBy; ?>"
        if(oldSortColumn === param){
            if (document.getElementById("searchSort").value === "ASC")
            {var sort = "DESC";}
            else
            {var sort = "ASC";}}
        else {
            var sort = "ASC";}

        document.getElementById("searchSort").setAttribute("value",sort)
        document.getElementById("searchColumn").setAttribute("value",param)}
    /*checkbox1.onclick = clearName();*/
    const checkbox1 = document.getElementsByName("team_belongings[]")
    /*var elements = document.getElementById("elementNumber").value;*/
    function clearName(){
        var search_word = document.getElementById("search_word");

        let count = 0;
        for (let i = 0; i < checkbox1.length; i++) {
            if (checkbox1[i].checked) {
                count++;}}
        if(count == 0 && search_word.value == ''){
            for(i = 0; i < checkbox1.length; i++) {
                checkbox1[i].checked = true}
        }else{
            search_word.value = '';
            for(i = 0; i <= checkbox1.length; i++) {
                checkbox1[i].checked = false}
        }}


    function deleteFunc(target){
        var target_value = target.value;
        var nameID = 'name' + target_value
        var name = document.getElementById(nameID).value;
        var answer = window.confirm('【Caution!】\nYou are deleting \"' + name + '\" !!!!');
        /*        alert('you clicked button-id: ' + target_value);*/
        if(answer){
            document.getElementById('deleteID').value = target_value;
            document.form1.submit();
        }
    }

    function checkBlank(){
        var playerNumber = document.getElementById("no2").value;
        var playerName = document.getElementById("name2").value;
        if(playerNumber && playerName){
            document.form2.submit();
        }else if(playerNumber){
            if(!isNaN(playerNumber)){
                var answer2 = window.confirm('えname入れないの？');
                if(answer2){document.form2.submit();}
            }else{
                alert('数字で入れろよ');
            }
        }else if(!(playerNumber) && !(playerName)){
            alert('なんか入れなよ');
        }else{
            alert('numberを入れろよ');
        }
    }

</script>
