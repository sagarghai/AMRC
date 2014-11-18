

<?php
session_start();
require 'login_check.php';
?>


<html>
<head></head>
<h1>Delete Machine Window</h1>
<body>
<p> All the bookings for the corresponding machines would be cancelled if a machine is deleted </p><br>
<?php

require 'connect_db.php';

$sql = "select machine_id,machine_name from machine;";
$result = mysqli_query($connection,$sql);

while ($row = mysqli_fetch_array($result)) {
	$machine_id = $row[machine_id];
	if(isset($_POST["submit$machine_id"]))
	{
		echo $machine_id;
		$delete_query = "delete from machine where machine_id = $machine_id";
		$delete_result = mysqli_query($connection,$delete_query);
		if($delete_result)
			echo "Machine ID $machin_id is  Deleted";
		else echo "Could not delete machine";
	}
}
?>
<form action = ""$_SERVER["PHP_SELF"]"" method = "post">
<?php 
require 'connect_db.php';

$sql = "select machine_id,machine_name from machine;";
$result = mysqli_query($connection,$sql);

echo "<pre>Machine Id 		Machine Name</pre><br>";
while($row = mysqli_fetch_array($result))
{
	$machine_id = $row[machine_id];
	echo "<pre>$row[machine_id] 			$row[machine_name]  ";
	echo "<input type = 'submit' name = 'submit$machine_id' value = 'Delete'></pre><br>";
}
?>
</form>
<p><a href = "admin_page.php">Back</a></p>
</body>
</html>

