<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/included_functions.php"); ?>
<?php confirm_logged_in(); ?>
<link rel="stylesheet" href="w3.css">
<?php
foreach ($_POST as $key => $value) 
{
if(is_int($key))
{
	$X = $_SESSION["WORKINGDAYS"];
	$Y = $_SESSION["MONTH"];
	$Z = $_SESSION["course"];
$query="INSERT INTO ATTENDED_CLASSES(SRNO,COURSE,PRESENTDAYS,TOTAL_CLASSES,MONTH) VALUES('{$key}','{$Z}','{$value}','{$X}','{$Y}');";
$res=mysqli_query($connection,$query);
if($res==false)die("<script>window.alert (\"FILL ALL COLUMNS\")</script>");
else
	//successful
?>


<?php
}
}
?>
<br><br>
<center>
<table>
<tr>
<td align="center"> SUCCESSFUL !! <br><br><br>
	Response has been successfully recorded.<br/><a href="index.php">Click Here To Logout </a></td>
</tr>
</table>
</center>