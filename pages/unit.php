<font color="white">
<?php session_start() ?>
    you are <?php echo "</font>"."<font color='#ff1493'>".$_SESSION['user_name']."</font>"; ?>
<script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>
<div align="right">
    <a href="pages/log_out.php">
        <button type="button" name="out_button" id="button">
            <i class="fa-solid fa-right-from-bracket"></i> log out</button></a></div>
<?php
    include 'connection.php';

    $sql = "SELECT
    players.id AS id,
    players.No AS No,
    players.name AS name,
    leagues.league_name AS league,
    leagues.country AS country,
    league_power.strongness AS strongness
    FROM leagues
    INNER JOIN players
    ON leagues.id = players.league_id
    INNER JOIN league_power
    ON leagues.id = league_power.id
    ORDER BY Length(strongness) DESC LIMIT 12";
    $stmt = ($dbh->prepare($sql));
    $stmt->execute();
    $id_max = intval($dbh->query("SELECT max(id) FROM players")->fetchColumn());

    $players_country = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $players_country[] = array(
            'id' => $row['id'],
            'No' => $row['No'],
            'name' => $row['name'],
            'league' => $row['league'],
            'country' => $row['country'],
            'strongness' => $row['strongness']);
    }?>

<HTML>
<head>
    <link rel="stylesheet" href="style1.css"></head>
<body background="images/11_<?php echo rand(6,6); ?>.jpg"></body>
<div align='center'><br><br>

    <table class="players=country">
    <tr>
        <th>No.</th>
        <th>なまえ</th>
        <th>りいぐ</th>
        <th>くに</th>
        <th>つよさ</th>
    </tr>
    　 <?php $x=1; foreach ($players_country as $value): ?>
        <tr>
            <td>
                　<?php echo $value['No'] ?></td>
            <td>
                　<?php echo $value['name'] ?>
                <?php
                if ($value["id"]== $id_max){echo "<font color='red'>"."new!"."</font>";} ?></td>
            <td>
                　<?php echo $value['league'] ?></td>
            <td>
                　<?php echo $value['country'] ?></td>
            <td>
                　<?php echo $value['strongness'] ?></td>
            </td>
        <?php $x++ ?>
        </tr>
    <?php endforeach ?>
</table>
    <p>
        <a href="../players_list5.ph">go back to index</a>
    </p>
</div>
</HTML>

<?php
if(!isset($_SESSION["user_name"])) {
    header("Location: pages/ban.php");} ?>