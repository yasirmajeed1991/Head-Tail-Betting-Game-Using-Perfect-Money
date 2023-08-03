<?php session_start();
if(!isset($_SESSION[admin_id]))
{
	header("Location: index.php");
}
include "dbconnection.php";

//Select Query for deleting user
if(!empty($_GET[id])){
$sql = "DELETE FROM user WHERE id='$_GET[id]'";
$result = mysqli_query($con,$sql);
$_SESSION[usrmsg]='<span style="color:red;font-size:13px;">User has Been Deleted Successfully</span>';
header("location:users.php");
}
//Select Query for deleting user
if(!empty($_GET[nid])){
$sql = "DELETE FROM news WHERE id='$_GET[nid]'";
$result = mysqli_query($con,$sql);
$_SESSION[newsmsg]='<span style="color:red;font-size:13px;">News has Been Deleted Successfully</span>';
header("location:news.php");
}
//removing fund from user account
if(!empty($_GET[rid])){
$sql = "UPDATE user SET balance = '0.0000' WHERE id='$_GET[rid]'";
$result = mysqli_query($con,$sql);
$_SESSION[usrmsg]='<span style="color:red;font-size:13px;">Fund has Been Removed Successfully</span>';
header("location:users.php");
}

?>