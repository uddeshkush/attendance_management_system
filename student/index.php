<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/included_functions.php"); ?>
<style>
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: red;
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
<?php
 if(isset($_POST['login'])) 
 {
	 // form was submitted
	 $name = trim($_POST["name"]);
	 $course = trim($_POST["course"]);
	 $_SESSION["course"] = $course;
     $found_student = attempt_login_student($name,$course);
     if ($found_student)
     {	
        //successful login
		$_SESSION["name"] = $found_student["NAME"];
		$_SESSION["srno"] = $found_student["SRNO"];
	    redirect_to("Welcome_page.php");
     } 
	 else 
	 {
	    echo '<script type="text/javascript">'; 
echo 'alert("WRONG CREDENTIALS");'; 
echo 'window.location.href = "index.php";';
echo '</script>';
	 }
 }
 else 
 {
   $name = "";
   $message = "login";
 }
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Student Login</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body> 
<div class="container">
  <div class="info">
  <a href="../index.html" ><button class="button">HOMEPAGE</button></a>
    <h1>Student Login </h1>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="img\StudentIcon.svg"/></div>
  <form action="index.php" class="login-form" method="post">
    <input type="text" name="name" required placeholder="name"  value=""/>
    <input type="password" name="course" required placeholder="course" value=""/>
	<input type="submit" name="login" value="login">
  </form>
</div>
</body>
</html>
