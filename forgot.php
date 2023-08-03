<?php include "header.php";
include("dbconnection.php");
?>
<div align="center">
<style>
.error {color: #FF0000;}
</style>
<?php
// define variables and set to empty values
$emailErr = "";
$email =  "";

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
  
  if(empty($emailErr)){
$sql = "SELECT * FROM user WHERE email='$_POST[email]'";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result) == 1)
	{			            
		$row = mysqli_fetch_array($result);
		
		$to = $row[email];
$subject = "Password Recovery";

$message = "
<html>
<head>
<title>Password Recovery</title>
</head>
<body>
<p>Dear, Below are the details of Your account!</p>
<table>
<tr>
<th>Username</th>
<th>Password</th>
</tr>
<tr>
<td>'.$row[username].'</td>
<td>'.$row[password].'</td>
</tr>
</table>


Regards<br>
Xyz

</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <support@come4exchange.com>' . "\r\n";
	
	mail($to,$subject,$message,$headers);
	$msg = "<br><strong><font color='green'>Email Sent Successfully......</font></strong>";
	}
	else
	{
		$msg = "<br><strong><font color='red'>Email Not Found......</font></strong>";
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

<h2>Forget Password</h2>
<span><?php if (!empty($msg)){
	echo "$msg";
		}
	?></span>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  <input type="text" name="email" value="<?php echo $email;?>" placeholder="Your Email" pattern=".{7,30}" required title="7 to 30 characters"><br>
  <span class="error"> <?php echo $emailErr;?></span><br>
 <input type="submit" name="SendEmail" value="SendEmail">  
     
</form>
</div>
<?php include "footer.php" ;  ?>