<?php include "header.php"?>
<div align="center">
<style>
.error {color: #FF0000;}
</style>
<?php
// define variables and set to empty values
$nameErr  = $passwordErr  ="";
$name = $password  =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
     if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  }
    if(empty($emailErr)&& empty($passwordErr)){
$sql = "SELECT * FROM admin WHERE username='$_POST[name]' AND password='$_POST[password]'";
include("dbconnection.php");
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result) == 1)
	{			                                
		$row = mysqli_fetch_array($result);
		$msg1 = "<br><strong><font color='green'><h3>Admin logged in successfully..</h3></font></strong>";
		session_start();
		$_SESSION[admin_id]=$row[id];
		header("Location: dashboard.php");
	}
	else
	{
		$msg = "<br><strong><font color='red'>Failed to login</font></strong>";
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

<h2>Administrator Login</h2>
<span><?php if (!empty($msg)){
	echo "$msg";
		}
	?></span>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  <input type="text" name="name" value="<?php echo $name;?>" placeholder="Your Name" pattern=".{5,30}" required title="5 to 30 characters"><br>
  <span class="error"> <?php echo $emailErr;?></span><br>
  <input type="password" name="password" value="" placeholder="Your Password" pattern=".{5,20}" required title="5 to 20 characters"><br>
  <span class="error"> <?php echo $passwordErr;?></span><br>
 
    <input type="submit" name="Login" value="Login">  
</form>
</div>
<?php include "footer.php" ;  ?>