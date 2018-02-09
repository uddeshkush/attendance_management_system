<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/included_functions.php"); ?>
<?php confirm_logged_in(); ?>	
<link rel="stylesheet" href="w3.css">
<?php
$result="";
if(isset($_POST['submit'])) 
 {
     $course = $_POST["course"];

//perform database query.
$query = "SELECT * FROM FACULTY WHERE COURSE='$course'";
		   
$result = mysqli_query($connection,$query);
?>
<table class="w3-table-all w3-card-4 w3-centered">
   <thead>
  <tr class="w3-red">
    <th>USERNAME</th>
    <th>NAME</th> 
	<th>COURSE</th>
	<th>EMAILID</th>
	<th>CONTACT</th>
  </tr>
   </thead>
<?php
}
?>

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
<a href="Welcome_page.php" class="dropbtn"><button class="button">BACK</button></a>
<div style="text-align:center">
  <form action="view_faculty_list.php" method="post"> 
    <label for="course">Course</label>
<select name="course" required>
     <option value="" disabled selected>Select Course</option>
    <option value="CSE">Computer Science & Engineering</option>
    <option value="CE">Civil Engineering</option>
    <option value="CH">Chemical Engineering</option>
    <option value="EC">Electronics Engineering</option>
    <option value="ME">Mechanical Engineering</option>
    <option value="EE">Electrical Engineering</option>
</select>
  <br/><br/>
    <input type="submit" name="submit" value="submit">
	<br/><br/>
<?php  if($result)
{  //success
   //redirect_to("basic.html");
   while($row = mysqli_fetch_assoc($result)) {
?>

  <tr>
    <td><?php echo $row["USERNAME"]; ?></td> 
    <td><?php echo $row["NAME"]; ?></td>
    <td><?php echo $row["COURSE"]; ?></td>
	<td><?php echo $row["EMAILID"]; ?></td>
	<td><?php echo $row["CONTACT"]."<br/>"; ?></td>
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
