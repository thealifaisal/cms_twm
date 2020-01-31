<?php

include "connect_cms.php";

$conn = openConn();

$username = trim($_GET["username"]);
$password = trim($_GET["password"]);
$role = trim($_GET["role"]);
$team = trim($_GET["team"]);
$nu_id = trim($_GET["nu_id"]);
$name = trim($_GET["fullname"]);
$gender = trim($_GET["gender"]);
$mail = trim($_GET["email"]);
$proj = trim($_GET["proj_name"]);
$year = intVal(trim($_GET["year_joined"]));
$comm = intVal(trim($_GET["comm_score"]));
$tech = intVal(trim($_GET["tech_score"]));
$mng = intVal(trim($_GET["mng_score"]));
$team_score = intVal(trim($_GET["team_score"]));

// // check nu_id
// $get_nuid = "SELECT * FROM member WHERE nu_id = '$nu_id'";
// $r_get_nuid = $conn->query($get_nuid) or die("error: " . $conn->error);
// if($r_get_nuid->num_rows != 0){
//   die("error: nu_id already exists");
// }
// nu_id does not exist

// get role_id
$get_roleid = "SELECT role_id FROM role WHERE role_name = '$role'";
$r_get_roleid = $conn->query($get_roleid) or die("error: " . $conn->error);
$role_id = $r_get_roleid->fetch_assoc();
$role_id = $role_id["role_id"];

// check if team is empty
if(empty($team)){
  // member is faculty, learner, or ex-comm, update team_id to null in member table
  $updateMember = "UPDATE member SET full_name='$name', gender='$gender', nu_email='$mail',
  year_join=$year, password='$password', role_id=$role_id, team_id=NULL WHERE nu_id='$nu_id'";
}
else{
  // member is non-faculty, non-learner, or non-excomm, insert team_id in member table
  // -- fetch team_id from twm_team table
  $get_teamid = "SELECT team_id FROM twm_team WHERE team_name = '$team'";
  $r_get_teamid = $conn->query($get_teamid) or die("error: " . $conn->error);
  $team_id = $r_get_teamid->fetch_assoc();
  $team_id = $team_id["team_id"];

  $updateMember = "UPDATE member SET full_name='$name', gender='$gender', nu_email='$mail',
  year_join=$year, password='$password', role_id=$role_id, team_id=$team_id WHERE nu_id='$nu_id'";
}

// check if any skill is -1 that means member is faculty else not
if($comm >= 0 && $comm <=10){
  // member is not faculty, update skill table
  $updateSkill = "UPDATE skill comm_skill=$comm, tech_skill=$tech, mng_skill=$mng, team_player=$team_score WHERE nu_id='$nu_id'";
  $r_updateS = $conn->query($updateSkill) or die("error: " . $conn->error);
}

// update member
$r_updateM = $conn->query($updateMember) or die("error: " . $conn->error);

if(empty($proj)){
  die("1");
}

// if project is non-empty then insert into project table and mem_proj table

// check project exists
$get_proj = "SELECT proj_id FROM project WHERE proj_name = '$proj'";
$r_get_proj = $conn->query($get_proj) or die("error: " . $conn->error);
if($r_get_proj->num_rows == 1){
  $proj_id = $r_get_proj->fetch_assoc();
  $proj_id = $proj_id["proj_id"];
}
else{
  $insertProject = "INSERT INTO project (proj_name, date_start) VALUES ('$proj', SYSDATE)";
  $r_insertP = $conn->query($insertProject) or die("error: " . $conn->error);
  $proj_id = $conn->insert_id;
}

$insertMP = "INSERT INTO mem_proj (proj_id, nu_id) VALUES ($proj_id, '$nu_id')";
$r_insertMP = $conn->query($insertMP) or die("error: " . $conn->error);

echo "1";

?>
