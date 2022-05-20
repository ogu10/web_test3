<?php
session_start();
include '../../connection.php';
$sortBy = isset($_GET["column"])? $_GET["column"] : "id";
$sortOrder = isset($_GET["sort"])? $_GET["sort"] : "DESC";
$searchName = isset($_GET["search_word"])? $_GET["search_word"] : '';
$searchTeam = isset($_GET["team_belongings"])? $_GET["team_belongings"] : [];
$elements = is_array($searchTeam)? count($searchTeam): '0';
$deleteID = isset($_GET["deleteID"])? $_GET["deleteID"]: '0000';
/*echo "<input type=hidden id='elementNumber' value='$elements'> ";*/

$array = '';
$y = 1;
foreach ($searchTeam as $teams):
    $array .= "'".$teams."'";
    if($y < $elements){
        $array .= ", ";}
    $y ++;
endforeach;


$del = $dbh->prepare('DELETE FROM players WHERE id = :id');
$del->execute(array(':id' => $deleteID));
/*echo $deleteID;*/
if($array == ''){
    $query =  "SELECT * FROM players WHERE `name` LIKE '%$searchName%' ORDER BY $sortBy $sortOrder, Length(team) LIMIT 14";
}else{
    $query =  "SELECT * FROM players WHERE `name` LIKE '%$searchName%' AND `team` IN ($array) ORDER BY $sortBy $sortOrder, Length(team) LIMIT 14";}
/*var_dump($query);*/

$result = 0;
$stmt = $dbh->query($query);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$result_t = 0;
$teams = $dbh->query('SELECT DISTINCT `team` FROM players ORDER BY Length(`team`) DESC LIMIT 15');
$result_t = $teams->fetchAll(PDO::FETCH_ASSOC);
$id_max = intval($dbh->query("SELECT max(id) FROM players")->fetchColumn());
?>