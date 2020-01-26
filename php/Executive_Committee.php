<?php

// $con = mysqli_connect("localhost","root","","cms_twm");
$conn = mysqli_connect("localhost","root","","cms_twm");
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}
$role_id=0;
// mysqli_select_db($con,"ajax_demo");

//President ID
$check="SELECT role_id as '$role_id' FROM role WHERE role_name = 'President'";
$rs =mysqli_query($conn,$check);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);
$President = $data['0'];

//VP ID
$check="SELECT role_id as '$role_id' FROM role WHERE role_name = 'Vice President'";
$rs =mysqli_query($conn,$check);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);
$Vice_President = $data['0'];

//GS ID
$check="SELECT role_id as '$role_id' FROM role WHERE role_name = 'General Secretary'";
$rs =mysqli_query($conn,$check);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);
$General_Secretary = $data['0'];

//fetching data from member table
$sql="SELECT * FROM member WHERE role_id = '$President' || role_id = '$Vice_President' || role_id = '$General_Secretary'";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {

	switch ($row['role_id']) {
		case $President:
			$role_name = 'President';
			break;
		case $Vice_President:
			$role_name = 'Vice President';
			break;
		case $General_Secretary:
			$role_name = 'General Secretary';
			break;
		default:
			# code...
			break;
	}
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
