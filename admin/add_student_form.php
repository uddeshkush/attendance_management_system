<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/included_functions.php"); ?>
<?php confirm_logged_in(); ?>
<link rel="stylesheet" href="w3.css">
<?php
if(isset($_POST['submit'])) 
 {
	 $srno = $_POST["srno"];
     $name = $_POST["name"];
     $course = $_POST["course"];
     $dob = $_POST["dob"];
//perform database query.
$query = "INSERT INTO STUDENT(SRNO,NAME,COURSE,DOB) 
           VALUES('{$srno}','{$name}','{$course}','{$dob}');
		   ";
$result = mysqli_query($connection,$query);
confirm_query($result);	 
?>
<p align="center">"SUCCESSFUL"</p>
<?php
}
?>
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
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit]{
    width: 100%;
    background-color:  #555555;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}


div {
 	margin: auto;
	width: 600px;
	height: 475px;
    border: 5px solid black;	
    border-radius: 7px;
    padding: 20px;
}

</style>

<style>
h1 {
    text-decoration: underline;
}
</style>
<a href="Welcome_page.php" class="dropbtn"><button class="button">BACK</button></a>
<h1 style="text-align:center">STUDENT DETAILS</h1>
<div>
  <form action="add_student_form.php" method="post">
    <label for="srno">SR NO.</label>
    <input type="text" id="srno" name="srno" placeholder="eg. 101" required value="">

    <label for="name">NAME</label>
    <input type="text" id="name" name="name" placeholder="FULLNAME" required value="">
    
	<label for="dob">DOB</label>
    <input type="text" id="dob" name="dob" placeholder="YYYY/MM/DD" required value="">
	
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
    <input type="submit" name="submit" value="submit">
  </form>
</div>

<?php
//close connection.
mysqli_close($connection);
?>