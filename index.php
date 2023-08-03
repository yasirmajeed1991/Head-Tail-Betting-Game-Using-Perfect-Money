<?php include "header.php";?>
<div id="box">
    <div align="center">
        <div class="space_90"></div>



        <div id="title">Head or Tail</div>
        <div id="result_place">
            Win <font color="#ff0000">197%</font> if your guess is right
            <div class="row">
                <div class="column">
                    <p style="font-size:13px;font-weight:bold;"><u></u></p>

                    <table>
                        <tr>
                            <td>
                            </td>
                            <td>
                            </td>

                        </tr>



                    </table>




                </div>
                <div class="column">
                    <div class="robot" id="flip">
                        <?php if(empty($resultfnf)){?>

                        <div id="flip-activated" style="display: block;"></div>

                        <?php } else{ echo $resultfnf;}?>
                    </div>
                </div>
                <div class="column">
                    <p style="font-size:13px;font-weight:bold;"><u></u></p><br>








                </div>
            </div>
            <?php if(empty($resultfnf)){?>

            <div id="betForm">

                <form method="post" action="">
                    <div class="coinRoundBlue">
                        <div id="betCoins" style="display: block;">
                            <div class="coinflip_bet">
                                Enter your bet and then click <b>heads</b> or <b>tails</b><br>
                                Amount to bet: $<input type="text" id="bet" name="amount"
                                    <?php if(!empty($_SESSION['amountee'])){ ?>value="<?php echo $_SESSION['amountee'];?>"
                                    <?php }else{?>value="0.005" <?php }?> maxlength="7"> <br>
                                <?php echo $msgErr;?>
                            </div>


                            <div id="coinflip_coins">
                                <div class="coinHeads">
                                    <input type="image" src="media/heads.gif" value="head" name="head" alt="heads">
                                    <br>
                                    HEADS
                                    </a>
                                </div>

                                <div class="coinTails">
                                    <input type="image" src="media/tails.gif" value="tail" name="tail" alt="heads">
                                    <br>
                                    TAILS
                                    </a>
                                </div>
                </form>
                <div style="clear:both;"></div>
            </div>
        </div>


    </div>
</div>
</div>




</div>






</div>
</div>
<?php } else{?>

<div id="play-again" side="tails" style="display: block;">
    <a href="index.php">PLAY AGAIN</a>
</div>
<?php }?>
<br><br>
<div class="clear"></div>
<div id="stat_box">&bull; Latest Bet History</div>
<div id="box">
    <div class="cell_280"><b>Username</b></div>
    <div class="cell_280"><b>Date Time</b></div>
    <div class="cell_200"><b>Amount USD</b></div>
    <div class="cell_200"><b>Status</b></div>
    <div class="clear"></div>


    <?php 
						if(!empty($_SESSION['user_id'])){
						$sql = "SELECT * FROM bhistory WHERE id= ".$_SESSION['user_id']." ORDER BY datetime DESC LIMIT 5 ";
						}
						else {
							$sql = "SELECT * FROM bhistory  ORDER BY datetime DESC LIMIT 5";
						}
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
    <div class="cell_280">
        <font color='<?php echo $color?>'><?php echo $row['username'];?></font>
    </div>
    <div class="cell_280">
        <font color='<?php echo $color?>'><?php echo $row['datetime'];?></font>
    </div>
    <div class="cell_200">
        <font color='<?php echo $color?>'><?php echo $row['amount'];?></font>
    </div>
    <div class="cell_200">
        <font color='<?php echo $color?>'><?php echo $row['status'];?></font>
    </div>
    <div class="clear"></div>
    <?php }?>



</div>



<br><br>
<div id="stat_box">&bull; Withdraw History</div>
<div id="box">
    <div class="cell_280"><b>Username</b></div>
    <div class="cell_280"><b>Date Time</b></div>
    <div class="cell_200"><b>Type</b></div>
    <div class="cell_200"><b>Amount USD</b></div>
    <div class="cell_200"><b>PM Batch</b></div>
    <div class="cell_200"><b>Status</b></div>
    <div class="clear"></div>


    <?php 
if(!empty($_SESSION['user_id'])){
						$sql = "SELECT * FROM whistory WHERE id=".$_SESSION['user_id']." ORDER BY datetime DESC LIMIT 5";
}
else{
	$sql = "SELECT * FROM whistory  ORDER BY datetime DESC LIMIT 5";
	
}
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
	 
	 $color ='green'; 	
						?>



    <div class="cell_280">
        <font color='<?php echo $color?>'><?php echo $row['username'];?></font>
    </div>
    <div class="cell_280">
        <font color='<?php echo $color?>'><?php echo $row['datetime'];?></font>
    </div>
    <div class="cell_200">
        <font color='<?php echo $color?>'><?php echo $row['type'];?></font>
    </div>
    <div class="cell_200">
        <font color='<?php echo $color?>'><?php echo $row['amount'];?></font>
    </div>
    <div class="cell_200">
        <font color='<?php echo $color?>'><?php echo $row['pmbatch'];?></font>
    </div>
    <div class="cell_200">
        <font color='<?php echo $color?>'><?php echo $row['status'];?></font>
    </div>
    <div class="clear"></div>
    <?php }?>





</div><br><br>
<div id="stat_box">&bull; Deposit History</div>
<div id="box">
    <div class="cell_280"><b>Username</b></div>
    <div class="cell_280"><b>Date Time</b></div>
    <div class="cell_200"><b>Type</b></div>
    <div class="cell_200"><b>Amount USD</b></div>
    <div class="cell_200"><b>PM Batch</b></div>
    <div class="cell_200"><b>Status</b></div>
    <div class="clear"></div>

    <div class="clear"></div>

    <?php 

if(!empty($_SESSION['user_id'])){
						$sql = "SELECT * FROM dhistory WHERE id=".$_SESSION['user_id']." ORDER BY datetime DESC LIMIT 5";
}
else {
	$sql = "SELECT * FROM dhistory ORDER BY datetime DESC LIMIT 5";
}
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
	 
	 $color ='red'; 	
						?>
    <div class="cell_280">
        <font color='<?php echo $color?>'><?php echo $row['username'];?></font>
    </div>
    <div class="cell_280">
        <font color='<?php echo $color?>'><?php echo $row['datetime'];?></font>
    </div>
    <div class="cell_200">
        <font color='<?php echo $color?>'><?php echo $row['type'];?></font>
    </div>
    <div class="cell_200">
        <font color='<?php echo $color?>'><?php echo $row['amount'];?></font>
    </div>
    <div class="cell_200">
        <font color='<?php echo $color?>'><?php echo $row['pmbatch'];?></font>
    </div>
    <div class="cell_200">
        <font color='<?php echo $color?>'><?php echo $row['status'];?></font>
    </div>
    <div class="clear"></div>
    <?php }?>
</div>
<br><br>
<?php include "footer.php";  ?>