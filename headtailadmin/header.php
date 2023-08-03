<?php session_start();

include "dbconnection.php";
error_reporting(0);
$sql = "SELECT * FROM admin WHERE id='$_SESSION[admin_id]'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
	 $name = $row[username];
	 $mode = $row[active];
	 
	 	}
?>
<head>
		<meta http-equiv="content-language" content="en-us" />
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href='media/style.css' REL='stylesheet' TYPE='text/css'>
		<link rel="icon" type="image/x-icon" href="media/favicon.ico">
		<link rel="shortcut icon" type="image/x-icon" href="media/favicon.ico">
	    <title>Admin Login Area</title>
	</head>
	<body>
		<div id="layout">
			<div id="top_box">
			<br> 
			<?php if (empty($_SESSION[admin_id])){?>
				
			<?php } else { ?>
			<u><strong> <?php echo $name;?></strong></u> &nbsp &nbsp &nbsp <a href="dashboard.php">Home</a> | <a href="users.php">Users</a>  | <a href="changepassword.php">Change Password</a> | <a href="news.php">News</a> | <a href="history.php">History</a> | <a href="logout.php">Logout</a>  
			
			<?php  if($mode==1){?>
			<a href="adminwin.php?adminactive=1" align="right" style="   border-left-width: 90px; margin-left: 400px; color:yellow;"><b>ADMIN WINNING MODE ACTIVATED</b></a>
			<?php }else {?>
			<a href="adminwin.php?adminactive=0" align="right" style="   border-left-width: 90px; margin-left: 400px; color:red;"><b>ADMIN WINNING MODE IN-ACTIVATED</b></a>
			<?php }} ?>
						</div>
			<div class="clear"></div>
			<div id="banner_box">
			<div class="clear"></div>
			
			
			</div>
			<?php  ?>