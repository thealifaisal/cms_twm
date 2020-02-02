<?php

include "connect_cms.php";

$conn = openConn();

$role_id=0;

$check = "SELECT role_id FROM role WHERE role_name = 'Faculty Head'";
$result = $conn->query($check) or die("error: " . $conn->error);
$fh_id = $result->fetch_assoc();
$FHrole_id = $fh_id["role_id"];

$check = "SELECT role_id FROM role WHERE role_name = 'Co-Faculty Head'";
$result = $conn->query($check) or die("error: " . $conn->error);
$cfh_id = $result->fetch_assoc();
$CFHrole_id = $cfh_id["role_id"];

$sql = "SELECT * FROM member, role WHERE member.role_id = role.role_id AND (member.role_id = $FHrole_id OR member.role_id = $CFHrole_id)";
$result = $conn->query($sql) or die("error: " . $conn->error);

while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['full_name'] . "</td>";
    echo "<td>" . $row['gender'] . "</td>";
    echo "<td>" . $row['nu_email'] . "</td>";
    echo "<td>" . $row['role_name'] . "</td>";
    echo "<td>" . $row['year_join'] . "</td>";
    echo "</tr>";
}

$conn->close();

 ?>
