<?php

  $dbname = "cms";
  $dbserver = "localhost";
  $dbuser = "root";
  $dbpass = "";

  $conn = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

  if($conn->connect_error)
  {
    die("connection error" . $conn->connect_error);
  }
  else
  {
    // echo "connection established";
    return $conn;
  }
// openConn(); // for testing connection
?>