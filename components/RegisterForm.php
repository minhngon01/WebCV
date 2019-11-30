<?php
	$db_handle = new DBController();
	$defaultRole = 2;
	$msg = "";
	$err = "";
	$error = "";
	
	if(isset($_POST['reg_user']))
	{
		$username = $_POST['user_signup'];
		$email = $_POST['Email'];
		$fullname = $_POST['Fullname'];
		$password = $_POST['password'];
		
		$sql_query = "SELECT * from user_info where username = '$username'";
		$result = $db_handle->runQuery($sql_query);
		$num_rows = $db_handle->numRows($sql_query);

		if($num_rows != 0){
			$error = "User has already existed "; 
		}
		else{
			$sql_insert = "INSERT INTO user_info(username, email, password, fullname, role) VALUES ( '$username', '$email', '$password', '$fullname','$defaultRole')";
			if($db_handle->runInsertQuery($sql_insert)){
				$msg .= "Register successfully ";
			}
			else {
				$err .= "Error registering ";
			}
			$_SESSION['msg'] = $msg;
			$_SESSION['err'] = $err;
			header('location:index.php');	
		}
	}

?>

<script src="./js/RegisterForm.js"></script>
<body style= "background-color: #f2f5fa;">

	<div id="Register" style= "margin-top:-50px; margin-bottom:20px;">
		<form autocomplete="off" id="RegisterForm"  name="RegisterForm" method="post" onSubmit = 'return checkRegister()' >
			<h2>Sign Up</h2>
				<div id="availability" style = "margin-top: 10px;"></div>
			<p>
				<label for="Name" class="floatLabel">Name</label>
				<input id="user_signup" name="user_signup" type="text" required="required">
			</p>
		
			<p>
				<label for="Email" class="floatLabel">Email</label>
				<input name="Email" type="email" required="required" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" />
			</p>
			<p>
				<label for="Fullname" class="floatLabel">Fullname</label>
				<input name="Fullname" type="text" required="required">
			</p>
			<p>
				<label for="password" class="floatLabel">Password</label>
				<input id="pass_signup" name="password" type="password" required="required">
			</p>
			<p>
				<label for="confirm_password" class="floatLabel">Confirm Password</label>
				<input id="pass_signup_confirm" name="confirm_password" type="password" required="required">
			</p>
			<p>
				<input type="submit" value="Create My Account" name="reg_user" id="submit">
			</p>

			<div id='name_status' style = "font-size:20px; color:#cc0000; margin-top:30px"><?php echo $error; ?></div>
		</form>
	</div>
</body>





	
  