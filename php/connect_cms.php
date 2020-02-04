<?php

function openConn(){

  $dbname = "cms_twm";
  $dbserver = "localhost";
  $dbuser = "alifaisal";
  $dbpass = "7789";

  $conn = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

  if($conn->connect_error){
    die("connection error" . $conn->connect_error);
  }
  else{
    // echo "connection established";
    return $conn;
  }
}

// function used in Executive_Committee.php, Heads.php ...
function pdoConnOpen(){

  $dbname = "cms_twm";
  $dbserver = "localhost";
  $dbuser = "alifaisal";
  $dbpass = "7789";

  $connPDO = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);

  if (!$connPDO) {
      die('Could not connect: ' . mysqli_error($connPDO));
  }

  return $connPDO;
}

function closeConn($conn){
  $conn->close();
}

// openConn(); // for testing connection

?>
