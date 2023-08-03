<?php include "header.php";
if(!isset($_SESSION[user_id]))
{
	header("Location: index.php");
}
include("dbconnection.php");
?>
<div align="center">
<style>
.error {color: #FF0000;}
</style>
<?php
// define variables and set to empty values
$fundErr  = "";
$fund =   "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fund"])) {
    $fundErr = "Amount is required";
  } 
  
  if(empty($fundErr) ){
	  
	  
	  $date = date("d/m/Y h:i:s A");
//Select Query
$wamount = $_POST["fund"];
$sql = "SELECT * FROM user WHERE id='$_SESSION[user_id]'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
	 $name = $row[username];
	 $balance =$row[balance];
	 $pmaccount = $row[pmaccount];
	 	}
$fbalance = $balance - $wamount;

if($fbalance>0 && $_POST["fund"]>0){		
//Insert Query
$sql = "INSERT INTO whistory (id,username,datetime,type,amount,pmaccount,status) VALUES('$_SESSION[user_id]','$name','$date','Withdraw','$wamount','$pmaccount','Requested') ";
$result = mysqli_query($con,$sql);
//Update Query

$sql = "Update user SET balance = '$fbalance' WHERE id='$_SESSION[user_id]' ";
mysqli_query($con,$sql);
$msg = '<span style="color:green;font-size:12px;">Withdrawl Request Has Been made and will be processed soon...</span>';
}
else{
		$msg = '<span style="color:red;font-size:12px;">Insufficient Balance Please Load Fund Before Making a Withdrawl</span>';

}
	  
		}
	
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Make Fund Withdrawl</h2>
<?php echo $msg;?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  <input type="number" name="fund" value="" placeholder="Amount" pattern=".{1,7}" required title="1 to 7 characters"><br>
  <span class="error"> <?php echo $fundErr;?></span><br>
  
  
 <input type="submit" name="submit" value="Withdraw">  
     
</form>
</div>
<?php include "footer.php" ;  ?>