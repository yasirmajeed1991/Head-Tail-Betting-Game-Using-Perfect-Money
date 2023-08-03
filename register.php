<?php include "header.php"?>
<div align="center">
<style>
.error {color: #FF0000;}
</style>
<?php
// define variables and set to empty values
$nameErr = $emailErr = $passwordErr = $cpasswordErr = $pmaccountErr="";
$name = $email = $password = $cpassword = $pmaccount="";

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
  
  if (empty($_POST["pmaccount"])) {
    $pmaccountErr = "Perfect Money Account is required";
  } else {
    $pmaccount = test_input($_POST["pmaccount"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$pmaccount)) {
      $pmaccountErr = "Only letters and white space allowed"; 
    }
  }
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
  } else {
    if ($_POST["password"]!=$_POST["cpassword"]){
		$passwordErr = "Password and Confirm Password Must Be Same";
  }
  }
  
  if (empty($_POST["cpassword"])) {
    $cpasswordErr = "Confirm Password is required";
  } else {
    if ($_POST["cpassword"]!=$_POST["password"]){
		$cpasswordErr = "Password and Confirm Password Must Be Same";
  }
  
  }
  
if(empty($nameErr)&& empty($emailErr)&& empty($passwordErr) && empty($cpasswordErr) && empty($pmaccountErr)){
	include("dbconnection.php");
$sql = "SELECT * FROM user WHERE username = '$_POST[name]' || email = '$_POST[email]'";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result) == 1)
	{
		$msg = "<br><strong><font color='red'>User Already Exist Please Use Different Details..</font></strong>";
			}
	else
	{$date = date("d/m/Y h:i:s A");
		$sql="INSERT into user(date,username,email,password,pmaccount,balance)VALUES('$date','$_POST[name]','$_POST[email]','$_POST[password]','$_POST[pmaccount]','0')"; 
		mysqli_query($con,$sql);
		$msg = "<br><strong><font color='green'>Registration Successfull Please Login to Start winning...</font></strong>";
		
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

<h2>Register</h2>
<span><?php if (!empty($msg)){
	echo "$msg";
		}
	?></span>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  <input type="text" name="name" value="<?php echo $name;?>" placeholder="Your Name" maxlength="20" pattern=".{3,20}" required title="3 to 20 characters"><br>
  <span class="error"> <?php echo $nameErr;?></span><br>
  
  <input type="text" name="email" value="<?php echo $email;?>" placeholder="Your Email" pattern=".{7,30}" required title="7 to 30 characters"><br>
  <span class="error"> <?php echo $emailErr;?></span><br>
  <input type="text" name="pmaccount" value="<?php echo $pmaccount;?>" placeholder="PM Account UXXXXXX" pattern=".{7,12}" required title="7 to 12 characters"><br>
  <span class="error"> <?php echo $pmaccountErr;?></span><br>
  <input type="password" name="password" value="" placeholder="Your Password" pattern=".{5,20}" required title="5 to 20 characters"><br>
  <span class="error"> <?php echo $passwordErr;?></span><br>
  <input type="password" name="cpassword" value="" placeholder="Confirm Password" pattern=".{5,20}" required title="5 to 20 characters"><br>
  <span class="error"> <?php echo $cpasswordErr;?></span></p>
    <a href="forgot.php">Forget Password? </a><input type="submit" name="Register" value="Register">  
</form>



</div>
<?php include "footer.php" ;  ?>