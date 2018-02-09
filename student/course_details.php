<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/included_functions.php"); ?>
<?php confirm_logged_in_student(); ?>
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
</style>
<link rel="stylesheet" href="w3.css">
<?php
     $course = $_SESSION["course"];
//perform database query.
$query = "SELECT COURSE,NAME,EMAILID FROM FACULTY";
		   
$result = mysqli_query($connection,$query);
?>
<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>
<a href="Welcome_page.php" class=""><button class="button">BACK</button></a>
<h1 style="text-align:center">COURSE DETAILS</h1>
<div >
<table class="w3-table-all w3-card-4 w3-centered">
   <thead>
  <tr class="w3-red">
    <th>COURSE</th>
	<th>INSTRUCTOR</th>
	<th>EMAIL ID</th>
  </tr>
  </thead>
<?php
   while($row = mysqli_fetch_assoc($result)) {
?>
  <tr>
    <td><?php echo $row["COURSE"]; ?></td> 
	<td><?php echo $row["NAME"]; ?></td>
	<td><?php echo $row["EMAILID"]."<br/>"; ?></td>
  </tr>
<?php   
}
?>
</div>

<?php
//close connection.
mysqli_close($connection);
?>