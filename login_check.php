<?php
	session_start();
		if(!(isset($_SESSION["current_user"]) and  !empty($_SESSION["current_user"]))) 
			{
				echo "Login First<br>";
				echo "<a href = 'login.php'>Login Page</a>";
				die();
		}	
?>	
