<?php

include "connect_cms.php";

$conn = openConn();

$e_name = trim($_GET["ENAME"]);
$c_name = trim($_GET["CNAME"]);
$ce_year = intVal(trim($_GET["YEAR"]));
$t_name = trim($_GET["TNAME"]);
$l_id = trim($_GET["LID"]);
$l_name = trim($_GET["LNAME"]);
$l_contact = trim($_GET["LCNO"]);
$p1_id = trim($_GET["P1ID"]);
$p1_name = trim($_GET["P1NAME"]);
$p2_id = trim($_GET["P2ID"]);
$p2_name = trim($_GET["P2NAME"]);

// modal data
// $e_name = "Tech Cup";
// $c_name = "Web Development";
// $ce_year = 2020;
// $t_name = "TEAM1";
// $l_id = "K173791";
// $l_name = "Ali Faisal";
// $l_contact = "0345-1248906";
// $p1_id = "K163741";
// $p1_name = "Mustufa Qadri";
// $p2_id = "K173918";
// $p2_name = "Avinash";

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

// now insert into event_team table
$insert_ET = "INSERT INTO event_team (team_name) VALUES ('$t_name')";
$r_insert_ET = $conn->query($insert_ET) or die("error: " . $conn->error);
$t_ID = $conn->insert_id;

// event_team.team_id is fetcehd
// echo "$t_ID";

// now insert into roundscore

// round
// 101 : Round 1
// 102: Qualifier 1
// 103: Qualifier 2

// since the team is being registered we will insert 101 in roundscore.round_id
$insert_RS = "INSERT INTO roundscore (team_id, compevent_id, round_id) VALUES ($t_ID, $ce_ID, 101)";
$r_insert_RS = $conn->query($insert_RS) or die("error: " . $conn->error);

// now insert into participants

// activate reporting
$driver = new mysqli_driver();
$driver->report_mode = MYSQLI_REPORT_ALL;

// if there is a first participant
if($p1_id != ""){
  try{
    $insert_PA = "INSERT INTO participants (nu_id, nu_mail, full_name) VALUES ('$p1_id', '$p1_id@nu.edu.pk', '$p1_name')";
    $r_insert_PA = $conn->query($insert_PA);
  }
  catch(mysqli_sql_exception $e){
    // if participant exists: exception will be caught
    // echo $e->__toString();
  }
}

// if there is a second participant
if($p2_id != ""){
  try{
    $insert_PA = "INSERT INTO participants (nu_id, nu_mail, full_name) VALUES ('$p2_id', '$p2_id@nu.edu.pk', '$p2_name')";
    $r_insert_PA = $conn->query($insert_PA);
  }
  catch(mysqli_sql_exception $e){
    // if participant exists: exception will be caught
    // echo $e->__toString();
  }
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

  try{
    $insert_PA = "INSERT INTO participants (nu_id, nu_mail, full_name) VALUES ('$l_id', '$l_id@nu.edu.pk', '$l_name')";
    $r_insert_PA = $conn->query($insert_PA);
  }
  catch(mysqli_sql_exception $e){
    // if participant exists: exception will be caught
    // echo $e->__toString();
  }
}

// insert into leader table

// insert leader
try{
  $insert_LE = "INSERT INTO leader (nu_id, team_id, contact_no) VALUES ('$leader_id', $t_ID, '$l_contact')";
  $r_insert_LE = $conn->query($insert_LE);
}
catch(mysqli_sql_exception $e){
  // echo $e->__toString();
}

// if part 1 is not leader and it exists
if($p1_id != $leader_id && $p1_id != ""){
  try{
    $insert_P1 = "INSERT INTO leader (nu_id, team_id) VALUES ('$p1_id', $t_ID)";
    $r_insert_P1 = $conn->query($insert_P1);
  }
  catch(mysqli_sql_exception $e){
    // echo $e->__toString();
  }
}

// if part 2 is not leader and it exists
if($p2_id != $leader_id && $p2_id != ""){
  try{
    $insert_P1 = "INSERT INTO leader (nu_id, team_id) VALUES ('$p2_id', $t_ID)";
    $r_insert_P1 = $conn->query($insert_P1);
  }
  catch(mysqli_sql_exception $e){
    // echo $e->__toString();
  }
}

// send team ID as response
echo "$t_ID";

 ?>
