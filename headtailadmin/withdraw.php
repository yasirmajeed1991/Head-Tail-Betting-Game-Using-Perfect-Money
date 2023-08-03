<?php session_start();
if(!isset($_SESSION[userid]))
{
	header("Location: index.php");
}
include "dbconnection.php";
$date = date("d/m/Y");
//Select Query
$sql = "SELECT * FROM user WHERE id='$_SESSION[user_id]'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
	 $name = $row[username];
	 $balance =$row[balance];
	 $pmaccount = $row[pmaccount];
	 	}

if($balance>0){		
//Insert Query
$sql = "INSERT INTO whistory (id,datetime,type,amount,pmaccount,status) VALUES('$_SESSION[user_id]','$date','Withdraw','$balance','$pmaccount','Requested') ";
$result = mysqli_query($con,$sql);
//Update Query
$sql = "Update user SET balance = '0' WHERE id='$_SESSION[user_id]' ";
mysqli_query($con,$sql);
$_SESSION[msg] = '<span style="color:green;font-size:12px;">Withdrawl Request Has Been made and will be processed soon...</span>';
header("Location: index.php");
}
else{
		$_SESSION[msg] = '<span style="color:red;font-size:12px;">Insufficient Balance Please Load Fund Before Making a Withdrawl</span>';
header("Location: index.php");
}
?>