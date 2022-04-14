<?php
session_start();

if(isset($_POST['login'])) {
    if($_POST['name'] == 'user' && $_POST['pass'] == 'pass'){
        header('Location: success.php');}
    else{header('Location: failed.php');}
}
?>
<div lang="ja">

    <font color='white'><div align='center'><br>
            <head>
                <meta charset="UTF-8">
                <title>PHP_TEST_no_5</title>
            </head>
            <h1>Welcome to JoBins Test5!</h1>

            <form action="" method="POST">
                <input type="text" id="name" name="name" placeholder="name"><br>
                <input type="password" name="pass" placeholder="pass"><br>
                <br><br>
                <button type="submit" name="login" id="button">
                    <i class="fa-regular fa-futbol"></i> log in！</button></form><br>
        </div></body>
        </html>

