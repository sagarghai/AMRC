<html>
<head></head>
<h1></h1>
<body>

<?php 
echo "<p><a href = 'admin_page.php'>Back</a></p>";

?>



<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
require 'connect_db.php';
$sql = "select request_id,fname,lname from member_request;";
$result2 = mysqli_query($connection,$sql);
while($row2 = mysqli_fetch_array($result2))
{
	if(isset($_POST["submit$row2[request_id]"]))
	{
		$request_id = $row2[request_id];
		$add_query = "select * from member_request where request_id = $request_id;";
		$add_result = mysqli_query($connection,$add_query);
		$add_row = mysqli_fetch_array($add_result);
		$add_member = "insert into user values ('$add_row[fname]','$add_row[lname]','$add_row[email]','$add_row[user_type]',
			'$add_row[password]',0);";
		$member_query = mysqli_query($connection,$add_member);
		$delete_query = "delete from member_request where request_id = $request_id;";
		$delete_result = mysqli_query($connection,$delete_query);
		if($member_query and $delete_result){
		echo "Suceessfuly Added";
		require 'test.php';
		send_join_email($email,$fname);

		header("Location : member_request.php");	
		}
		else echo "Could not Add User";
	}

 		if(isset($_POST["delete$row2[request_id]"]))
		{
			$request_id = $row2[request_id];
			$delete_query = "delete from member_request where request_id = $request_id;";
			$delete_result = mysqli_query($connection,$delete_query);
			if($delete_result){
			echo "Suceessfuly Deleted";

			header("Location : member_request.php");	
			}
	}
}
}
?>
<form  action= "<?php $_SERVER['PHP_SELF'] ?>" method= "post">
<?php
require 'connect_db.php';

$sql = "select request_id,fname,lname from member_request;";
$result = mysqli_query($connection,$sql);
if(mysqli_num_rows($result) == 0){
echo "No Member Requests";
exit();
}

while($row  = mysqli_fetch_array($result))
{
	echo "<a href = 'member_request_details.php?request_id=$row[request_id]'> $row[fname] $row[lname] </a>";
	echo "<input type ='submit' name = 'submit$row[request_id]' value = 'Add'>
	<input type ='submit' name = 'delete$row[request_id]' value = 'Delete'<br><br>";
}

?>
</form>

</body>
</html>
