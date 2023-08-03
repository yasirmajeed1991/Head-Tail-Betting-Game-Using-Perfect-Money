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
$oldpasswordErr = $npasswordErr = $cpasswordErr  = "";
$oldpassword = $npassword = $cpassword  =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["oldpassword"])) {
    $oldpasswordErr = " Oldpassword is required";
  } 
  if (empty($_POST["npassword"])) {
    $npasswordErr = " New password is required";
  }
  if (empty($_POST["cpassword"])) {
    $cpasswordErr = "Confirm New password is required";
  }
  if ($_POST["npassword"]!= $_POST["cpassword"]){
	  $cpasswordErr= "<br><strong><font color='red'>New Password and Confirm New Password Must be Same.</font></strong>";
  }
  
  
  if(empty($oldpasswordErr) && empty($npasswordErr) && empty($cpasswordErr)){
$sql = "SELECT * FROM admin WHERE password='$_POST[oldpassword]'";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result) == 1)
	{			                                
		$sql = "Update admin SET password='$_POST[cpassword]' WHERE id='$_SESSION[admin_id]'";
		mysqli_query($con,$sql);
		$msg = "<br><strong><font color='green'>Password Has Been Changed successfully..</font></strong>";
	}
	else
	{
		$msg = "<br><strong><font color='red'>Please Enter Correct Password</font></strong>";
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

<h2>Change Password</h2>
<span><?php if (!empty($msg)){
	echo "$msg";
		}
	?></span>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  <input type="password" name="oldpassword" value="" placeholder="Old Password" pattern=".{5,20}" required title="5 to 20 characters"><br>
  <span class="error"> <?php echo $oldpasswordErr;?></span><br>
  <input type="password" name="npassword" value="" placeholder="New Password" pattern=".{5,20}" required title="5 to 20 characters"><br>
  <span class="error"> <?php echo $npasswordErr;?></span><br>
<input type="password" name="cpassword" value="" placeholder="Confirm Password" pattern=".{5,20}" required title="5 to 20 characters"><br>
  <span class="error"> <?php echo $cpasswordErr;?></span><br>
 <input type="submit" name="ChangPassword" value="ChangePassword">  
     
</form>
</div>
<?php include "footer.php" ;  ?>