
<?php

try {$dbh = new PDO("mysql:host=localhost; dbname=jobins; charset=utf8", "root", "");
    $stmt = $dbh->prepare('SELECT * FROM players WHERE id = :id');
    $stmt->execute(array(':id' => $_GET["id"]));
    $result = 0;
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo 'エラーが発生しました。:' . $e->getMessage();
}

?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>
</head>
<div align='center'><br><br><br>
<body background="images/1_7.jpg">
    <meta charset="utf-8">
    <title>Edit</title>

    <div class="contact-form">
        <h2>Edit Channel!</h2>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php if (!empty($result['id'])) echo(htmlspecialchars($result['id'], ENT_QUOTES, 'UTF-8'));?>">
            <p>
                <input type="int" name="No" placeholder="No" value="<?php if (!empty($result['No'])) echo(htmlspecialchars($result['No'], ENT_QUOTES, 'UTF-8'));?>">
            <br>
                <input type="text" name="name" placeholder="name" value="<?php if (!empty($result['name'])) echo(htmlspecialchars($result['name'], ENT_QUOTES, 'UTF-8'));?>">
            <br>
                <input type="text" name="team" placeholder="team" value="<?php if (!empty($result['team'])) echo(htmlspecialchars($result['team'], ENT_QUOTES, 'UTF-8'));?>">
            </p>
            <br>
            <input type="submit" value="Change!">

        </form>
    </div>
    <br><h2>
        <a href="../submit.php"><i class="fa-regular fa-futbol"></i> Go to Index</a><br>
        <a href="../players_list2.php"><i class="fa-solid fa-list"></i> Answer list</a>
    </h2>
    </body>
</html>