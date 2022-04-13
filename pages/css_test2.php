<html>
<head>
    <title>
        Account Page | JoBins
    </title>
    <link rel="stylesheet" href="../css/test.css">
</head>

<body background="../images/01.jpg">
<br>
    <table class="chess_board" width="450" height="450">
        <?php
        for($row=1;$row<=11;$row++)
        {echo "<tr>";
            for ($col=1;$col<=11;$col++)
                {echo "<td></td>";}
        echo "</tr>";} ?>
    </table>
</body>
</html>