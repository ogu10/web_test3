<html lang="ja">
<font color='white'>
    <head><!--<link rel="stylesheet" href="/web_test3/pages/background_test.css">-->
        <link rel="stylesheet" href="/web_test3/pages/style1.css"></head>
    <?php session_start();
    /*header("Refresh:2");*/?>
    you are <?php echo "</font>"."<font color='lime'>".$_SESSION['user_name']."</font>"; ?>
    <script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>
    <script src="pages/function.js"></script>
    <div align="right">
        <a href="pages/log_out.php">
            <button type="button" name="out_button" id="button">
                <i class="fa-solid fa-right-from-bracket"></i> log out</button></a></div>
    <body id="background" background="images/3_3.jpg">
<!--    <div class="main_imgBox">
        <div class="main_img" style="background-image: url(images/3_3.jpg)"></div>
        <div class="main_img" style="background-image: url(images/3_2.jpg)"></div>-->
    </div>
    <br>
    <div align='center'>
        <font color=red>

        <?php
        include 'pages/connection.php';

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
        $query =  "SELECT * FROM players WHERE `name` LIKE '%$searchName%' ORDER BY $sortBy $sortOrder, Length(team)";
        }else{
        $query =  "SELECT * FROM players WHERE `name` LIKE '%$searchName%' AND `team` IN ($array) ORDER BY $sortBy $sortOrder, Length(team)";}
        /*var_dump($query);*/

        $result = 0;
        $stmt = $dbh->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result_t = 0;
        $teams = $dbh->query('SELECT DISTINCT `team` FROM players ORDER BY Length(`team`) DESC LIMIT 15');
        $result_t = $teams->fetchAll(PDO::FETCH_ASSOC);
        $id_max = intval($dbh->query("SELECT max(id) FROM players")->fetchColumn());
        ?>

            <form name="form1" id="form1" action="players_list5.php" method="GET">
            <input type="text" id="search_word" name="search_word" placeholder="search name"  value="<?php echo $searchName ?>">
            <input type="button" value="clear" onclick="clearName()" /><br><br><b>
                <?php $x=1; foreach ($result_t as $value_t): ?>
                    <input type="checkbox" name="team_belongings[]" value="<?php echo $value_t['team'] ?>" id="team<?php echo $x ?>"
                        <?php if(is_array($searchTeam)){if(in_array($value_t['team'], $searchTeam)){echo "checked";}} ?>>
                    <?php if($value_t['team'] == ''){echo "-no data-";}else{echo $value_t['team'];} ?><?php if($x % 5 ==0){echo "<br>";}?><?php $x++ ?>
                <?php endforeach ?><br><br></b>
            <input type="hidden" name="sort" id="searchSort" value="<?php echo $sortOrder ?>">
            <input type="hidden" name="column" id="searchColumn" value="<?php echo $sortBy ?>">
            <input type="hidden" name="deleteID" id="deleteID" value="<?php echo $deleteID ?>">
            <button type="submit" id="submitButton" class="button3">
                <i class="fa-regular fa-futbol"></i> Search it???</button><br>
                <table class="players=country">
                    <!--<div id="aa"><p>test</p></div>-->
    </div>
        <th>No. <button class='button5' type="submit" onclick="sortFunction('No')"><i class="fa-solid fa-bars"></i></button>
        <th>name <button class='button5' type="submit" onclick="sortFunction('name')"><i class="fa-solid fa-bars"></i></button>
        <th>team <button class='button5' type="submit" onclick="sortFunction('Length(team)')"><i class="fa-solid fa-bars"></i></button>
        <th>update</th>
    <th>delete</th>
    </tr>
    ??? <?php $x=1; foreach ($result as $value): ?>
        <tr>
            <td>
                ???<?php echo $value['No'] ?></td>
            <td>
                ???<?php echo $value['name'] ?>
                <?php
                if ($value["id"]== $id_max){echo "<font color='red'>"."new!"."</font>";} ?></td>
            <td>
                ???<?php /*$team_list = isset($value['team'])? $value['team']: "-no data-";*/
                echo $value['team']; ?></td>
            <td>
                <?php echo "<!--<button class=`button3`>--><a href=pages/edit.php?id=" . $value["id"] . ">"; ?>
                <i class="fa-solid fa-pen-nib"></i>
                <?php echo "</a>\n";
                echo "<td>";
                echo "<button class='button3' id='deleteButton' value='${value["id"]}' onclick='deleteFunc(this)'>";
                echo "<input type=hidden id='name${value["id"]}' value='${value["name"]}'> ";
/*                echo $value["id"];*/?>
                <i class="fa-solid fa-trash"></i>
                <?php echo "</button>\n";
                echo "</tr>\n"; ?>
                <?php $x++ ?>
        </tr>
        <?php endforeach ?>
    </table>
</div></body>
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
    const el = document.getElementsByClassName("checks");
    /*var elements = document.getElementById("elementNumber").value;*/
        function clearName(){
            var search_word = document.getElementById("search_word");
            search_word.value = '';
            if(checkbox1[1].checked = true){
            for(i = 0; i < checkbox1.length; i++) {
                checkbox1[i].checked = false}
            }else{
            for(i = 0; i <= checkbox1.length; i++) {
                checkbox1[i].checked = true}
            }}
/*
    function checked(){
        var search_word = document.getElementById("search_word");
        search_word.value = '';
        for(i = 0; i < checkbox1.length; i++) {
            checkbox1[i].checked = true}
        this.onclick = clearName}
*/

/*    var deleteButton = document.getElementById('deleteButton');
    deleteButton.addEventListener('click', function() {
      var answer = window.confirm('Delete it...?');
        alert('you clicked button-id: ' + this.value);
                if(answer) {
                    window.location.href= 'pages/delete.php?id=' + this.value;
                 }else {
                 }})*/

    function deleteFunc(target){
        var target_value = target.value;
        var nameID = 'name' + target_value
        var name = document.getElementById(nameID).value;
        var answer = window.confirm('???Caution!???\nYou are deleting \"' + name + '\" !!!!');
/*        alert('you clicked button-id: ' + target_value);*/
        if(answer){
            document.getElementById('deleteID').value = target_value;
/*            document.getElementById('aa').innerHTML = target_value;*/
/*            document.getElementById('$deleteID').innerHTML = target_value;*/
/*            window.location.href= 'pages/delete.php?id=' + target_value;
            window.reload();*/
            document.form1.submit();
        }else{
        }}

/*
        'use strict';

// ?????????????????????id?????????
        document.getElementById('button').addEventListener('click', function(){
            alert('id??????' + this.id + '????????????????????????????????????');
        });
*/
</script>
