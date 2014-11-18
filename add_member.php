

<?php
session_start();
require 'login_check.php';
?>



<?php

require 'connect_db.php';
$sql = "select request_id,fname,lname from member_request;";
$result2 = mysqli_query($connection,$sql);
while($row2 = mysqli_fetch_array($result2))
{
	if(isset($_POST['submit$row2[request_id]']))
	{
		$request_id = $row2[request_id];
		$add_query = "select * from member_request where request_id = $request_id;";
		$add_result = mysqli_query($connection,$add_query);
		$add_row = mysqli_fetch_array($add_result);
		$add_member = "insert into user values ('$add_row[fname]','$add_row[lname]','$add_row[email]','$add_row[user_type]',
			'$add_row[password]',0);";
		$member_query = mysqli_query($connection,$add_member);
		if($member_query)
			echo "Suceessfuly Added";
		else echo "Could not Add User";

	}
}
?>