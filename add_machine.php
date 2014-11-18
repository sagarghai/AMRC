
<?php
session_start();
require 'login_check.php';
?>

<html>
<head></head>
<h1>Machine Add Window</h1>
<body>
<p><a href = "admin_page.php">Back</a></p>


<?php

if(empty($_POST["machine_name"]))
	echo "Fill In All Required Fields<br><br>";	
?>
<p>Does this type of machine already exists ? And you want to add another of this kind.<br> (If you are not sure first click on 
	 GET LIST to have a look at already existing machines)</p>
<?php
 require 'add_old_machine.php'; 
?>

	<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
	<input type = "submit" name = "get_list" value = "GET LIST"><br>
	<?php

		if(isset($_POST['get_list']))
		{	
			require 'print_list.php';		
		}
		echo "<br>";
	?>
	</form>
<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post" id = "add_machine_form" enctype="multipart/form-data">
 Machine Name : <input type = "text" name = "machine_name">*Required Field<br>	
 Manufacturer : <input type = "text" name = "manufacturer"><br>
 Description : <br><textarea name = "machine_description" form = "machine_form" rows = "10" columns = "20"></textarea><br>
    
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">

<input type = "submit" name = "machine_submit" value = "Add Machine">
<?php
require 'connect_db.php';

if(isset($_POST["machine_submit"]) and !empty($_POST["machine_name"]))
{
$machine_name = $_POST["machine_name"];
$machine_description = $_POST["machine_description"];
$manufacturer = $_POST["manufacturer"];
$check = "select * from machine where machine_name = '$machine_name'";
$check_result = mysqli_query($connection,$check);
if(mysqli_num_rows($check_result) != 0)
{
	echo "This Machine already exists in the lab Check in the list above";
}
else
{
	print_r($_FILE);
	$insert = "insert into machine values (0,'$machine_name','$manufacturer','$machine_description');";
	$insert_result = mysqli_query($connection,$insert);
	if($insert_result)
	{
		echo "Machine Added to The Database";
		 require 'upload.php';
	}
	else echo "Could not add machine";
		
}


}


?>
</form>

 </body>
</html>
