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
$fundErr  = "";
$fund =   "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fund"])) {
    $fundErr = "Fund is required";
  } 
  
  if(empty($fundErr) ){
									
		$sql = "Update user SET balance='$_POST[fund]'  WHERE id='$_POST[userid]'";
		mysqli_query($con,$sql);
		$_SESSION[usrmsg] = "<br><strong><font color='green'>Fund Has Been Added Successfully..</font></strong>";
		header("location:users.php");
	}
	
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Add Fund To User Account</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  <input type="number" name="fund" value="" placeholder="Add Fund" pattern=".{1,3}" required title="1 to 3 characters"><br>
  <span class="error"> <?php echo $fundErr;?></span><br>
  <input type="hidden" value="<?php echo $_GET['id'];?>" name="userid">
  
 <input type="submit" name="submit" value="Add Fund">  
     
</form>
</div>
<?php include "footer.php" ;  ?>