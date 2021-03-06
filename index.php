<?php
	session_start();
	require_once("./components/model.php");
	$db_handle = new DBController();
	$cookie = new Cookies();

	if(empty($_COOKIE['username'])){
		$_SESSION['isSessionOn'] = 0;
		$_SESSION['user_role'] = 3;
	}
	else{
		$username = $_COOKIE['username'];
		$time = time();

		$sql_query = "SELECT * from session_table where session_key = '$username' and cookies_time >= '$time'";
		$result = $db_handle->runQuery($sql_query);
		$num_rows = $db_handle->numRows($sql_query);

		if($num_rows != 0){
			$_SESSION['isSessionOn'] = 1;
			$newExpiredTime = time() + $cookie->get_session_time();
			$_SESSION['displayname'] = $result[0]["session_value"];
			$displayname = $_SESSION['displayname'];

			setcookie("username",$username,time() + $cookie->get_cookies_time(),"/");
			$sql_insert = "INSERT INTO session_table(session_key, session_value, cookies_time) VALUES ( '$username', '$displayname', '$newExpiredTime')";
			$db_handle->runInsertQuery($sql_insert);

			$sql_query2 = "SELECT * from user_info where username = '$username'";
			$result2 = $db_handle->runQuery($sql_query2);

			$_SESSION['user_role'] = $result2[0]["role"] == null ? 3 : $result2[0]["role"]; 
		}
		else{
			$_SESSION['isSessionOn'] = 0;
			$_SESSION['user_role'] = 3;
		}
	}
	
	if(isset($_GET['page']) || isset($_POST['page'])){
		if(isset($_GET['page'])){
			$page = $_GET['page'];
			$page = "./components/" . $page;
			include('./components/header.php');
			include"$page.php";
			include('./components/footer.php');
		}
		else if(isset($_POST['page'])){
			$page = $_POST['page'];
			$page = "./components/" . $page;
			include('./components/header.php');
			include"$page.php";
			include('./components/footer.php');
		}
	}
	else {
		include('./components/header.php');
		include('./components/home_hero.php');
		include('./components/footer.php');
	}
?>