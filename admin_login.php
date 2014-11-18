
<?php
session_start();
?>

<html>
<head></head>
<body>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(!empty($_POST["email"]) && !empty($_POST["password"]))
	{
		$email = $_POST["email"];
		$password = $_POST["password"];
		if(strcmp($email,"admin_amrc@gmail.com") == 0 and strcmp($password,"aman" == 0))
		{
			$_SESSION["current_user"] = $row[fname] . " " .$row[lname] ;
			header("Location:admin_page.php");
		}
		else echo "invalid email/password combination.Try Again";
	}
	else echo "Enter email and password";
}
?>
<form  action = ""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"" name = "login_form" method="post"  >
Email <input type = "text" name = "email">
Password <input type = "password" name = "password">
<input type = "submit" name = "submit" value = "Login">
</form>

</body>
</html>
