<?php

include "connect_cms.php";

$conn = openConn();

$team_id = intVal(trim($_GET["TID"]));
// $team_id = 1;

$del_team = "DELETE FROM event_team WHERE team_id = $team_id";
$result = $conn->query($del_team) or die("error: " . $conn->error);

echo "1";

?>
