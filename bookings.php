<?php
session_start();
?>
<?php
require 'login_check.php';
?>


<html>
<head></head>
<body>

<?php 
if(!isset($_POST["submit"]))
$_SESSION['machine_selected'] = $_GET['machine_name'];


if(isset($_POST["submit"])){

if($_POST["start_time"] >= $_POST["end_time"])
	echo "Check the time, End Time should be later than start Time Be careful with AM and PM <br>";
else 
	{
		$_SESSION["start_time"] = $_POST["start_time"];
		$_SESSION["end_time"] = $_POST["end_time"];
		$_SESSION["date"] = $_POST["date"];
		require 'processing.php';
	}
}
echo $_SESSION["machine_selected"]."  ";
echo $_SESSION["current_user"]. "";
$date = date('Y-m-d');
$machine_name=$_SESSION["machine_selected"];
echo "<form action = 'bookings.php?machine_name=$machine_name' method = 'post'>";
echo "Date : <input type = 'date' min = '$date' name = 'date' value = '$date'> <br>";
?>
Start TIME : <input type = "time" name = "start_time" value = "<?php echo date('H:i'); ?>">
<br>
End TIME : <input type = "time" name = "end_time" value = "<?php echo date('H:i'); ?>">
<br>
<input type = "submit" name = "submit" value = "Book Machine">
</form>
<?php 
$machine_name = $_SESSION['machine_selected'];
echo "<form action = 'bookings.php?machine_name=$machine_name' method = 'post'>";
?>

Date : <input type = "date" name = "date" value = "<?php echo date('Y-m-d') ?>">
<input type = "submit" name = "list_submit" value = "Get List!!">
<?php 
if(isset($_POST["list_submit"]))
	require 'list.php';
?>

<a href = "machines.php">Back</a>
</body>
</html>