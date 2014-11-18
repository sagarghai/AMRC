<?php
session_start();
?>

<?php
require 'login_check.php';
?>

<html>
<head></head>
<h1>List of Machines </h1>
<body>
<p><a href = "user_bookings.php">My Bookings</a></p>
<?php
include 'connect_db.php';
 
 $sql = "select distinct machine_name from machine;";

 $result = mysqli_query($connection,$sql);
 while ($row = mysqli_fetch_array($result))
 {
 	echo "<a href = 'bookings.php?machine_name=$row[machine_name]' >$row[machine_name]</a><br>";
 }

?>
<a href = "logout.php" >Logout</a>

</body>
</html>