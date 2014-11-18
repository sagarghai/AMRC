<?php 
require 'connect_db.php';

$sql = "select machine_id,machine_name from machine;";
$result = mysqli_query($connection,$sql);

echo "<pre>Machine Id 		Machine Name</pre>";
while($row = mysqli_fetch_array($result))
{
	$machine_id = $row[machine_id];
	echo "<pre>$row[machine_id] 			$row[machine_name]  ";
	echo "<input type = 'submit' name = 'submit$machine_id' value = 'ADD'></pre>";
}
?>