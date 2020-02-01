<?php

include "connect_cms.php";

$conn = openConn();

$team_name = trim($_GET["TNAME"]);
$team_details = trim($_GET["TDET"]);

$get_team_det = "UPDATE twm_team SET team_details='$team_details' WHERE team_name = '$team_name'";
$result = $conn->query($get_team_det) or die("error: " . $conn->error);

echo "1";

?>
