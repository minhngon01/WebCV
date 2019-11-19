$(document).ready(function(){
	// error msg
	$(function(){
		$("#err_msg").fadeOut(5000);
	});
	
	// inform msg
	$(function(){
		$("#info_msg").fadeOut(5000);
	});
});

function checkRegister(){
	var userSignup = $('#user_signup').val();
	var passSignup = $('#pass_signup').val();
	var passSignupConfirm = $('#pass_signup_comfirm').val();

	if(userSignup.length > 50){
		alert("Username is too long");
		return false;
	}

	if(passSignup.length > 8){
		alert("Password is too long");
		return false;
	}

	if(passSignup != passSignupConfirm){
		alert("Your password comfirmation is not match");
		return false;
	}

	return true;
}

function search_CV(){
	var nameofCV = $('#nameofCV-add').val();
	if(nameofCV == ""){
		$('#CVname-add').val("");
		$('#CVposition-add').val("");
		$('#CVwebsite-add').val("");
		$('#CVphone-add').val("");
		$('#CVaddress-add').val("");
		$('#CVimage-add').val("");
		$('#CVprofile-add').val("");
		$('#CVskill-add').val("");
		$('#CVtech-add').val("");
		$('#CVexperi-add').val("");
		$('#CVedu-add').val("");
		return;
	}
	else{
		window.location.href = "?page=FormCV&enableSearch=" + nameofCV;
		/*$.ajax({
			type: "POST",
			url: "http://localhost/components/searchCVadd.php",
			data: "nameofCV="+nameofCV,
			success: function(data){
				alert("s");
				$('#CVname-add').val(data[0]);
				$('#CVposition-add').val(data[1]);
				$('#CVwebsite-add').val(data[2]);
				$('#CVphone-add').val(data[3]);
				$('#CVaddress-add').val(data[4]);
				if(data.length != 0){
					if(data[5] != ""){
						$('#CVimage-add').html("Image is avaliable");
					}
				}
				else{
					$('#CVimage-add').html("");
				}
				$('#CVprofile-add').val(data[6]);
				$('#CVskill-add').val(data[7]);
				$('#CVtech-add').val(data[8]);
				$('#CVexperi-add').val(data[9]);
				$('#CVedu-add').val(data[10]);
			},
			dataType: "json",
			error: function(data){
				alert("fail");
			}
		});*/
	}
}

function printDiv(selector) {
    var prtContent = document.getElementById(selector);
	var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
	WinPrint.document.write('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">');
	WinPrint.document.write('<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">');
	WinPrint.document.write('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">');
	WinPrint.document.write('<link rel="stylesheet" href="./css/style.css">');
	WinPrint.document.write(prtContent.innerHTML);
	WinPrint.document.close();
	WinPrint.focus();
	WinPrint.print();
	WinPrint.close();
}