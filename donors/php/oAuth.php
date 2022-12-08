<?php
	include('../php/config.php');
	session_start();
	if(ISSET($_POST['SUBMIT'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
	
		$query = mysqli_query($conn, "SELECT * FROM tbl_user WHERE `username` = '$username' AND `password` = '$password'");
		$fetch = mysqli_fetch_array($query);
		$row = mysqli_num_rows($query);
		
		if($row > 0){
			$_SESSION['id']=$fetch['id'];
			echo "<script>alert('Login Successfully!')</script>";
			echo "<script>window.location='../dashboard.php'</script>";
		}else{
			echo "<script>alert('Invalid username or password')</script>";
			echo "<script>window.location='index.php'</script>";
		}
		
	}

?>

