	<div id="Register">
		<form id="RegisterForm" action="?page=RegisterForm_process" method="post" onsubmit="return checkRegister()">
	  		<h2>Sign Up</h2>
	  		<p>
				<label for="Name" class="floatLabel">Name</label>
				<input id="user_signup" name="Name" type="text" required="required">
			</p>
			<p>
				<label for="Email" class="floatLabel">Email</label>
				<input name="Email" type="text">
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
				<input id="pass_signup_comfirm" name="confirm_password" type="password" required="required">
			</p>
			<p>
				<input type="submit" value="Create My Account" id="submit">
			</p>
		</form>
	</div>
  