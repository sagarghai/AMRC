<?php
session_start();
?>


<html>
<head></head>

<body>
<?php
require 'connect_db.php';
$machine_name = $_SESSION["machine_selected"];
echo $machine_name;

$date = $_POST['date'];
$sql = "select booked_by,start_time,end_time from bookings where (date='$date' and machine_name='$machine_name');";

$result = mysqli_query($connection,$sql);

if(mysqli_num_rows($result) == 0)
{
echo "<br>No bookings for this day";
exit();

}


echo "<pre>Booked By			Start time 			End Time</pre>";

while($row = mysqli_fetch_array($result))
{
	echo "<pre>$row[booked_by]			$row[start_time]			$row[end_time]</pre>";
}


?>

</body>
</html>
