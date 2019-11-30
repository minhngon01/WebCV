<?php
	$db_handle = new DBController();
	$cookie = new Cookies();
	
	$username = isset($_POST['username']) ? $_POST['username'] : "";
	$password = isset($_POST['password']) ? $_POST['password'] : "";
	$error = "";

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if($username == "" || $password == "") {
			$error = "Please enter username or password";
		}
		else{
			$sql_query = "SELECT * from user_info where username = '$username' and password = '$password'";
			$result = $db_handle->runQuery($sql_query);
			$num_rows = $db_handle->numRows($sql_query);
			if ($num_rows==0) {
				$error = "Your Username or Password is invalid";
			}else{
				$_SESSION['displayname'] = $result[0]["fullname"];
				$_SESSION['username'] = $result[0]["username"];
				setcookie("username",$username,time() + $cookie->get_cookies_time(),"/");
				$displayname = $_SESSION['displayname'];
				$time = time() + $cookie->get_session_time();
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
<body style= "background-color: #f2f5fa;">
	<div id="Login_form"> 
		<div class="log-form">
			<h2>Login to your account</h2>
			<form method="POST" action="">
				<p style = "margin-right: 265px;">Username:</p><input type="text" id = "user_signin" title="username" name="username" placeholder="Enter username" />
				<p style = "margin-right: 265px;">Password:</p><input type="password" title="username" name="password" placeholder="Enter password" />
				<button type="submit" class="btn_login">Login</button>
				<div style = "font-size:20px; color:#cc0000; margin-top:30px"><?php echo $error; ?></div>
			</form>
		</div>
	</div>
</body>

<script>
	$(document).ready(function(){  
			$('#user_signin').focus();
	});
</script>