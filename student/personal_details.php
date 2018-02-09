<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/included_functions.php"); ?>
<?php confirm_logged_in_student(); ?>
<style>
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #555555;
  border: none;
  color: white;
  text-align: center;
  
  padding: 2px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
</style>
<link rel="stylesheet" href="w3.css">
<a href="Welcome_page.php" class="dropbtn"><button class="button">BACK</button></a>
<h1 style="text-align:center">PERSONAL DETAILS</h1>
<?php
$result="";
$name = $_SESSION["name"];
//perform database query.
$query = "SELECT * FROM STUDENT WHERE NAME='$name'";		   
$result = mysqli_query($connection,$query);
?>
<?php  if($result)
{  //success  
   while($row = mysqli_fetch_assoc($result)) {
?>
<div style="text-align:center">
<table class="w3-table-all w3-card-4 w3-centered">
   <thead>
  <tr class="w3-red">
<br/><br/>
    <td>SR NO. :<?php echo $row["SRNO"]."<br/><br/>"; ?></td> <br/><br/>
    <td>NAME :<?php echo $row["NAME"]."<br/><br/>"; ?></td><br/><br/><br/>
    <td>COURSE :<?php echo $row["COURSE"]."<br/><br/>"; ?></td><br/><br/><br/>
	<td>DOB :<?php echo $row["DOB"]."<br/><br/>"; ?></td>
</tr>
</thead>
</div>
<?php
}  
}
?>