<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/included_functions.php");?>
<?php confirm_logged_in(); ?>
<link rel="stylesheet" href="w3.css">
<!DOCTYPE html>
<html>
<head>
<style>
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #555555;
  border: none;
  color: white;
  text-align: center;
  font-size: 28px;
  padding: 2px;
  width: 500px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>



</head>
<body>
 <img src="He.jpg" width="820" height="615" align="right"> 
 <div class="container">
<h1>WELCOME, <?php echo htmlentities($_SESSION["name"]); ?> </h1> 
<p>SELECT THE OPERATION TO BE PERFORMED:</p>
<div class="btn-group">

  <a href="mark_attendance.php"><button class="button" ><span>Upload Attendance</span></button>
  </a><br/><br/>
  <a href="monthly_attendance_report.php"><button class="button" ><span>Generate Monthly Attendance report</span></button>
  </a><br/><br/>
  <a href="../view_student_list.php"><button class="button" ><span>View Student details</span></button>
  </a><br/><br/>
  <a href="personal_details.php"><button class="button" ><span>Personal details</span></button>
  </a><br/><br/> 
  <a href="logout.php"><button class="button" ><span>Logout</span></button>
  </a>
</div>
</body>
</html>