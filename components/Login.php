<?php
	$db_handle = new DBController();
	$cookie = new Cookies();
	$username = $_POST['username'];
	$password = $_POST['password'];

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if($username == "" || $password == "") {
			$error = "Please enter username or password";
		}
		else{
			$sql_query = "SELECT * from user_info where username = '$username' and password = '$password'";
			$result = $db_handle->runQuery($sql_query);
			$num_rows = $db_handle->numRows($sql_query);
			if ($num_rows==0) {
				$error = "Your Login Name or Password is invalid";
			}else{
				$_SESSION['displayname'] = $result[0]["fullname"];
				$_SESSION['username'] = $result[0]["username"];
				setcookie("username",$username,time() + $cookie->get_expired_time(),"/");
				$displayname = $_SESSION['displayname'];
				$time = time() + $cookie->get_expired_time();
				$sql_insert = "INSERT INTO session_table(session_key, session_value, cookies_time) VALUES ( '$username', '$displayname', '$time')";
				if ($db_handle->runInsertQuery($sql_insert)) {
					echo "New record created successfully";
				} else {
					echo "Error: " . $sql_insert . "<br>";
				}
				$_SESSION['msg'] = "Login successfully";
				header ('location:index.php');
			}
		}
	}
?>

<div id="Login_form" style = "margin-bottom: 100px; margin-top: 70px;"> 
	<div class="log-form">
		<h2>Login to your account</h2>
		<form method="POST" action="">
			<p style = "margin-right: 265px;">Username:</p><input type="text" title="username" name="username" placeholder="Enter username" />
			<p style = "margin-right: 265px;">Password:</p><input type="password" title="username" name="password" placeholder="Enter password" />
			<button type="submit" class="btn_login">Login</button>
			<div style = "font-size:20px; color:#cc0000; margin-top:30px"><?php echo $error; ?></div>
		</form>
	</div>
</div>