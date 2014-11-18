<?php
session_start();
?>

<?php
require 'login_check.php';
?>

<html>
<head></head>
<h1>Your Bookings</h1>
<body>
<p><a href = "machines.php">Back</a></p>
<?php
$email = $_SESSION["current_user"];

$date = date('Y-m-d');

require 'connect_db.php';

$sql = "select * from bookings where (email = '$email' and date >= '$date');";
$result = mysqli_query($connection,$sql);
	$i = 0;
	while($row = mysqli_fetch_array($result))
	{
		if(isset($_POST["submit$i"]))
		{
		$machine_name = $row[machine_name];
		$machine_id = $row[machine_id];
		$start_time = $row[start_time];
		$end_time = $row[end_time];
		$sql2 = "delete from bookings where (email = '$email' and start_time = '$start_time' and machine_name = '$machine_name');";
		$result2 = mysqli_query($connection,$sql2);
		if($result2)
			echo "Booking Cancelled";
		else echo "Could not cancel booking".$sql2;

		}
		$i++;
	}
?>

<form action = "user_bookings.php" method = "post">
<?php
$email = $_SESSION["current_user"];

$date = date('Y-m-d');

require 'connect_db.php';

$sql = "select * from bookings where (email = '$email' and date >= '$date');";

$result = mysqli_query($connection,$sql);

if(mysqli_num_rows($result) == 0)
{
	echo "No bookings in your name";
	exit();
}

else
{
	$i = 0;
	echo "Machine Id 				Machine Name 			Start Time <br><br>";
	while($row = mysqli_fetch_array($result))
	{
		$machine_name = $row[machine_name];
		$machine_id = $row[machine_id];
		$start_time = $row[start_time];
		$end_time = $row[end_time];
		echo "$row[machine_id] 		$row[machine_name] 			$row[start_time]  <input type = 'submit' name = 'submit$i' value = 'Cancel'><br><br>";
		$i++;
	}
}
?>
</form>
</body>
</html>