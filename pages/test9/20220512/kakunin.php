<?php
include 'connect.php';

$stmt = $dbh->query("SELECT * FROM members ");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<tr>";

echo "<td>";
echo "<form method='post' action='member-post.php'>
            <div class='form-item'>Member's name</div>
            <input type='text' name='name'>" . $results["name"] . "</input>
          </form>";
echo "</td> ";

echo "<td>";
echo "<form method='post' action='member-post.php'>
            <div class='form-item'>Position</div>
            <input type='text' name='position'>" . $results["position"] . "</input>
          </form>";
echo "</td> ";

echo "<td>";
echo "<form method='post' action='member-post.php'>
            <div class='form-item'>Phone</div>
            <input type='text' name='phon-no'>" . $results["phone_no"] . "</input>
          </form>";
echo "</td> ";

echo "<td>";
echo "<form method='post' action='member-post.php'>
            <div class='form-item'>Date</div>
            <input type='text' name='date'>" . $results["join_date"] . "</input>
          </form>";
echo "</td> ";
?>

<div class="edit">
    <button class ="button" type="submit" value="edit">EDIT</button>
</div>