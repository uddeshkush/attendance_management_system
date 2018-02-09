<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/included_functions.php"); ?>
<?php confirm_logged_in(); ?>	
<link rel="stylesheet" href="w3.css">
<?php
if(isset($_POST['Submit'])) 
 {
$name = $_POST["name"];
$username = $_POST["username"];
$hashed_password = password_encrypt($_POST["password"]);
$c_password = $_POST["c_password"];

//perform database query.
$query = "INSERT INTO ADMIN(NAME,USERNAME,HASHED_PASSWORD) 
           VALUES('{$name}','{$username}','{$hashed_password}')";
		   
$result = mysqli_query($connection,$query);
confirm_query($result);
?>
<p align="center">"SUCCESSFUL"</p>


<?php
}
?>
<style>
body {
    
    background-image: url(".jpg");
}
</style>
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
h1 {
    text-decoration: underline;
}

div {
 	margin: auto;
	width: 600px;
	height: 500px;
    border: 5px solid black;	
    border-radius: 7px;
    padding: 20px;
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
<h1 style="text-align:center">ADMIN DETAILS</h1>
<div>
  <form action="add_admin_form.php" method="post">
    <label for="name">NAME</label>
    <input type="text" name="name" placeholder="FULLNAME" required>
	
    <label for="username">USERNAME</label>
    <input type="text" name="username" placeholder="USERNAME" required>
	
	<label for="password">PASSWORD</label>
    <input type="password" name="password" placeholder="8 to 12 characters" required>
	
	<label for="c_password">CONFIRM PASSWORD</label>
    <input type="password" name="c_password" placeholder="SAME AS PASSWORD" required>
	
  
    <input type="submit" name = "Submit" value="Submit">
  </form>
</div>


<?php
//close connection.
mysqli_close($connection);
?>