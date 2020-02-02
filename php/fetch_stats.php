<?php

include "connect_cms.php";

$conn = openConn();

$sql = "SELECT DISTINCT year_join FROM member ORDER BY year_join ASC";

$result = $conn->query($sql) or die("error: " . $conn->error);

while($row = $result->fetch_assoc()){
  $year_array[] = intVal($row["year_join"]);
}

// echo json_encode($year_array);

// $year_array = [2019, 2020, ...]

foreach($year_array as $_year){
  // front-end-dev count
  $sql = "SELECT * FROM member WHERE team_id = 106 AND year_join = $_year";
  $result = $conn->query($sql) or die("error: " . $conn->error);
  $frontdev_count =  $result->num_rows;

  // back-end-dev count
  $sql = "SELECT * FROM member WHERE team_id = 107 AND year_join = $_year";
  $result = $conn->query($sql) or die("error: " . $conn->error);
  $backdev_count =  $result->num_rows;

  // mobile-app-dev count
  $sql = "SELECT * FROM member WHERE team_id = 102 AND year_join = $_year";
  $result = $conn->query($sql) or die("error: " . $conn->error);
  $appdev_count =  $result->num_rows;

  // mentors count
  $sql = "SELECT * FROM member WHERE team_id = 111 AND year_join = $_year";
  $result = $conn->query($sql) or die("error: " . $conn->error);
  $mentor_count =  $result->num_rows;

  // media-and-promotions count
  $sql = "SELECT * FROM member WHERE team_id = 108 AND year_join = $_year";
  $result = $conn->query($sql) or die("error: " . $conn->error);
  $mnp_count =  $result->num_rows;

  // design count
  $sql = "SELECT * FROM member WHERE team_id = 109 AND year_join = $_year";
  $result = $conn->query($sql) or die("error: " . $conn->error);
  $design_count =  $result->num_rows;

  // content count
  $sql = "SELECT * FROM member WHERE team_id = 110 AND year_join = $_year";
  $result = $conn->query($sql) or die("error: " . $conn->error);
  $content_count =  $result->num_rows;

  // event-management count
  $sql = "SELECT * FROM member WHERE team_id = 112 AND year_join = $_year";
  $result = $conn->query($sql) or die("error: " . $conn->error);
  $event_count =  $result->num_rows;

  $col["year"] = $_year;
  $col["count"] = ["frontdev"=>$frontdev_count, "backdev"=>$backdev_count, "appdev"=>$appdev_count,
  "mentor"=>$mentor_count, "mnp"=>$mnp_count, "design"=>$design_count, "content"=>$content_count, "event"=>$event_count];

  $data[] = $col;
}

echo json_encode($data);

 ?>
