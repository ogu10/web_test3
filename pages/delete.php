<div align='center'><h1></h1>
<?php

try {

    include 'connection.php';
    $del = $dbh->prepare('DELETE FROM players WHERE id = :id');

    $del->execute(array(':id' => $_GET["id"]));
    header('Refresh:0; url=../players_list5.php');
    die();
} catch (Exception $e) {
          echo 'エラーが発生しました。:' . $e->getMessage();
}

?>

<!--
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Success!</title>
  </head>
  <body>
  <p>
      <a href="players_list5.php">go back to index</a>
  </p>
  <p>
      <a href="players_list5.php">go to answer list</a>
  </p>
  </body>
</html>
</div>-->