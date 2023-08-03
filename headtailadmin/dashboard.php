<?php include "header.php";
if(!isset($_SESSION[admin_id]))
{
	header("Location: index.php");
}
?>			
			
			<div class="clear"></div>
			<?php 
						$sql = "SELECT * FROM whistory WHERE status='Requested' ORDER BY datetime DESC";
$result = mysqli_query($con,$sql);
$sum=0;
while($row = mysqli_fetch_array($result)){
	 $sum=$sum + $row[amount];
		
}?>
			<div id="stat_box">&bull; Withdraw Request</div>	<strong>Total Amount Requested For Withdrawl:</strong> <?php echo $sum;?> USD	<br> <?php 
			if(!empty($_SESSION[paid])){
				echo "$_SESSION[paid]";
				$_SESSION[paid]='';
				
			}
			
			?>		<div id="box">
			    <div class="cell_280"><b>User </b></div>
				<div class="cell_280"><b>Date Time</b></div>
				<div class="cell_200"><b>Type</b></div>
				<div class="cell_200"><b>Amount USD</b></div>
				<div class="cell_200"><b>PM Account</b></div>
				<div class="cell_200"><b>PM Batch</b></div>
				<div class="cell_200"><b>Status</b></div>
				<div class="cell_200"><b>Action</b></div>
				<div class="clear"></div>
							

<?php 
						$sql = "SELECT * FROM whistory WHERE status='Requested' ORDER BY datetime DESC";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
	$_SESSION[wid]=$row[wid];
	 
	 $color ='green'; 	
						?>
						
						
						
					
						<div class="cell_280"><font color='<?php echo $color?>'><?php echo $row[username];?></font></div>
						<div class="cell_280"><font color='<?php echo $color?>'><?php echo $row[datetime];?></font></div>
						<div class="cell_200"><font color='<?php echo $color?>'><?php echo $row[type];?></font></div>
						<div class="cell_200"><font color='<?php echo $color?>'><?php echo $row[amount];?></font></div>
						<div class="cell_200"><font color='<?php echo $color?>'><?php echo $row[pmaccount];?></font></div>
						<div class="cell_200"><font color='<?php echo $color?>'><?php echo $row[pmbatch];?></font></div>
						<div class="cell_200"><font color='<?php echo $color?>'><?php echo $row[status];?></font></div>
						<div class="cell_200"><font color='<?php echo $color?>'><a href="pay.php?id=<?php echo $_SESSION[wid]; ?>">Pay</a> </font></div>
										<div class="clear"></div>	
<?php }?>							
						
						
						</div>
						<?php 
						$sql = "SELECT * FROM dhistory WHERE status='Completed' ORDER BY datetime DESC";
$result = mysqli_query($con,$sql);
$sum=0;
while($row = mysqli_fetch_array($result)){
	 $sum=$sum + $row[amount];
		
}?><br><br><br><br>
			<div id="stat_box">&bull; Deposit History</div>		<strong>Total Amount Deposited:</strong> <?php echo $sum;?> USD		<div id="box">
			<div class="cell_280"><b>User </b></div>
				<div class="cell_280"><b>Date Time</b></div>
				<div class="cell_200"><b>Type</b></div>
				<div class="cell_200"><b>Amount USD</b></div>
				<div class="cell_200"><b>PM Batch</b></div>
				<div class="cell_200"><b>Status</b></div>
				<div class="clear"></div>
										
						<div class="clear"></div>		

<?php 
						$sql = "SELECT * FROM dhistory  ORDER BY datetime DESC";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
	 
	 $color ='red'; 	
						?>						
						<div class="cell_280"><font color='<?php echo $color?>'><?php echo $row[username];?></font></div>
						<div class="cell_280"><font color='<?php echo $color?>'><?php echo $row[datetime];?></font></div>
						<div class="cell_200"><font color='<?php echo $color?>'><?php echo $row[type];?></font></div>
						<div class="cell_200"><font color='<?php echo $color?>'><?php echo $row[amount];?></font></div>
						<div class="cell_200"><font color='<?php echo $color?>'><?php echo $row[pmbatch];?></font></div>
						<div class="cell_200"><font color='<?php echo $color?>'><?php echo $row[status];?></font></div>
						<div class="clear"></div>
						<?php }?>
						</div>
						<?php 
						$sql = "SELECT * FROM whistory WHERE status='Completed' ORDER BY datetime DESC";
$result = mysqli_query($con,$sql);
$sum=0;
while($row = mysqli_fetch_array($result)){
	 $sum=$sum + $row[amount];
		
}?><br><br><br><br>
			<div id="stat_box">&bull; Withdraw History</div>	<strong>Total Amount Withdrawn:</strong> <?php echo $sum;?> USD	<br> 
<div id="box">
			    <div class="cell_280"><b>User </b></div>
				<div class="cell_280"><b>Date Time</b></div>
				<div class="cell_200"><b>Type</b></div>
				<div class="cell_200"><b>Amount USD</b></div>
				<div class="cell_200"><b>PM Account</b></div>
				<div class="cell_200"><b>PM Batch</b></div>
				<div class="cell_200"><b>Status</b></div>
				
				<div class="clear"></div>
							

<?php 
						$sql = "SELECT * FROM whistory WHERE status='Completed' ORDER BY datetime DESC";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
	
	 
	 $color ='green'; 	
						?>
						
						
						
					
						<div class="cell_280"><font color='<?php echo $color?>'><?php echo $row[username];?></font></div>
						<div class="cell_280"><font color='<?php echo $color?>'><?php echo $row[datetime];?></font></div>
						<div class="cell_200"><font color='<?php echo $color?>'><?php echo $row[type];?></font></div>
						<div class="cell_200"><font color='<?php echo $color?>'><?php echo $row[amount];?></font></div>
						<div class="cell_200"><font color='<?php echo $color?>'><?php echo $row[pmaccount];?></font></div>
						<div class="cell_200"><font color='<?php echo $color?>'><?php echo $row[pmbatch];?></font></div>
						<div class="cell_200"><font color='<?php echo $color?>'><?php echo $row[status];?></font></div>
						
										<div class="clear"></div>	
<?php }?>							
						
						
						</div>
			<?php include "footer.php";  ?>