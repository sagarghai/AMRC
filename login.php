<?php
session_start();
?>

<html>
<head>
</head>
<h1>Login First To Book a Machine</h1>
<body>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(!empty($_POST["email"]) && !empty($_POST["password"]))
	{
		$_SESSION["email"] = $_POST["email"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		require 'connect_db.php';
		$sql = "select * from user where email = '$email' and password = '$password';";
		$result = mysqli_query($connection,$sql);
		if($result and mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_array($result);
			$_SESSION["current_user"] = $row[email] ;
			$_SESSION['user_name'] = $row[fname]." ".$row[lname];
			header("Location:machines.php");
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
<a href = "admin_login.php">Admin Login</a>
<p>Not a Member Yet!!</p>
<a href = "join_amrc.php">Click To Join AMRC </a>
</body>
</html>