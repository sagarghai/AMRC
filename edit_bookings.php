<?php
session_start();
require 'login_check.php';
?>
<p><a href = "admin_page.php" >Back</a></p>

<html>
<head></head>
<body>
<p><a href = "logout.php">Logout</a></p>
<?php
require 'connect_db.php';
 
$sql = "select distinct machine_name from machine;";

$result = mysqli_query($connection,$sql);
while ($row = mysqli_fetch_array($result))
 {
 	$machine_name = $row[machine_name];
 	echo "<p><a href = 'edit_machine_bookings.php?machine_name=$machine_name'>$machine_name</a></p>";	

 }

?>
</body>
</html>
