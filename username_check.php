<?php
if(isset($_POST['username']))
{
	// include Database connection file 
	include("./php/config.php");

	$username = mysqli_real_escape_string($conn, $_POST['username']);

	$query = "SELECT username FROM tbl_user WHERE username = '$username'";
	if(!$result = mysqli_query($conn, $query))
	{
		exit(mysqli_error($conn));
	}

	if(mysqli_num_rows($result) > 0)
	{
		// username is already exist 
		echo '<div style="color: red;"> <span style="color: blue;"> '.$username.' </span> is already taken by someone! </div>';
	}
	else
	{
		// username is avaialable to use.
		echo '<div style="color: green;"> <span style="color: blue;"> '.$username.' </span> is avaialable! </div>';
	}
}
?>