<?php

include "connect_cms.php";

$conn = openConn();

$event_name = trim($_GET["ENAME"]);
$comp_name = trim($_GET["CNAME"]);
$event_year = intVal(trim($_GET["EYEAR"]));
$winner_id = intVal(trim($_GET["WID"]));
$runner_id = intVal(trim($_GET["RID"]));

// verify team_id from event_team table
$fetch_wid = "SELECT * FROM event_team WHERE team_id=$winner_id";
$r_fetch_wid = $conn->query($fetch_wid) or die("error: " . $conn->error);
if($r_fetch_wid->num_rows == 0){
  die("error: invalid winner team ID " . $winner_id);
}

$fetch_rid = "SELECT * FROM event_team WHERE team_id=$runner_id";
$r_fetch_rid = $conn->query($fetch_rid) or die("error: " . $conn->error);
if($r_fetch_rid->num_rows == 0){
  die("error: invalid runner-up team ID " . $rinner_id);
}

// team_id`s are verified

// get event ID
$getEID = "SELECT event_id FROM cms_twm.event WHERE event_name = '$event_name'";
$rEID = $conn->query($getEID) or die ("error: " . $conn->error);
$event_id = $rEID->fetch_assoc();
$event_id = intVal($event_id["event_id"]);

// get competition ID
$getCID = "SELECT competition_id FROM competition WHERE competition_name = '$comp_name'";
$rCID = $conn->query($getCID) or die ("error: " . $conn->error);
$comp_id = $rCID->fetch_assoc();
$comp_id = intVal($comp_id["competition_id"]);

// check if combination of event_id, comp_id, year exists in table
$checkECY = "SELECT compevent_id FROM compevent WHERE comp_id = $comp_id AND event_id = $event_id AND year = $event_year";
$r_checkECY = $conn->query($checkECY)  or die ("error: " . $conn->error);

// if exists: num_rows == 1, get the compevent_id
// else : this year`s event`s comp doesnt have any members
if($r_checkECY->num_rows == 1){
  $ce_ID = $r_checkECY->fetch_assoc();
  $ce_ID = intVal($ce_ID["compevent_id"]);

  $update_res = "UPDATE compevent SET winner_team_id=$winner_id, runner_up_team_id=$runner_id WHERE compevent_id=$ce_ID";
  $r_update_res = $conn->query($update_res) or die("error: " . $conn->error);
}
else{
  echo "error: invalid event";
}

?>
