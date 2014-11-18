<?php 
$connection = mysqli_connect("localhost","root","nopassword","amrc");

if(!$connection){
	echo("Could not connect to the database".mysqli_error($connection));
}

?>
