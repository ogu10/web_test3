<?php
if(isset($_POST['datapost'])) {
    $_SESSION['No'] = isset($_POST['No'])?($_POST['No']):"";
    $_SESSION['team'] = isset($_POST['team'])?($_POST['team']):"";
    $_SESSION['name'] = isset($_POST['name'])?($_POST['name']):"";
    $_SESSION['league_id'] = isset($_POST['league_id'])?($_POST['league_id']):"";
    header('Location: pages/regist4.php');} ?>


<form id="form2" action="pages/regist4.php" method="post">
        <input type="int" name="No" placeholder="No"><br>
        <input type="text" id="name" name="name" placeholder="name" oninput="checkName()"><br>
        <input type="text" name="team" placeholder="team"><br><br><font color='Lime'>
            <input type="radio" name="league_id" value="5">Ligue 1
<input type="radio" name="league_id" value="4">La Liga
<input type="radio" name="league_id" value="2">Serie A
<input type="radio" name="league_id" value="3">Bundesliga
            <input type="radio" name="league_id" value="1">Premium League
</font>
        <br>
        <button type="submit" name="datapost" <!--id="button"--> class="button3">
        <i class="fa-regular fa-futbol"></i> Kick off！</button></form>