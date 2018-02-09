<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/included_functions.php");?>
<style>
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: blue;
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
	 $found_admin = attempt_login($username,$password);
     if ($found_admin)
     {	
        //successful login
		$_SESSION["username"] = $found_admin["USERNAME"];
		$_SESSION["name"] = $found_admin["NAME"];
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
  <title>Admin Login</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body> 

<div class="container">
  <div class="info">
   <a href="../index.html" ><button class="button">HOMEPAGE</button></a>
    <h1>Admin Login </h1>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="img/AdminIcon.jpg"/></div>
  <form action="index.php" class="login-form" method="post">
    <input type="text" name="username" required placeholder="username"  value="" />
    <input type="password" name="password" required placeholder="password" value=""/>
    <input type="submit" name ="login" value="login">
    
  </form>
</div>

</body>
</html>