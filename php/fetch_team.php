<?php

include "connect_cms.php";

$conn = openConn();

$team_id = intVal(trim($_GET["TID"]));
// $team_id = 3;

// fetch team name from event_team
$get_teamname = "SELECT team_name FROM event_team WHERE team_id = $team_id";
$r_get_teamname = $conn->query($get_teamname) or die("error: " . $conn->error);

if($r_get_teamname->num_rows == 0){
  // if there is no team against team_id
  // echo error and exit
  die("error: no team found");
}

$team_name = $r_get_teamname->fetch_assoc();
$team_name = $team_name["team_name"];

// fetch compevent_id, solved_prob, total_prob
// $get_CEST = "SELECT compevent_id, solved_prob, total_prob FROM roundscore WHERE team_id = $team_id";
// the change is made because on update team and delete team page we dont want score
// which is solved_prob, total_prob. Since these fields are not required we will get multiple
// compevent_id s, since we want just one we will add a UNIQUE constraint on SELECT statement.
$get_CEST = "SELECT DISTINCT compevent_id FROM roundscore WHERE team_id = $team_id";
$r_get_CEST = $conn->query($get_CEST) or die("error: " . $conn->error);
$row = $r_get_CEST->fetch_assoc();
$ce_id = $row["compevent_id"];
// $sp = $row["solved_prob"];
// $tp = $row["total_prob"];

// fetch participants and leader
// -- fetch nu_id from leader table against team_id as sub-query and search in participants
$get_PA = "SELECT nu_id, full_name FROM participants WHERE nu_id IN (SELECT nu_id FROM leader WHERE team_id = $team_id)";
$r_get_PA = $conn->query($get_PA) or die("error: " . $conn->error);

$part_arr = [];

while($row = $r_get_PA->fetch_assoc()){
  $part_arr[] = $row;
}

// -- fetch leader nu_id from leader table, contact_no is not null for leader
$get_LE = "SELECT nu_id, contact_no FROM leader WHERE team_id = $team_id AND contact_no IS NOT NULL";
$r_get_LE = $conn->query($get_LE) or die("error: " . $conn->error);
$row = $r_get_LE->fetch_assoc();
$leader_id = $row["nu_id"];
$leader_no = $row["contact_no"];

// fetch comp_id, event_id, year from compevent table
$get_CEY = "SELECT comp_id, event_id, year FROM compevent WHERE compevent_id = $ce_id";
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

// make a key-value pair to be encoded in json

$participants = [];

// keys: nu_id, full_name
foreach($part_arr as $row){
  $nu_id = $row["nu_id"];

  $obj["p_id"] = $nu_id;
  $obj["p_name"] = $row["full_name"];

  if($nu_id == $leader_id){
    $obj["p_cno"] = $leader_no;
  }
  else{
    $obj["p_cno"] = "0";
  }

  $participants[] = $obj;
}

// echo json_encode($participants);
// -- [{"p_id":"K173791","p_name":"Ali Faisal","p_cno":"0345-1248906"},{"p_id":"K173810","p_name":"Aiman Siddiqui","p_cno":"0"}]

$data["members"] = $participants;
$data["team_name"] = $team_name;
// $data["solved_prob"] = $sp;
// $data["total_prob"] = $tp;
$data["comp_name"] = $c_name;
$data["event_name"] = $e_name;
$data["event_year"] = $_year;

echo json_encode($data);
// -- {"members":[{"p_id":"K173791","p_name":"Ali Faisal","p_cno":"0345-1248906"},{"p_id":"K173810","p_name":"Aiman Siddiqui","p_cno":"0"}],
//"team_name":"hackers","solved_prob":"0","total_prob":"0","comp_name":"Web Development","event_name":"Tech Cup","event_year":"2020"}

?>
