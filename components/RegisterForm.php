<?php
	$db_handle = new DBController();
	$defaultRole = 2;
	$msg = "";
	$err = "";
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

<body style= "background-color: #f2f5fa;">
	<div id="Register" style= "margin-top:-50px; margin-bottom:20px;">
		<form id="RegisterForm"  name="RegisterForm" method="post" onSubmit = 'return checkRegister()' autocomplete='off' >
			<h2>Sign Up</h2>
			<p>
				<label for="Name" class="floatLabel">Name</label>
				<input id="user_signup" name="user_signup" type="text" required="required">
				<div id="availability" style = "margin-top: 20px;"></div>
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

<script>
	$(document).ready(function(){  
     	$('#user_signup').on('keyup',function(){  
			var username = $('#user_signup').val(); 
			
			$.ajax({  
				url:"components/checkdata.php",  
				method: "POST",  
				data: {user_name: username},  
				success:function(data){  
					$('#availability').html(data);

				},
				error: function (error) {
					console.log(error);
				}
			});  
     	});  
	});  
 

var password = document.getElementById("pass_signup")
  , confirm_password = document.getElementById("pass_signup_confirm")
  , username = document.getElementById("user_signup");
function validatePassword(){
	if (password.value.length < 6) {
		password.setCustomValidity("Password must have at least 6 characters");
	} else {
		password.setCustomValidity('');
	}
	if(password.value != confirm_password.value) {
		confirm_password.setCustomValidity("Passwords Don't Match");
	} else {
		confirm_password.setCustomValidity('');
	}
	
}

function validateUsername() {
	if( (username.value.length <= 5 || username.value.length >= 15)){
		username.setCustomValidity("Your username must contain words and at least 6 to 15 character");
	}
	else if((!isNaN(username.value))){
		username.setCustomValidity("Your username must contain words and at least 6 to 15 character");
	}
	else {
		username.setCustomValidity('');
	}
}

password.onkeyup = validatePassword;
confirm_password.onkeyup = validatePassword;
username.onkeyup = validateUsername;
</script>



	
  