<?php

include "connect_cms.php";

$conn = openConn();

// head count
$sql = "SELECT * FROM member WHERE role_id IN (106, 107, 108, 109, 110, 111, 112, 113)";
$result = $conn->query($sql) or die("error: " . $conn->error);
$head_count =  $result->num_rows;

// co-head count
$sql = "SELECT * FROM member WHERE role_id IN (114, 115, 116, 117, 118, 119, 120, 121)";
$result = $conn->query($sql) or die("error: " . $conn->error);
$co_head_count =  $result->num_rows;

// project-managers count
$sql = "SELECT * FROM member WHERE role_id = 122";
$result = $conn->query($sql) or die("error: " . $conn->error);
$proj_mgr_count =  $result->num_rows;

// front-end-dev count
$sql = "SELECT * FROM member WHERE role_id IN (123, 114, 106)";
$result = $conn->query($sql) or die("error: " . $conn->error);
$frontdev_count =  $result->num_rows;

// back-end-dev count
$sql = "SELECT * FROM member WHERE role_id IN (124, 107, 115)";
$result = $conn->query($sql) or die("error: " . $conn->error);
$backdev_count =  $result->num_rows;

// mobile-app-dev count
$sql = "SELECT * FROM member WHERE role_id IN (125, 108, 116)";
$result = $conn->query($sql) or die("error: " . $conn->error);
$appdev_count =  $result->num_rows;

// mentors count
$sql = "SELECT * FROM member WHERE team_id = 111";
$result = $conn->query($sql) or die("error: " . $conn->error);
$mentor_count =  $result->num_rows;

// media-and-promotions count
$sql = "SELECT * FROM member WHERE team_id = 108";
$result = $conn->query($sql) or die("error: " . $conn->error);
$mnp_count =  $result->num_rows;

// design count
$sql = "SELECT * FROM member WHERE team_id = 109";
$result = $conn->query($sql) or die("error: " . $conn->error);
$design_count =  $result->num_rows;

// content count
$sql = "SELECT * FROM member WHERE team_id = 110";
$result = $conn->query($sql) or die("error: " . $conn->error);
$content_count =  $result->num_rows;

// event-management count
$sql = "SELECT * FROM member WHERE team_id = 112";
$result = $conn->query($sql) or die("error: " . $conn->error);
$event_count =  $result->num_rows;

// learners count
$sql = "SELECT * FROM member WHERE team_id = 113 AND (
  role_id = 131)";
  
$result = $conn->query($sql) or die("error: " . $conn->error);
$learner_count =  $result->num_rows;

// creating a key value pair array
// $counts is a key-value pair
// key is role or team
// value is count
// $arr = ["head"=>head_count", ..., "learner"=>"learner_count"];

$counts = ["head"=>$head_count, "cohead"=>$co_head_count, "proj_mgr"=>$proj_mgr_count,
"frontdev"=>$frontdev_count, "backdev"=>$backdev_count, "appdev"=>$appdev_count,
"mentor"=>$mentor_count, "mnp"=>$mnp_count, "design"=>$design_count, "content"=>$content_count,
"event"=>$event_count, "learner"=>$learner_count];

echo json_encode($counts);

?>
