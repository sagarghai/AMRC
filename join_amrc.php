
<html>
<head></head>
<h1>Send Admin a Join Amrc Request</h1>
<body>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(empty($_POST["fname"]) or empty($_POST["lname"]) or empty($_POST["email"]) or empty($_POST["user_type"]) 
		or empty($_POST["password"]) or empty($_POST["repassword"]))
		echo "Fill in All the Fields";
	else if($_POST["password"] != $_POST["repassword"])
		$password_error = "Passwords don't match";
	else {
			require 'connect_db.php';
			$fname = $_POST["fname"];
			$lname = $_POST["lname"];
			$email = $_POST["email"];
			$user_type = $_POST["user_type"];
			$password = $_POST["password"];
			$check_query = "select * from member_request,user where (member_request.email = '$email' or user.email = '$email');";
			$check_result = mysqli_query($connection,$check_query);
			if(mysqli_num_rows($check_result) == 0)
			{
				$sql = "insert into member_request values (0,'$fname','$lname','$email','$user_type','$password');";
				$result = mysqli_query($connection,$sql);
					if($result)
					echo "Request Sent Successfully :) <br>" . mysqli_error($connection);
					else echo "Could Not Send Request";
			}
			else echo "Only one request at a time and only new users can send request";
		}
}

?>


<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
First Name :<input type = "text" name = "fname"><br>
Last Name : <input type = "text" name = "lname"><br>
Email : <input type = "email" name = "email"><?php echo $email_error; ?><br>
User type : <br>
<input type = "radio" name = "user_type" value = "staff">Staff
<input type = "radio" name = "user_type" value = "faculty">Faculty
<input type = "radio" name = "user_type" value = "student">Student<br>
Password : <input type = "password" name = "password"><br>
Re-Confirm Password : <input type = "password" name = "repassword"><?php echo $password_error; ?><br>
<input type = "submit" name = "submit" value = "Submit Request">
</form><br>
<a href="login.php">Back</a>
</body>
</html>
