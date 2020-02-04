<?php

include "connect_cms.php";

$conn = pdoConnOpen();

$role_id=0;

//fetching data from member table
$sql="SELECT * FROM member WHERE role_id  BETWEEN 106 AND 113;";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
	$role_name="";
	$check="SELECT role_name as '$role_name' FROM role WHERE role_id = '".$row['role_id']."';";
	$rs =mysqli_query($conn,$check);
	$data = mysqli_fetch_array($rs, MYSQLI_NUM);
	$role_name = $data[0];
    echo "<tr>";
    echo "<td>" . $row['nu_id'] . "</td>";
    echo "<td>" . $row['full_name'] . "</td>";
    echo "<td>" . $row['gender'] . "</td>";
    echo "<td>" . $row['nu_email'] . "</td>";
    echo "<td>" . $role_name . "</td>";
    echo "<td>" . $row['year_join'] . "</td>";
    echo "</tr>";


}
// mysqli_close($con);
mysqli_close($conn);

 ?>
