<?php include "header.php"?>
<div align="center">
<style>
.error {color: #FF0000;}
</style>
<?php
// define variables and set to empty values
$emailErr = $passwordErr  = "";
$email = $password =   "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
     if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  }
    if(empty($emailErr)&& empty($passwordErr)){
$sql = "SELECT * FROM user WHERE email='$_POST[email]' AND password='$_POST[password]'";
include("dbconnection.php");
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result) == 1)
	{			                                
		$rs = mysqli_fetch_array($result);
		$msg1 = "<br><strong><font color='green'><h3>user logged in successfully..</h3></font></strong>";
		
		$_SESSION['user_id']=$rs['id'];
		header("Location: index.php");
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

<h2>Login</h2>
<span><?php if (!empty($msg)){
	echo "$msg";
		}
	?></span>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  <input type="text" name="email" value="<?php echo $email;?>" placeholder="Your Email" pattern=".{7,30}" required title="7 to 30 characters"><br>
  <span class="error"> <?php echo $emailErr;?></span><br>
  <input type="password" name="password" value="" placeholder="Your Password" pattern=".{5,20}" required title="5 to 20 characters"><br>
  <span class="error"> <?php echo $passwordErr;?></span><br>
 
    <a href="forgot.php">Forget Password? </a><input type="submit" name="Login" value="Login">  
</form>
</div>
<?php include "footer.php" ;  ?>