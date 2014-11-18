
<?php
session_start();
require 'login_check.php';
?>



<?php
require 'connect_db.php';

$sql = "select * from machine;";
$result = mysqli_query($connection,$sql);

while ($row = mysqli_fetch_array($result)) {
	$machine_id = $row[machine_id];
	if(isset($_POST["submit$machine_id"]))
	{
		$machine_name = $row[machine_name];
		$manufacturer = $row[manufacturer];
		$description = $row[machine_description];
		echo $machine_name ;
		$add_query = "insert into machine values (0,'$machine_name','$manufacturer','$description');";
		$add_result = mysqli_query($connection,$add_query);
		if($add_result)
		{
			echo " Machine Added";
		}
		else echo "Could not add machine";
	}
}
?>