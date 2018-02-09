<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/included_functions.php"); ?>
<?php confirm_logged_in(); ?>
<link rel="stylesheet" href="w3.css">
<h1 style="text-align:center">PERSONAL DETAILS</h1>
<?php
$result="";
$name = $_SESSION["name"];
//perform database query.
$query = "SELECT * FROM FACULTY WHERE NAME='$name'";		   
$result = mysqli_query($connection,$query);
?>
<?php  if($result)
{  //success  
   while($row = mysqli_fetch_assoc($result)) {
?>

<div style="text-align:center">
<tr><br/>
    <td>USERNAME:<?php echo $row["USERNAME"]."<br/><br/>"; ?></td> <br/><br/><br/>
    <td>NAME:<?php echo $row["NAME"]."<br/><br/>"; ?></td><br/><br/><br/>
    <td>COURSE:<?php echo $row["COURSE"]."<br/><br/>"; ?></td><br/><br/><br/>
	<td>EMAILID:<?php echo $row["EMAILID"]."<br/><br/>"; ?></td><br/><br/><br/>
	<td>CONTACT:<?php echo $row["CONTACT"]."<br/><br/>"; ?></td>
</tr>
</div>
<?php
}  
}
?>