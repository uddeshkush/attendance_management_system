<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/included_functions.php"); ?>
<?php confirm_logged_in(); ?>	
<link rel="stylesheet" href="w3.css">
<style>
input[type=submit]{
    width: 10%;
    background-color:  #555555;
    color: white;
    padding: 10px 10px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>
<?php
$result="";
if(isset($_POST['submit'])) 
 {
     $srno = $_POST["srno"];

//perform database query.
$query = "SELECT * FROM STUDENT WHERE SRNO='$srno'";
		   
$result = mysqli_query($connection,$query);
?>

 <table class="w3-table-all w3-card-4 w3-centered">
   <thead>
    <tr class="w3-red">
    <th>SR NO.</th>
    <th>NAME</th> 
	<th>COURSE</th>
    <th>DOB</th>
	<th>DELETE DATA</th>
  </tr>
   </thead>
   <form action="new 1.php" method="post"> 
<input type="submit" name="DELETE" value="DELETE">
 </form>
<?php
}
?>

<div style="text-align:center">
  <form action="new 1.php" method="post"> 
    <input type="number" name="srno" value="srno">
  <br/><br/>
    <input type="submit" name="submit" value="submit">
	<br/><br/>
<?php  if($result)
{  //success
   ?>
   <?php
   while($row = mysqli_fetch_assoc($result)) {
?>

  <tr>
    <td><?php echo $row["SRNO"]; ?></td> 
    <td><?php echo $row["NAME"]; ?></td>
    <td><?php echo $row["COURSE"]; ?></td>
	<td><?php echo $row["DOB"]."<br/>"; ?></td>
  </tr>
<?php   
}
}

?>
   </form>
</div>
 <?php
if(isset($_POST['DELETE'])) 
 {
     $srno = $_POST["srno"];

//perform database query.
$query = "DELETE * FROM STUDENT WHERE SRNO='$srno'";
 }
?>
<?php
//close connection.
mysqli_close($connection);
?>










