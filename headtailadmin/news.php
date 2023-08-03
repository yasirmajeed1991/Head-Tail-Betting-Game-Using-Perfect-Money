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
$newsErr  = "";
$news =   "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["news"])) {
    $newsErr = "Fund is required";
  } 
  
  if(empty($newsErr) ){
									
		$sql = "INSERT INTO news (content) VALUES ('$_POST[news]')";
		mysqli_query($con,$sql);
		$msgNews = "<br><strong><font color='green'>News Has Been Added Successfully..</font></strong>";
		}
	
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Add News</h2>
<?php 
if(!empty($_SESSION[newsmsg])){
				echo $_SESSION[newsmsg];
				$_SESSION[newsmsg]='';
				
			}
?>
<?php echo $msgNews;?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

<textarea rows="4" cols="50" name="news"  placeholder="Add News........." required></textarea>  <br>
  <span class="error"> <?php echo $fundErr;?></span><br>
  
  
 <input type="submit" name="submit" value="Add News">  
     
</form>
</div>
<div class="clear"></div>
			
			<div id="stat_box">&bull; News History</div>				<div id="box">
				<div class="cell_280"><b>ID</b></div>
				<div class="cell_280" style="width:700px"><b>Content</b></div>
				<div class="cell_200"><b>Action</b></div>
				<div class="clear"></div>
<?php 
						$sql = "SELECT * FROM news ";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
	 
	 					?>
						
						
						
					<div class="cell_280"><font color='red'><?php echo $row[id];?></font></div>
						<div class="cell_280" style="width:700px"><p><font color='red'><?php echo $row[content];?></font></p></div>
						<div class="cell_200"><font color='red'><a href="del.php?nid=<?php echo $row[id]?>">Delete</a> </font></div>
						<div class="clear"></div>	
<?php }?>
						</div>
<?php include "footer.php" ;  ?>