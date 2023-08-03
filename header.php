<?php session_start();
include "dbconnection.php";

$date = date("d/m/Y h:i:s A");
$sql = "SELECT * FROM user WHERE id='$_SESSION[user_id]'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
	 $name = $row['username'];
	 $balance =$row['balance'];
	 $lowbalance = $balance - $_POST['amount'];
	 	}
//accessing admin info to make admin win on each term a user select head or tail
$sql = "SELECT * FROM admin";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
	 $mode = $row['active'];
	 }
//balance information updates	

//ADMIN LUCK MODE ACTIVATED	
if($mode==0){
if($balance > 0 && $lowbalance >0){
if(isset($_POST['head']) || isset($_POST['tail'])) {
	
	$amount = $_POST['amount'];
	$_SESSION[amountee]=$amount;
	$amountresult= ($_POST['amount']/100)*97;
	if(!empty($_POST['head'])){
	$flipresult= $_POST['head'];
	}
	if(!empty($_POST['tail'])){
	$flipresult= $_POST['tail'];
	}
    $lucky = Rand(1,2);

//select data to get balance of user account

	if($lucky==2 && $flipresult=='head' ){ 
		$resultfnf = '<div id="result_place"><img src="media/result-head.png" /></div>
						<div style="color:green;font-size:14px;">Yahoo! You Win $ '.$amountresult.'</div>';
		$status ='win';
		$updatebalance = $balance + $amountresult ;
		$amountf = $amountresult ;
		//update balance
		$sql = "Update user SET balance=$updatebalance WHERE id='$_SESSION[user_id]'";
$result = mysqli_query($con,$sql);
		
	}
if($lucky==1 && $flipresult=='tail') {

$resultfnf= '<div id="result_place"><img src="media/result-tail.png" /></div>
						<div style="color:green;font-size:14px;" >Yahoo! You Win $ '.$amountresult.'</div>
					';
					$status ='win';
					$updatebalance = $balance + $amountresult ;
					$amountf = $amountresult ;
					$sql = "Update user SET balance='$updatebalance' WHERE id='$_SESSION[user_id]'";
$result = mysqli_query($con,$sql);
									
}
if($lucky!=2 && $flipresult=='head' ){
	
	$resultfnf='<div id="result_place"><img src="media/result-tail.png" /></div>
						<div style="color:red;font-size:14px;">Oh! You Lost $ '.$amount.'</div>
					';
					$status ='lose';
					$updatebalance = $balance-$amount;
					$amountf = $amount ;
$sql = "Update user SET balance='$updatebalance' WHERE id='$_SESSION[user_id]'";
$result = mysqli_query($con,$sql);
	
 }
 if($lucky!=1 && $flipresult=='tail' ){
	
	$resultfnf='<div id="result_place"><img src="media/result-head.png" /></div>
						<div style="color:red;font-size:14px;">Oh! You Lost $ '.$amount.'</div>
					';
					$status ='lose';
					$updatebalance = $balance-$amount;
					$amountf = $amount ;
$sql = "Update user SET balance='$updatebalance' WHERE id='$_SESSION[user_id]'";
$result = mysqli_query($con,$sql);
	
 }
//Recording Bet History
echo $sql = "INSERT INTO bhistory (id,username,datetime,amount,status) VALUES ('$_SESSION[user_id]','$name','$date','$amountf','$status') ";
 $result=mysqli_query($con,$sql);
}


}
else{
	
	$msgErr = '<span style="color:red;">Insufficient Fund Please Add More To Play..</span>';
}
}


//ADMIN WINING MODE ACTIVATED	
if($mode==1){
if($balance > 0 && $lowbalance >0){
if(isset($_POST['head']) || isset($_POST['tail'])) {
	
	$amount = $_POST['amount'];
	$amountresult= ($_POST['amount']/100)*97;
	if(!empty($_POST['head'])){
	$flipresult= $_POST['head'];
	}
	if(!empty($_POST['tail'])){
	$flipresult= $_POST['tail'];
	}
    

//select data to get balance of user account

	if($flipresult=='head' ){ 
		$resultfnf='<div id="result_place"><img src="media/result-tail.png" /></div>
						<div style="color:red;font-size:14px;">Oh! You Lost $ '.$amount.'</div>
					';
					$status ='lose';
					$updatebalance = $balance-$amount;
					$amountf = $amount ;
$sql = "Update user SET balance='$updatebalance' WHERE id='$_SESSION[user_id]'";
$result = mysqli_query($con,$sql);
		
		
	}
if($flipresult=='tail') {

$resultfnf='<div id="result_place"><img src="media/result-head.png" /></div>
						<div style="color:red;font-size:14px;">Oh! You Lost $ '.$amount.'</div>
					';
					$status ='lose';
					$updatebalance = $balance-$amount;
					$amountf = $amount ;
$sql = "Update user SET balance='$updatebalance' WHERE id='$_SESSION[user_id]'";
$result = mysqli_query($con,$sql);
}

//Recording Bet History
echo $sql = "INSERT INTO bhistory (id,username,datetime,amount,status) VALUES ('$_SESSION[user_id]','$name','$date','$amountf','$status') ";
 $result=mysqli_query($con,$sql);
}


}
else{
	
	$msgErr = '<span style="color:red;">Insufficient Fund Please Add More To Play..</span>';
}
}

