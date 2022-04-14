<div align='center'><h1></h1>
<?php

try {

    include 'connection.php';
    $stmt = $dbh->prepare('DELETE FROM players WHERE id = :id');

    $stmt->execute(array(':id' => $_GET["id"]));
    header('Location: ../players_list.php');
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
      <a href="submit.php">go back to index</a>
  </p>
  <p>
      <a href="players_list.php">go to answer list</a>
  </p>
  </body>
</html>
</div>-->