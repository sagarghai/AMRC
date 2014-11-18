<?php
session_start();
?>

<html>
<head></head>
<body>
	<?php
		session_destroy();
		header("Location:login.php");
	?>

</body>
</html>
