<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/included_functions.php");?>
<style>
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: green;
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
	 $username = trim($_POST["username"]);
	 $password = trim($_POST["password"]);
     $found_faculty = attempt_login_faculty($username,$password);
     if ($found_faculty)
     {	
        //successful login
		$_SESSION["username"] = $found_faculty["USERNAME"];
		$_SESSION["name"] = $found_faculty["NAME"];
		$_SESSION["course"] = $found_faculty["COURSE"];
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
   $username = "";
   $message = "login";
 }
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Faculty Login</title>
   <link rel="stylesheet" href="css/style.css"> 
</head>

<body>
<div class="container">
  <div class="info">
   <a href="../index.html" ><button class="button">HOMEPAGE</button></a>
    <h1>Faculty Login </h1>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="img/FacultyIcon.png" /></div>
  <form action="index.php" class="login-form" method="post">
    <input type="text" name="username" required placeholder="fac_id"  value=""/>
    <input type="password" name="password" required placeholder="password" value=""/>
	<input type="submit" name="login" value="login">
    
  </form>
</div>

</body>
</html>
