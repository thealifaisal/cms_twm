<?php

include "connect_cms.php";

$conn = openConn();

$e_name = trim($_GET["ENAME"]);
$c_name = trim($_GET["CNAME"]);
$ce_year = intVal(trim($_GET["YEAR"]));
$t_id = trim($_GET["TID"]);
$t_name = trim($_GET["TNAME"]);
$l_id = trim($_GET["LID"]);
$l_name = trim($_GET["LNAME"]);
$l_contact = trim($_GET["LCNO"]);
$p1_id = trim($_GET["P1ID"]);
$p1_name = trim($_GET["P1NAME"]);
$p2_id = trim($_GET["P2ID"]);
$p2_name = trim($_GET["P2NAME"]);
// $total_prob = intVal(trim($_GET["TP"]));
// $solved_prob = intVal(trim($_GET["SP"]));

// modal data
// $e_name = "Tech Cup";
// $c_name = "Web Development";
// $ce_year = 2020;
// $t_name = "TEAM1";
// $l_id = "K173791";
// $l_name = "XYZ";
// $l_contact = "0345-0000000";
// $p1_id = "K17****";
// $p1_name = "XYZ";
// $p2_id = "K17****";
// $p2_name = "ABCD";

// get event ID
$getEID = "SELECT event_id FROM cms_twm.event WHERE event_name = '$e_name'";
$rEID = $conn->query($getEID) or die ("error: " . $conn->error);
$e_ID = $rEID->fetch_assoc();
$e_ID = intVal($e_ID["event_id"]);

// get competition ID
$getCID = "SELECT competition_id FROM competition WHERE competition_name = '$c_name'";
$rCID = $conn->query($getCID) or die ("error: " . $conn->error);
$c_ID = $rCID->fetch_assoc();
$c_ID = intVal($c_ID["competition_id"]);

// echo "$e_ID";
// echo "$c_ID";

$checkECY = "SELECT compevent_id FROM compevent WHERE comp_id = $c_ID AND event_id = $e_ID AND year = $ce_year";
$r_checkECY = $conn->query($checkECY)  or die ("error: " . $conn->error);

// check if combination of event_id, comp_id, year exists in table
// if exists: num_rows == 1, get the compevent_id
// else : num_rows == 0, so insert the combination and get the compevent_id
if($r_checkECY->num_rows == 1){
  $ce_ID = $r_checkECY->fetch_assoc();
  $ce_ID = intVal($ce_ID["compevent_id"]);
}
else{
  $insert_CE = "INSERT INTO compevent (comp_id, event_id, year) VALUES($c_ID, $e_ID, $ce_year)";
  $r_insert_CE = $conn->query($insert_CE) or die ("error: " . $conn->error);
  $ce_ID = $conn->insert_id;
}

// compevent.compevent_id is fetched
// echo "$ce_ID";

// now update into event_team table
$update_ET = "UPDATE event_team SET team_name = '$t_name' WHERE team_id = $t_id";
$r_update_ET = $conn->query($update_ET) or die("error: " . $conn->error);
// $t_ID = $conn->insert_id;

// event_team.team_id is fetcehd
// echo "$t_ID";

// now insert into roundscore

// round
// 101 : Round 1
// 102: Qualifier 1
// 103: Qualifier 2

// since the team is being registered we will insert 101 in roundscore.round_id
// $update_RS = "UPDATE roundscore SET compevent_id = $ce_ID, solved_prob = $solved_prob, total_prob = $total_prob WHERE team_id = $t_id";
$update_RS = "UPDATE roundscore SET compevent_id = $ce_ID WHERE team_id = $t_id";
$r_update_RS = $conn->query($update_RS) or die("error: " . $conn->error);

// now insert into participants

// ************** for now cms doesnt support updation of nu_id for participants *****************

// if there is a first participant
if($p1_id != ""){
  $update_PA = "UPDATE participants SET full_name = '$p1_name' WHERE nu_id = $p1_id";
  $r_update_PA = $conn->query($update_PA);
}

// if there is a second participant
if($p2_id != ""){
  $update_PA = "UPDATE participants SET full_name = '$p2_name' WHERE nu_id = $p2_id";
  $r_update_PA = $conn->query($update_PA);
}

$leader_id = "";

// participant 1 is also a leader
if($p1_id == $l_id){
  // already inserted above
  $leader_id = $p1_id;
}
// // participant 2 is also a leader
else if($p2_id == $l_id){
  // already inserted above
  $leader_id = $p2_id;
}
else{
  // leader is neither participant 1 nor participant 2

  $leader_id = $l_id;

  $update_PA = "UPDATE participants SET full_name = '$l_name' WHERE nu_id = $l_id";
  $r_update_PA = $conn->query($update_PA);

  $update_PA = "UPDATE leader SET contact_no = '$l_contact' WHERE nu_id = $l_id AND team_id = $t_id";
  $r_update_PA = $conn->query($update_PA);
}

// insert into leader table

// insert leader
// try{
//   $insert_LE = "INSERT INTO leader (nu_id, team_id, contact_no) VALUES ('$leader_id', $t_ID, '$l_contact')";
//   $r_insert_LE = $conn->query($insert_LE);
// }
// catch(mysqli_sql_exception $e){
//   // echo $e->__toString();
// }
//
// // if part 1 is not leader and it exists
// if($p1_id != $leader_id && $p1_id != ""){
//   try{
//     $insert_P1 = "INSERT INTO leader (nu_id, team_id) VALUES ('$p1_id', $t_ID)";
//     $r_insert_P1 = $conn->query($insert_P1);
//   }
//   catch(mysqli_sql_exception $e){
//     // echo $e->__toString();
//   }
// }
//
// // if part 2 is not leader and it exists
// if($p2_id != $leader_id && $p2_id != ""){
//   try{
//     $insert_P1 = "INSERT INTO leader (nu_id, team_id) VALUES ('$p2_id', $t_ID)";
//     $r_insert_P1 = $conn->query($insert_P1);
//   }
//   catch(mysqli_sql_exception $e){
//     // echo $e->__toString();
//   }
// }

// send team ID as response
echo "$t_ID";

 ?>
