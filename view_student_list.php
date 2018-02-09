<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
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
     $course = $_POST["course"];

//perform database query.
$query = "SELECT * FROM STUDENT WHERE COURSE='$course' ORDER BY SRNO";
		   
$result = mysqli_query($connection,$query);
?>

 <table class="w3-table-all w3-card-4 w3-centered">
   <thead>
    <tr class="w3-red">
    <th>SR NO.</th>
    <th>NAME</th> 
	<th>COURSE</th>
    <th>DOB</th>
  </tr>
   </thead>
<?php
}
?>

<div style="text-align:center">
  <form action="view_student_list.php" method="post"> 
    <label for="course" >Course</label>
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
   ?>
   <p style="text-align:center">LIST OF <?php echo $course; ?>  STUDENTS</p>
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
//close connection.
mysqli_close($connection);
?>
