

UTF-8

CR/LF

<font color='#e0ff80'><div align='center'><br>
        <body background="images/0_<?php echo rand(3,6); ?>.jpg">
        <?php session_start();
        ini_set('display_errors',1);
        error_reporting(E_ALL);
        if(isset($_POST['datapost'])){
            $_SESSION['No'] = $_POST['No'];
            $_SESSION['team'] = $_POST['team'];
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['age'] = $_POST['age'];
            header('Location: regist.php');
        }
        ?>
        <html lang="ja">
        <head>
            <meta charset="UTF-8">
            <title>PHP_TEST</title>
        </head>
        <body>
        <h1>Welcome to JoBins Test2!</h1>
        </p>write your </font><font color='red'>favorite Soccer player </font><font color='#e0ff80'>below!</p>
    <form action="" method="post">
        <input type="int" name="No" placeholder="No"><br>
        <input type="text" name="name" placeholder="name"><br>
        <input type="text" name="team" placeholder="team"><br>
        <input type="int" name="age" placeholder="age"><br><br>
        <input type="submit" name="datapost">

        <font color='white'>
            </p>null of team & age is allowed</p></font>
    </form>
    </body>

    </html>
</font></div>
</html>