<table id="players_list" class="players_list">
    <th>No. <button class='button5' type="submit" onclick="sortFunction('No')"><i class="fa-solid fa-bars"></i></button>
    <th>name <button class='button5' type="submit" onclick="sortFunction('name')"><i class="fa-solid fa-bars"></i></button>
    <th>team <button class='button5' type="submit" onclick="sortFunction('Length(team)')"><i class="fa-solid fa-bars"></i></button>
    <th>update</th>
    <th>delete</th>
    </tr>
    　 <?php $x=1; foreach ($result as $value): ?>
    <tr>
        <td>
            　<?php echo $value['No'] ?></td>
        <td>
            　<?php echo $value['name'] ?>
            <?php
            if ($value["id"]== $id_max){echo "<font color='red'>"."new!"."</font>";} ?></td>
        <td>
            　<?php /*$team_list = isset($value['team'])? $value['team']: "-no data-";*/
            echo $value['team']; ?></td>
        <td>
            <?php echo "<!--<button class=`button3`>--><a href=../edit.php?id=" . $value["id"] . ">"; ?>
            <i class="fa-solid fa-pen-nib"></i>
            <?php echo "</a>\n";
            echo "<td>";
            echo "<button class='button3' id='deleteButton' value='${value["id"]}' type= 'button' onclick='deleteFunc(this)'>";
            echo "<input type=hidden id='name${value["id"]}' value='${value["name"]}'> ";
            /*                echo $value["id"];*/?>
            <i class="fa-solid fa-trash"></i>
            <?php echo "</button>\n";
            echo "</tr>\n"; ?>
            <?php $x++ ?>
            <?php endforeach ?>
</table>