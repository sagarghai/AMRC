<html>
<head></head>
<body>
<?php 
$request_id = $_GET["request_id"];
require 'connect_db.php';
$sql = "select * from member_request where request_id = $request_id;";
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result);
echo "<h1> Person Information</h1>";

echo "First Name : $row[fname]<br>";
echo "Last Name : $row[lname]<br>";
echo "Email : $row[email]<br>";
echo "User Type : $row[user_type]<br>";

?>
</body>
</html>
