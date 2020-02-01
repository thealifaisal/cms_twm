<?php

include "connect_cms.php";

$conn = openConn();

$team_name = trim($_GET["TNAME"]);

$get_team_det = "SELECT team_details FROM twm_team WHERE team_name = '$team_name'";
$result = $conn->query($get_team_det) or die("error: " . $conn->error);
$team_det = $result->fetch_assoc();
$team_det = $team_det["team_details"];

echo $team_det;

?>
