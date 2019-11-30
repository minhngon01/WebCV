<?php
	if($_SESSION['isSessionOn'] == 0){
		header("location:index.php");	
	}

	$db_handle = new DBController();

	$user = $_SESSION['username'];

	$sql_query = "SELECT * from CV where user = '$user'";
	$result = $db_handle->runQuery($sql_query);
	$num_rows = $db_handle->numRows($sql_query);
?>	
