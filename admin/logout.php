<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/included_functions.php"); ?>
<?php
$_SESSION["username"] = null;
redirect_to("index.php");
?>