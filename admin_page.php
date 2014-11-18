<?php
session_start();
require 'login_check.php';
?>

<html>
<head></head>
<body>
<p><a href = "logout.php">Logout</a></p>
<a href = "member_request.php">Member Requests</a>
<p><a href = "add_machine.php">Add Machine </a></p>
<a href = "delete_machine.php">Delete Machine</a>
<p><a href = "delete_member.php">Delete Member</a></p>
<p><a href = "edit_bookings.php">Edit Bookings</a></p>


</body>
</html>
