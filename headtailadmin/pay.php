<?php include "header.php";
if(!isset($_SESSION[admin_id]))
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
$pmbatchErr  = "";
$pmbatch =   "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["pmbatch"])) {
    $pmbatchErr = "PM Batch is required";
  } 
  
  if(empty($pmbatchErr) ){
									
		$sql = "Update whistory SET pmbatch='$_POST[pmbatch]',status='Completed'  WHERE wid='$_SESSION[wid]'";
		mysqli_query($con,$sql);
		$_SESSION[paid] = "<br><strong><font color='green'>Payment Has Been Paid Successfully..</font></strong>";
		header("location:dashboard.php");
	}
	
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Process Withdrawl</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  <input type="text" name="pmbatch" value="" placeholder="Batch Number" pattern=".{5,20}" required title="5 to 20 characters"><br>
  <span class="error"> <?php echo $pmbatchErr;?></span><br>
  
  
 <input type="submit" name="submit" value="Paid">  
     
</form>
</div>
<?php include "footer.php" ;  ?>