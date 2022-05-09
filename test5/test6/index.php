<!DOCTYPE html>
<html lang="ja">

<?php
    if(isset($_GET["name"])) {
        echo "<script src='api.js'></script>";
        $idP = $_GET["name"];
    }
    $idP = rand(1,802);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web_test3/pages/test4/Mr_button.css">
<!--    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/pokemon-font.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->
    <div align="center"><br><br>
    <title>ポケモンWeb図鑑</title>
</head>

<body>
<header>
    <h1><a href="">ポケモンWeb図鑑</a></h1>
</header>

<main>
    <div id="main"></div>
    <form name="formPoke" id="formPoke" action="index.php" method="GET">
        <input type="text" name="name" placeholder="name" value=<?php echo $idP; ?>><br>
        <button type="submit" class="button6">Search it！</button></form>
    <div id="details"></div>
</main>

<div class="back-btn"><br>
    <a href="http://localhost/web_test3/test5/test6/index.php">もどる</a><br>
</div>

<footer>
    <a href="https://www.nintendo.co.jp/software/feature/pokemon.html">&copy;Nintendo</a>
</footer>

</body>
<script src='api.js'></script></div>
</html>
