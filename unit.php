<?php
    $dbh = new PDO('mysql:host=localhost;dbname=jobins;charset=utf8','root','');

    $sql = "SELECT
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
    ORDER BY Length(strongness) DESC LIMIT 16";
    $stmt = ($dbh->prepare($sql));
    $stmt->execute();
    
    $players_country = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $players_country[] = array(
            'No' => $row['No'],
            'name' => $row['name'],
            'league' => $row['league'],
            'country' => $row['country'],
            'strongness' => $row['strongness']);
    }?>

<HTML>
<head>
    <link rel="stylesheet" href="style.css"></head>
<body background="images/11_<?php echo rand(5,6); ?>.jpg"></body>
<div align='center'><br><br><br><br><br><br>

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
                　<?php echo $value['name'] ?></td>
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
        <a href="index.php">go back to index</a>
    </p>
</div>
</HTML>