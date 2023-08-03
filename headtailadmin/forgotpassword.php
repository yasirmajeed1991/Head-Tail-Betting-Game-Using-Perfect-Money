<?php
include("dbconnection.php");
error_reporting(0);
?>
<?php
$toaddress = $_POST[emailid];
 if(isset($_POST[Changepassword]))
 {
 	$sql = "SELECT * FROM  `students` where RegNo='$_POST[regno]' AND EmailId='$_POST[emailid]'";
	$sqlq = mysqli_query($con,$sql);

 	if(mysqli_num_rows($sqlq) == 1)
	{	
	$rs = mysqli_fetch_array($sqlq);

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'aabroo.majeed@gmail.com';          // SMTP username
$mail->Password = 'Pentium1234'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to
$mail->setFrom('Careercounceling@carrercounceling.com', 'Careercounceling');
$mail->addReplyTo('Careercounceling@carrercounceling.com', 'Careercounceling');
$mail->addAddress($toaddress);   // Add a recipient
$mail->isHTML(true);  // Set email format to HTML

$bodyContent = "<p>Dear ". $rs[FirstName] . " ". $rs[LastName]. "!</p>";
$bodyContent .= "<p>Your Registration No is <strong>". $rs[RegNo] . "</strong><br> Your Password is <strong>". $rs[password] . "</strong> <p><br>
<br>
<br>
<br>
<br>
<br>

<p><span><strong>Regards</strong></span><br>
<span>Careercounceling Center</span><br>
<span>Owner (Benish & Maryam)</span>
</p>
";

$mail->Subject = 'Password Recovery from Careercounceling';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    $msg= "<font color='red'><h5>Failed to retrieve password...</h5></font>";
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    $msg= "<font color='green'><h5><strong>Password has been sent successfully to your email address.</strong></h5></font>";
}

	
	}
	else{
		
	$msg= "<font color='red'><h5>Invalid User detail Please proceed with correct details.</h5></font>";	
	}
 }
include("header.php");
?>             
      	<div class="row space30"> <!-- row 1 begins -->
      
  <div class="col-xs-12 col-sm-6 col-lg-8">
              	<h2>Forgot password</h2>
                   <p><strong><?php echo $msg; ?></strong></p>
      <form name="form3" method="post" action="" onsubmit="return validate3()">
<table  class="tftable" width="424" height="142" border="2">
<tr>
<th>Registration No</th>
<td>&nbsp;&nbsp;<input type="text" name="regno" size="30" placeholder="Enter register number"></td>
</tr>
<tr>
<th>Email ID</th>
<td>&nbsp;&nbsp;<input type="email" name="emailid" size="30" placeholder="Enter Email ID"></td>
</tr>
<tr>
<td colspan="2" align="center"><input name="Changepassword" type="submit" value="Change Password" ></td>
</tr></table></form>
</p>
          </div>
            
     	</div> <!-- /row 1 -->
        
        <div class="row space30"> <!-- row 2 begins --> 
        
            
        </div> <!-- /row 2 -->
<?php 
include("footer.php");
?>
