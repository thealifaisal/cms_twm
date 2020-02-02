<?php

include "connect_cms.php";

$conn = openConn();

$sql = "SELECT team_details FROM twm_team";

$result = $conn->query($sql) or die("error: " . $conn->error);

$arr = [];

$i = 101;

while($row = $result->fetch_assoc()){
  $arr["$i"] = $row["team_details"];
  $i++;
}

// $arr is a key-value pair
// key is team_id from twm_team table
// value is team_details from twm_table
// $arr = ["101"=>"Detail: Web Development", ..., "112"=>"Detail: Event Management Team"];

echo json_encode($arr);

 ?>
