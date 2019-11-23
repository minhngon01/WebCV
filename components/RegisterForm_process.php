<?php
	$db_handle = new DBController();
	$defaultRole = 2;
	$msg = "";
	$err = "";

	$username = $_POST['Name'];
	$email = $_POST['Email'];
	$fullname = $_POST['Fullname'];
	$password = $_POST['password'];


	$sql_query = "SELECT * from user_info where username = '$username'";
	$result = $db_handle->runQuery($sql_query);
	$num_rows = $db_handle->numRows($sql_query);

	if($num_rows != 0){
		$err .= "User has already existed "; 
	}
	else{
		$sql_insert = "INSERT INTO user_info(username, email, password, fullname, role) VALUES ( '$username', '$email', '$password', '$fullname','$defaultRole')";
    	if($db_handle->runInsertQuery($sql_insert)){
    		$msg .= "Register successfully ";
    	}
    	else {
    		$err .= "Error registering ";
    	}
	}

	$_SESSION['msg'] = $msg;
	$_SESSION['err'] = $err;
  	header('location:index.php');
?>