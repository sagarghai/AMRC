<?php
session_start();
?>

<html>
<head></head>
<body>
	
<?php

	require 'connect_db.php';
	$machine_name = $_SESSION["machine_selected"];
	$user_name = $_SESSION["user_name"];
		$date  = $_SESSION['date'];
		$start_time = $_SESSION['start_time'];
		$end_time = $_SESSION['end_time'];
		$sql1 = "select machine_id from machine where machine_name = '$machine_name';";
		$result1 = mysqli_query($connection,$sql1);
		$email = $_SESSION["email"];
		$booked= 0;
		while($row = mysqli_fetch_array($result1))
		{
		$machine_id = $row[machine_id];
		$check_query = "select machine_id from bookings where (((start_time between '$start_time' and '$end_time') 
			or (end_time between '$start_time' and '$end_time')) and machine_id = $machine_id and date ='$date');";
		$check_result = mysqli_query($connection,$check_query);

		if(mysqli_num_rows($check_result) == 0)
		{

			$sql2 = "insert into bookings values ($machine_id,'$machine_name','$user_name','$date','$start_time','$end_time','$email');";
			$result2 = mysqli_query($connection,$sql2);
			if($result2){
				echo "Your booking has been done successfully and machine id booked is $machine_id<br>";
				$booked = 1;
				break;

			}

			else if($booked == 0)
			{
				echo "Your Booking could not be done due to no vacancy<br>";
				break;
			}
 		}
 		else echo "Your booking can't be done,Time slot not available<br>";
 	}
?>

</body>
</html>

