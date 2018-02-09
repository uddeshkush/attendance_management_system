<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/included_functions.php"); ?>
<?php
$_SESSION["username"] = null;
$_SESSION["name"] = null;
$_SESSION["course"] = null;
redirect_to("index.php");
?>