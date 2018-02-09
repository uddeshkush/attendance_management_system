<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/included_functions.php"); ?>
<?php confirm_logged_in(); ?>
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
input[type=submit]{
    width: 10%;
    background-color:  #555555;
    color: white;
    padding: 10px 10px;
    
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>
<link rel="stylesheet" href="w3.css">
<?php
$result="";
if(isset($_POST['submit'])) 
 {
     $month = $_POST["month"];
     $course = $_SESSION["course"];
//perform database query.
$query = "SELECT SRNO,PRESENTDAYS,TOTAL_CLASSES FROM ATTENDED_CLASSES WHERE MONTH='$month' AND COURSE = '$course'";
		   
$result = mysqli_query($connection,$query);
}
?>
<a href="Welcome_page.php" class="dropbtn"><button class="button">BACK</button></a>
<h1 style="text-align:center">MONTHLY ATTENDANCE OF STUDENTS OF <?php echo $_SESSION["course"];?></h1>
<div style="text-align:center">
  <form action="monthly_attendance_report.php" method="post"> 
    <label for="month">Month</label>
<select name="month" required>
     <option value="" disabled selected>Select Month</option>
    <option value="JAN">JANUARY</option>
    <option value="FEB">FEBRUARY</option>
    <option value="MAR">MARCH</option>
    <option value="APR">APRIL</option>
    <option value="MAY">MAY</option>
    <option value="JUN">JUNE</option>
	<option value="JUL">JULY</option>
	<option value="AUG">AUGUST</option>
	<option value="SEP">SEPTEMBER</option>
	<option value="OCT">OCTOBER</option>
	<option value="NOV">NOVEMBER</option>
	<option value="DEC">DECEMBER</option>
</select>
  <br/><br/>
    <input type="submit" name="submit" value="submit"><br/><br/>
<table class="w3-table-all w3-card-4 w3-centered">
   <thead>
  <tr class="w3-red">
    <th>SR NO.</th>
	<th>PRESENT DAYS</th>
	<th>WORKING DAYS</th>
  </tr>
   </thead>
<?php  if($result)
{  //success
   //redirect_to("basic.html");
   while($row = mysqli_fetch_assoc($result)) {
?>

  <tr>
    <td><?php echo $row["SRNO"]; ?></td> 
	<td><?php echo $row["PRESENTDAYS"]; ?></td>
	<td><?php echo $row["TOTAL_CLASSES"]."<br/>"; ?></td>
  </tr>
<?php   
}
}

?>
   </form>
</div>


<?php
//close connection.
mysqli_close($connection);
?>
