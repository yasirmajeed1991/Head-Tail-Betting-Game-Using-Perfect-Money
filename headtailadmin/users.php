<?php include "header.php";
if(!isset($_SESSION[admin_id]))
{
	header("Location: index.php");
}
?>			
			
			<div class="clear"></div>
<?php
function deposit($did){
	include "dbconnection.php";
//total number of deposits of each user			
						$sql = "SELECT amount FROM dhistory WHERE id = '$did'  ";
$result = mysqli_query($con,$sql);
$deposit=0;
while($row = mysqli_fetch_array($result)){
	 $deposit=$deposit + $row[amount];
		
}
echo $deposit;

}

?>
<?php
function withdraw($wid){
	include "dbconnection.php";
//total number of withdrawl of each user			
						$sql = "SELECT amount FROM whistory WHERE id= '$wid'   ";
$result = mysqli_query($con,$sql);
$withdrawl=0;
while($row = mysqli_fetch_array($result)){
	 $withdrawl=$withdrawl + $row[amount];
		
}
echo $withdrawl;
}?>					
			<?php
//total number user count			
						$sql = "SELECT * FROM user  ";
$result = mysqli_query($con,$sql);
$sum=0;
while($row = mysqli_fetch_array($result)){
	 $sum=$sum + 1;
		
}?>

			<div id="stat_box">&bull; User Details</div>	<strong>Total Users :</strong> <?php echo $sum;?> 	<br><?php 
			if(!empty($_SESSION[usrmsg])){
				echo $_SESSION[usrmsg];
				$_SESSION[usrmsg]='';
				
			}
			
			?>		<div id="box">
			    <div class="cell_id"><b>User ID</b></div>
				<div class="cell_120"><b>Date Time</b></div>
				<div class="cell_003"><b>Username</b></div>
				<div class="cell_004"><b>Email</b></div>
				<div class="cell_003"><b>PM Account</b></div>
				<div class="cell_id"><b>Balance USD</b></div>
				<div class="cell_001"><b>Deposits / Withdrawls</b></div>
				<div class="cell_002"><b>Action</b></div>
				
				<div class="clear"></div>
							

<?php 
						$sql = "SELECT * FROM user  ";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
	 $_SESSION[ufundid]=$row[id];
	 $color ='green'; 	
						?>
				
						
						
					
						<div class="cell_id"><font color='<?php echo $color?>'><?php echo $row[id];?></font></div>
						<div class="cell_120"><font color='<?php echo $color?>'><?php echo $row[date];?></font></div>
						<div class="cell_003"><font color='<?php echo $color?>'><?php echo $row[username];?></font></div>
						<div class="cell_004"><font color='<?php echo $color?>'><?php echo $row[email];?></font></div>
						<div class="cell_003"><font color='<?php echo $color?>'><?php echo $row[pmaccount];?></font></div>
						<div class="cell_id"><font color='<?php echo $color?>'><?php echo $row[balance];?></font></div>
						<div class="cell_001"><font color='<?php echo $color?>'><?php deposit($row[id]); ?>   / <?php withdraw($row[id]); ?></font></div>
						<div class="cell_002" width="200px"><font color='<?php echo $color?>'><a href="addfund.php?id=<?php echo $row[id];?>">Add Fund</a> | <a href="del.php?rid=<?php echo $row[id];?>">Remove Fund</a> | <a href="del.php?id=<?php echo $row[id];?>">Delete</a></font></div>
										
										<div class="clear"></div>	
<?php }?>							
						
						
						
						
						</div>
			<?php include "footer.php";  ?>