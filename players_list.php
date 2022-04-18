<html lang="ja">
<font color='white'>
<?php session_start() ?>
you are <?php echo "</font>"."<font color='#ff1493'>".$_SESSION['user_name']."</font>"; ?>
<script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>
<div align="right">
    <a href="pages/log_out.php">
        <button type="button" name="out_button" id="button">
            <i class="fa-solid fa-right-from-bracket"></i> log out</button></a></div>
<body background="images/1_4.jpg"><br><br><br><br>
<font color='#e0ff80'>
    <div align='center'><br>
<div style="padding: 10px; margin-bottom: 10px; width:380px; border: 5px double #333333; background-color: white;">
    <font color=blue>
        <?php
        include 'pages/connection.php';
        $stmt = $dbh->query('SELECT * FROM players ORDER BY `players`.`id` DESC LIMIT 16');
        $result = 0;
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<table>\n";
        echo "<tr>\n";
        echo "<th>No</th>";
        echo "</th><th>player</th><th><th>team</th>\n";
        echo "</tr>\n";
        foreach ($result as $players) {
            echo "<tr>\n";
            echo "<td>" . $players["No"] . "</td>\n";
            echo "<td>" . $players["name"] . "</td>\n";
            echo "<td>" ."<td>".$players["team"] . "</td>\n";
            echo "<td><td>\n";
            echo "<button><a href=pages/edit.php?id=" . $players["id"] . ">update</a></button>";
            echo "<td><td>";
            echo "<button><a href=pages/delete.php?id=" . $players["id"] . ">delete</a></button>\n";
            echo "</tr>\n";
        }
        echo "</table>\n";
        ?>
        <p>
            <a href="submit.php">go back to index</a>
        </p>
    </font></div>
        </form>
    </div>
</font></html>

<?php
if(!isset($_SESSION["user_name"])) {
    header("Location: pages/ban.php");} ?>