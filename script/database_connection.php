<?php

function DB()
{
    $con = new mysqli('localhost', 'root','', 'kurudhi');

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    return $con;
}

?>