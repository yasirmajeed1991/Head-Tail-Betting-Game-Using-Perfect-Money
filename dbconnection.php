<?php
$con = mysqli_connect("localhost", "root", "", "headtail");

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

?>