<?php
session_start(); ?><br>
Are you <?php echo "<font color='#ff1493'>".$_SESSION['user_name']."</font>"; ?>?<br>
If you so, go submit page!
<a href="../submit.php">
    <button type="button" name="out_button" id="button">Go!</button></a>

<br><br>
If you are not, Please log out
<a href="log_out.php">
    <button type="button" name="out_button" id="button">Log out ノシ</button></a>