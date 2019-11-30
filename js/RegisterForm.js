 $(document).ready(function(){ 
	var password = $("#pass_signup");
	var confirm_password = $("#pass_signup_confirm");
	var username = $("#user_signup");

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
 	
 	username.on('keyup',function(){
 		if( (username.value.length <= 5 || username.value.length >= 15)){
			username.setCustomValidity("Your username must contain words and at least 6 to 15 character");
		}
		else if((!isNaN(username.value))){
			username.setCustomValidity("Your username must contain words and at least 6 to 15 character");
		}
		else {
			username.setCustomValidity('');
		}
 	});

 	password.on('keyup',function(){ 
 		if (password.value.length < 6) {
			password.setCustomValidity("Password must have at least 6 characters");
		} else {
			password.setCustomValidity('');
		}
 	}); 

 	confirm_password.on('keyup',function(){ 
 		if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Passwords Don't Match");
		} else {
			confirm_password.setCustomValidity('');
		}
 	});
});