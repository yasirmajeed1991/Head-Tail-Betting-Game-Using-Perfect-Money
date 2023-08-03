<?php session_start();
if(!isset($_SESSION[admin_id]))
{
	header("Location: index.php");
}
include "dbconnection.php";
//Updating Admin Mode To Make Admin Win
if($_GET[adminactive]==0){
$sql = "UPDATE admin SET active = '1' WHERE id='$_SESSION[admin_id]'";
$result = mysqli_query($con,$sql);
header("location:dashboard.php");
}
//Updating Admin Mode To Make Admin on Luck
else{
$sql = "UPDATE admin SET active = '0' WHERE id='$_SESSION[admin_id]'";
$result = mysqli_query($con,$sql);
header("location:dashboard.php");
}

?>