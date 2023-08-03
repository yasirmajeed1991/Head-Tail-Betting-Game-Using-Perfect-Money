<?php include "header.php";
if(!isset($_SESSION['user_id']))
{
	header("Location: index.php");
}
?>			
			<div id="box">
			<div		   align="center">
				<div class="space_90"></div>
				
							
				
						
			<div class="clear"></div>
			
			<div id="stat_box">&bull; Bet History</div>				<div id="box">
				<div class="cell_280"><b>Date Time</b></div>
				<div class="cell_200"><b>Amount USD</b></div>
				<div class="cell_200"><b>Status</b></div>
				<div class="clear"></div>
										
						
						<?php 
						$sql = "SELECT * FROM bhistory WHERE id='$_SESSION[user_id]' ORDER BY datetime DESC";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
	 
	 $status = $row['status'];
		if($status=='win'){
			$color = 'green';
		}
		else{
			$color = 'red';
			
		}
	 	
						?>
						
						
						
					
						<div class="cell_280"><font color='<?php echo $color?>'><?php echo $row['datetime'];?></font></div>
						<div class="cell_200"><font color='<?php echo $color?>'><?php echo $row['amount'];?></font></div>
						<div class="cell_200"><font color='<?php echo $color?>'><?php echo $row['status'];?></font></div>
										<div class="clear"></div>	
<?php }?>
						</div>
			
			<?php  include "footer.php"; ?>