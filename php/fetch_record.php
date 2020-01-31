<?php

include "connect_cms.php";

$conn = openConn();

// $nu_id = trim($_GET["nu_id"]);
$nu_id = "K173791";

// check nu_id
$get_member = "SELECT * FROM member WHERE nu_id = '$nu_id'";
$r_get_member = $conn->query($get_member) or die("error: " . $conn->error);
if($r_get_member->num_rows == 0){
  die("error: nu_id does not exists");
}
// nu_id exists
$member = $r_get_member->fetch_assoc();
$role_id = $member["role_id"];
$team_id = $member["team_id"];

// fetch role_name
$get_rolename = "SELECT role_name FROM role WHERE role_id = $role_id";
$r_get_rolename = $conn->query($get_rolename) or die("error: " . $conn->error);
$role_name = $r_get_rolename->fetch_assoc();
$member["role_name"] = $role_name["role_name"];

// fetch team_name
if(empty($team_id)){
  $member["team_name"] = "SELECT TEAM";
}
else{
  $get_teamname = "SELECT team_name FROM twm_team WHERE team_id = $team_id";
  $r_get_teamname = $conn->query($get_teamname) or die("error: " . $conn->error);
  $team_name = $r_get_teamname->fetch_assoc();
  $member["team_name"] = $team_name["team_name"];
}

// fetch skill
$get_skill = "SELECT comm_skill, tech_skill, mng_skill, team_player FROM skill WHERE nu_id = '$nu_id'";
$r_get_skill = $conn->query($get_skill) or die("error: " . $conn->error);

if($r_get_skill->num_rows == 1){
  $row_skill = $r_get_skill->fetch_assoc();
  $member["comm_skill"] = $row_skill["comm_skill"];
  $member["tech_skill"] = $row_skill["tech_skill"];
  $member["mng_skill"] = $row_skill["mng_skill"];
  $member["team_player"] = $row_skill["team_player"];
}
else{
  $member["comm_skill"] = 0;
  $member["tech_skill"] = 0;
  $member["mng_skill"] = 0;
  $member["team_player"] = 0;
}

echo json_encode($member);

?>
