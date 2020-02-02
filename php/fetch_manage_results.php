<?php

include "connect_cms.php";

$conn = openConn();

$team_id = intVal(trim($_GET["TID"]));
$round_name = trim($_GET["RNAME"]);
// $team_id = 3;
// $round_name = "Round 1";

// search team_id in event_team table that team exists or not
$search_team = "SELECT team_name FROM event_team WHERE team_id = $team_id";
$r_search_team = $conn->query($search_team) or die("error: " . $conn->error);

// if there is no team with team_id then rows returned will not be one
// die means echo and exit
if($r_search_team->num_rows != 1){
  die("error: no team found on ID " . $team_id);
}

// team exists then fetch team_name
$team_name = $r_search_team->fetch_assoc();
$team_name = $team_name["team_name"];

// fetch round_id for round_name from round table
$fetch_rid = "SELECT round_id FROM round WHERE round_name = '$round_name'";
$r_fetch_rid = $conn->query($fetch_rid) or die("error: " . $conn->error);
$round_id = $r_fetch_rid->fetch_assoc();
$round_id = $round_id["round_id"];

// search if pair of team_id and round_id are in roundscore table if not then insert
$search_pair = "SELECT solved_prob, total_prob, compevent_id FROM roundscore WHERE team_id = $team_id AND round_id = $round_id";
$r_search_pair = $conn->query($search_pair) or die("error: " . $conn->error);

if($r_search_pair->num_rows != 1){
  // fetch compevent_id from roundscore table
  $fetch_ceid = "SELECT compevent_id FROM roundscore WHERE team_id = $team_id";
  $r_fetch_ceid = $conn->query($fetch_ceid) or die("error: " . $conn->error);
  $compevent_id = $r_fetch_ceid->fetch_assoc();
  $compevent_id = $compevent_id["compevent_id"];

  // now insert a pair of compevent_id, round_id, team_id in roundscore
  $insert_pair = "INSERT INTO roundscore (round_id, compevent_id, team_id) VALUES ($round_id, $compevent_id, $team_id)";
  // solved_prob, total_prob by default will be 0
  $r_insert_pair = $conn->query($insert_pair) or die("error: " . $conn->error);
  // inserted
  $solved_prob = 0;
  $total_prob = 0;
}
else{
  $row = $r_search_pair->fetch_assoc();
  $solved_prob = $row["solved_prob"];
  $total_prob = $row["total_prob"];
  $compevent_id = $row["compevent_id"];
}

// fetch comp_id, event_id, year from compevent table
$get_CEY = "SELECT comp_id, event_id, year FROM compevent WHERE compevent_id = $compevent_id";
$r_get_CEY = $conn->query($get_CEY) or die("error: " . $conn->error);
$row = $r_get_CEY->fetch_assoc();
$c_id = $row["comp_id"];
$e_id = $row["event_id"];
$_year = $row["year"];

// -- fetch competition_name from competition table, event_name from event table
$get_E = "SELECT event_name FROM event WHERE event_id = $e_id";
$r_get_E = $conn->query($get_E) or die("error: " . $conn->error);
$e_name = $r_get_E->fetch_assoc();
$e_name = $e_name["event_name"];

$get_C = "SELECT competition_name FROM competition WHERE competition_id = $c_id";
$r_get_C = $conn->query($get_C) or die("error: " . $conn->error);
$c_name = $r_get_C->fetch_assoc();
$c_name = $c_name["competition_name"];

// fetch leader details
// -- fetch leader nu_id from leader table, contact_no is not null for leader
$get_LE = "SELECT nu_id, contact_no FROM leader WHERE team_id = $team_id AND contact_no IS NOT NULL";
$r_get_LE = $conn->query($get_LE) or die("error: " . $conn->error);
$row = $r_get_LE->fetch_assoc();
$leader_id = $row["nu_id"];
$leader_no = $row["contact_no"];

// -- fetch leader full_name from participants table
$fetch_lname = "SELECT full_name FROM participants WHERE nu_id = '$leader_id'";
$r_fetch_lname = $conn->query($fetch_lname) or die("error: " . $conn->error);
$leader_name = $r_fetch_lname->fetch_assoc();
$leader_name = $leader_name["full_name"];

// store data in key-value pair array
$data["compevent_id"] = $compevent_id;
$data["event_year"] = $_year;
$data["event_name"] = $e_name;
$data["comp_name"] = $c_name;
$data["team_name"] = $team_name;
$data["round_name"] = $round_name;
$data["leader_id"] = $leader_id;
$data["leader_name"] = $leader_name;
$data["leader_no"] = $leader_no;
$data["solved_prob"] = $solved_prob;
$data["total_prob"] = $total_prob;

echo json_encode($data);

// model data in json encoded format
// {"compevent_id":"3",
//   "event_year":"2020","event_name":"Tech Cup","comp_name":"Speed Programming",
//   "team_name":"Webster","round_name":"Round 1",
//   "leader_id":"K173791","leader_name":"Ali Faisal","leader_no":"03451248906",
//   "solved_prob":"0","total_prob":"0"}

?>
