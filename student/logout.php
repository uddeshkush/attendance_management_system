<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/included_functions.php"); ?>
<?php
$_SESSION["name"] = null;
redirect_to("index.php");
?>