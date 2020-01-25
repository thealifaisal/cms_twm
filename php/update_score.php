
<?php

include "connect_cms.php";

$conn = openConn();

// var dataString = "TID="+team_id+"+&RNAME="+round_name+"+&TP="+total_prob+"+&SP="+solved_prob;

$team_id = intVal(trim($_GET["TID"]));
$round_name = trim($_GET["RNAME"]);
$total_prob = intVal(trim($_GET["TP"]));
$solved_prob = intVal(trim($_GET["SP"]));

// fetch round_id for round_name from round table
$fetch_rid = "SELECT round_id FROM round WHERE round_name = '$round_name'";
$r_fetch_rid = $conn->query($fetch_rid) or die("error: " . $conn->error);
$round_id = $r_fetch_rid->fetch_assoc();
$round_id = $round_id["round_id"];

// update score
$update_score = "UPDATE roundscore SET total_prob=$total_prob, solved_prob=$solved_prob WHERE team_id=$team_id AND round_id=$round_id";
$r_update_score = $conn->query($update_score) or die("error: " . $conn->error);

echo "success";

?>
