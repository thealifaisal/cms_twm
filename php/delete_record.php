<?php

include "connect_cms.php";

$conn = openConn();

$nu_id = trim($_GET["nu_id"]);

// delete member
$delM = "DELETE FROM member WHERE nu_id = '$nu_id'";
$r_delM = $conn->query($delM) or die("error: " . $conn->error);

echo "1";
