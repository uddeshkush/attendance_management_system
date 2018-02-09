<?php
function mark_present($srno)
{
	$query = "UPDATE ATTENDED_CLASSES SET C = C + 1  WHERE SRNO = '{$srno}'";
}
?>