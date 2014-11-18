<?php
session_start();
?>
<?php
require 'login_check.php';
if(!isset($_POST["date"]))
$_SESSION["machine_selected"] = $_GET["machine_name"];
?>

<html>
<head></head>
<body>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$date = $_SESSION['edit_date'];
	$machine_name = $_SESSION["machine_selected"];
	$sql = "select * from bookings where (date='$date' and machine_name='$machine_name');";
	require 'connect_db.php';
	$result = mysqli_query($connection,$sql);

	$i = 0;
	while($row = mysqli_fetch_array($result))
	{
	if(isset($_POST["submit$i"]))
	{
		$date=$row[date];
		$start_time=$row[start_time];
		$end_time = $row[end_time] ;
		$machine_id = $row[machine_id];
		$booked_by = $row[booked_by];
		$email = $row[email];
		$delete = "delete from bookings where (machine_id=$machine_id and date = '$date' and start_time = '$start_time' and end_time = 
			'$end_time' );";
		$delete_result = mysqli_query($connection,$delete);
		if($delete_result){
		echo "Booking Cancelled";
		require 'test.php';
		send_email($email,$booked_by,$start_time,$end_time);

	}
	else echo "Could Not delete Booking";
	}
	$i++;
}


}

?>
<a href = "edit_bookings.php">Back</a>


<form action = "edit_machine_bookings.php?machine_name=<?php echo $_SESSION['machine_selected'];?>" method = "post">
<input type = "date" name = "date" min = "<?php echo date('Y-m-d');?>" value = "<?php echo date('Y-m-d');?>">
<input type = "submit" name ="get_list" value = "Get List">
</form>
<form action = "edit_machine_bookings.php?machine_name=<?php echo $_SESSION['machine_selected'];?>" method = "post">
<?php
if(isset($_POST["get_list"])){
require 'connect_db.php';
$machine_name = $_SESSION["machine_selected"];
echo $machine_name;
$_SESSION["edit_date"] = $_POST["date"];
$date = $_POST['date'];
$sql = "select * from bookings where (date='$date' and machine_name='$machine_name');";

$result = mysqli_query($connection,$sql);

if(mysqli_num_rows($result) == 0)
{
echo "<br>No bookings for this day";
exit();
}

echo "<pre>Machine ID		Booked By			Start time 			End Time</pre>";
$i=0;
while($row = mysqli_fetch_array($result))
{

	echo "<pre>$row[machine_id]			$row[booked_by]			$row[start_time]			$row[end_time] <input type = 'submit' value = 'Cancel And Send Email'	 name = 'submit$i'></pre>";
	$i++;
}
}

?>
</form>

</body>
</html>