<?php
	require_once("./components/model.php");
	$db_handle = new DBController();
	$session_key = $_SESSION['username'];

	$sql_query = "DELETE FROM session_table WHERE session_key = '$session_key'";
	$result = $db_handle->runInsertQuery($sql_query);
	
	session_destroy();
	header ('location:index.php');
?>