?>
<head>
		<meta http-equiv="content-language" content="en-us" />
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href='media/style.css' REL='stylesheet' TYPE='text/css'>
		<link href='media/headtail.css' REL='stylesheet' TYPE='text/css'>
		<link rel="icon" type="image/x-icon" href="media/favicon.ico">
		<link rel="shortcut icon" type="image/x-icon" href="media/favicon.ico">
	    <title>Guess & Win Via PerfectMoney</title>
	</head>
	<body>
		<div id="layout">
			<div id="top_box">
			<?php if (empty($_SESSION['user_id'])){?>
				<a href="index.php">Home</a> | <a href="login.php">Login</a> | <a href="register.php">Register</a>
			<?php } else { ?>
			<u class="sizewize"><strong> <?php echo $name;?></strong></u> &nbsp &nbsp &nbsp <a href="index.php" class="sizewize">Home</a> | <a href="changepassword.php" class="sizewize">Change Password</a> | <a href="history.php" class="sizewize">History</a> | <a href="logout.php" class="sizewize">Logout</a>
			<?php } ?>
						</div>
			<div class="clear"></div>
			<div id="banner_box"><a href="#" title="Bet head tail Perfect Money (PM) casino game"><img src="media/banner1.png" border="0"></a></br>

			<div align="left"><strong><u>News:</u></strong></div>
			<marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" SCROLLAMOUNT="5"> 

			
			<?php 
			
			$sql = "SELECT * FROM news";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
	 echo '<span style="font-size:18px;color:red">'.$row['content'].'</span>';
	 }
			
			
			?>
</marquee>
			<div class="clear"></div>
			<?php if (!empty($_SESSION['user_id'])){?>
			<div id="menu_box">
				<span style="float:left;font-weight:bold;">
					&bull; Balance: <font color="#009900">$<?php $sql = "SELECT * FROM user WHERE id='$_SESSION[user_id]'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
	 $fbalance =$row['balance'];
	 $pmaccount = $row['pmaccount'];
	 echo number_format((float)$fbalance, 4, '.', '');
	};?></font> &nbsp &nbsp
					<b><a href="withdraw.php">Withdraw</a></b> &nbsp &nbsp &nbsp &nbsp <b>Pm Account:</b> <u><?php echo $pmaccount;?></u>
				</span>
				<span style="float:right">
				
					<?php if(isset($_POST['pm1'])) {?>
					<form method="post" action="https://perfectmoney.is/api/step1.asp" name="pm"  >
					<input type="hidden" name="PAYMENT_UNITS" value="USD">
					<input type="hidden" name="PAYEE_NAME" value="HeadTail">
					<input type="hidden" name="PAYEE_ACCOUNT" value="U1759389">
					<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $_POST[fund];?>">
					<input type="hidden" name="PAYMENT_URL" value="http://localhost/benish/headtail/index.php?action=successful">
					<input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
					<input type="hidden" name="STATUS_URL" value="mailto:support@come4exchange.com">
					<input type="hidden" name="NOPAYMENT_URL" value="http://localhost/benish/headtail/index.php?action=fail">
					<input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
					<input type="hidden" name="SUGGESTED_MEMO" value="Deposit To Account: <?php echo $name;?>">
					<input type="hidden" name="BAGGAGE_FIELDS" value="<?php echo $_SESSION[user_id]?>">
					<input type="hidden" name="userid" value="<?php echo $_SESSION[user_id]?>">
					</form>
					<div align="center"><img src="media/wait.gif" /></div>
					<script language="JavaScript">
					document.pm.submit();
					</script>
					<?php } ?>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" > 
				Amount: $ <input type="text" style="width: 60px;" value="100" name="fund">&nbsp;
					<input type="submit" name="pm1" value="Deposit">
				</form>
				</span><br><br>
				<span ><?php 
				if(!empty($_SESSION['msg'])){
				echo $_SESSION['msg'];
				$_SESSION['msg']='';
				}
				
				
				if($_GET['action']== 'fail' && $msgDeposit=='') {
					
		echo		 $msgDeposit = '<span style="color:red;font-size:12px;">Deposit Failed Please Try Again...</span>';	
				 $msgDeposit ='';
				}
				//Perfect Money Deposit Payment Checking and Updation of Balance
				$_SESSION['pmbatch']=$_POST['PAYMENT_BATCH_NUM'];
if(!empty($_POST['PAYMENT_BATCH_NUM'])) {
	$_SESSION['pmamount'] = $_POST['PAYMENT_AMOUNT'];
	$_SESSION['pmbatch'] = $_POST['PAYMENT_BATCH_NUM'];
	
	header("location:index.php");
}
	if(!empty($_SESSION['pmbatch']))
				{
				
					//Recording Deposit History
					$date = date("d/m/Y h:i:s A");
 $sql = "INSERT INTO dhistory (id,username,datetime,type,amount,pmbatch,status) VALUES (".$_SESSION['user_id'].",'$name','$date','Deposit',".$_SESSION['pmamount'].",".$_SESSION['pmbatch'].",'Completed')";
 $result=mysqli_query($con,$sql);
 $updatedbalance = $_SESSION['pmamount'] + $balance;
    $sql = "UPDATE user SET balance = '$updatedbalance' where id= ".$_SESSION['user_id']."";
					$result=mysqli_query($con,$sql);
										
	$_SESSION['pmamount'] = '';
	$_SESSION['pmbatch'] = '';
	$_SESSION['pmamount']='';
				}	
				
				
				
				
				
				
			?>
			
			</div>
			<?php } ?>