<?php
include "./config.php";

if(isset($_POST['submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['usermail']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if ($uname != "" && $password != ""){

        $sql_query = "SELECT * FROM `tbl_user` WHERE eamil='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['tbl_user'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: ../donor/dashboard.html');
        }else{
            echo "Invalid username and password";
        }

    }

}