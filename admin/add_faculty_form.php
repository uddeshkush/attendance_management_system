<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/included_functions.php"); ?>
<?php confirm_logged_in(); ?>
<link rel="stylesheet" href="w3.css">
<?php
if(isset($_POST['Submit'])) 
 {
$username = $_POST["username"];
$name = $_POST["name"];
$course = $_POST["course"];
$contact = $_POST["contact"];
$hashed_password = password_encrypt($_POST["password"]);
$c_password = $_POST["c_password"];
$emailid = $_POST["emailid"];

//perform database query.
$query = "INSERT INTO FACULTY(USERNAME,NAME,COURSE,EMAILID,CONTACT,HASHED_PASSWORD) 
           VALUES('{$username}','{$name}','{$course}','{$emailid}','{$contact}','{$hashed_password}')";
		   
$result = mysqli_query($connection,$query);
confirm_query($result);
?>
<p align="center">"SUCCESSFUL"</p>
<?php
}
?>
<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=password], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
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
	height: 725px;
    border: 5px solid black;	
    border-radius: 7px;
   
    padding: 20px;
}
h1 {
    text-decoration: underline;
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
<h1 style="text-align:center">FACULTY DETAILS</h1>
<div>
  <form action="add_faculty_form.php" method="post">
    <label for="username">USERNAME</label>
    <input type="text" id="username" placeholder="eg. CS101" name="username" required>

    <label for="name">NAME</label>
    <input type="text" id="name" name="name" placeholder="FULLNAME" required>
	
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
	
	<label for="emailid">EMAILID</label>
    <input type="text" id="emailid" name="emailid" placeholder="eg. someone@some.com" required>
	
	<label for="contact">CONTACT</label>
    <input type="text" id="contact" name="contact" placeholder="10 digit number" required>
	
	<label for="password">PASSWORD</label>
    <input type="password" id="password" name="password" placeholder="8 to 12 characters" required>
	
	<label for="c_password">CONFIRM PASSWORD</label>
    <input type="password" id="c_password" name="c_password" placeholder="SAME AS PASSWORD" required>
	
  
    <input type="submit" name = "Submit" value="Submit">
  </form>
</div>

<?php
//close connection.
mysqli_close($connection);
?>