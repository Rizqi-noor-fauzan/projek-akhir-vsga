<?php

$hostName = "localhost";
$User = "root";
$Password = "";
$dbName = "projek_akhir";
$conn = mysqli_connect($hostName, $User, $Password, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>