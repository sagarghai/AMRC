<?php
session_start();
require 'login_check.php';
?>

<html>
<head></head>
<p><a href = "admin_page.php">Back</a></p>
<h1>Delete Member</h1>
<body>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
require 'connect_db.php';

$sql2 = "select * from user where user_type != 'admin';";

$result2 = mysqli_query($connection,$sql2);
	$i=0;
    while($row2 = mysqli_fetch_array($result2))
    {
        $email = $row2[email];
         if(isset($_POST["submit$i"]))
        {
            $delete_query = "delete from user where email ='$email';";
            $delete_result = mysqli_query($connection,$delete_query);
            if($delete_result)
            echo "Member Deleted From AMRC LAB";
            else echo "Could Not Delete USer";
        }
        $i++;
    }
}
?>

<form action = "delete_member.php" method = "post">
<?php
require 'connect_db.php';
$sql = "select * from user where user_type != 'admin';";

$result = mysqli_query($connection,$sql);
if(mysqli_num_rows($result) == 0)
{
echo "No User to delete";
}

else
{
	$i = 0;
	while($row = mysqli_fetch_array($result))
	{
		$email = $row[email];
		$user_name = $row[fname]." ".$row[lname];
		echo "$user_name:<input type = 'submit' name = 'submit$i' value = 'Delete'><br><br>";
		$i++;
	}

}
?>
</form>
</body>
</html>

