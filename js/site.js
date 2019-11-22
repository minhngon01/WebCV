$(document).ready(function(){
	// error msg
	$(function(){
		$("#err_msg").fadeOut(5000);
	});
	
	// inform msg
	$(function(){
		$("#info_msg").fadeOut(5000);
	});

	// formCV review button
	$("#btn_form_review").click(function(){
		if($("#btn_form_review").val() == "Input"){
			$("#doc #inner input").prop('disabled', false);
			$("#doc #inner textarea").prop('disabled', false);
			
			$("#btn_form_review").val("Review");
		}
		else if($("#btn_form_review").val() == "Review"){
			$("#doc #inner input").prop('disabled', true);
			$("#doc #inner textarea").prop('disabled', true);
			
			$("#btn_form_review").val("Input");
		}
		$("#doc #inner input").toggleClass("delete_border");
		$("#doc #inner textarea").toggleClass("delete_border");
	});
	
	// show/hide part of formCV
	$("#btn_toogle_Profile_area").click(function(){
		$("#btn_toogle_Profile_area i").hasClass("fas fa-plus") ? $("#btn_toogle_Profile_area i").removeClass("fas fa-plus").addClass("fas fa-minus") :
																  $("#btn_toogle_Profile_area i").removeClass("fas fa-minus").addClass("fas fa-plus");
		
		$("#Profile_area").toggle(1000);
	});	
	
	$("#btn_toogle_Skills_area").click(function(){
		$("#btn_toogle_Skills_area i").hasClass("fas fa-plus") ? $("#btn_toogle_Skills_area i").removeClass("fas fa-plus").addClass("fas fa-minus") :
																 $("#btn_toogle_Skills_area i").removeClass("fas fa-minus").addClass("fas fa-plus");
		
		$("#Skills_area").toggle(1000);
	});	
	
	$("#btn_toogle_Technical_area").click(function(){
		$("#btn_toogle_Technical_area i").hasClass("fas fa-plus") ? $("#btn_toogle_Technical_area i").removeClass("fas fa-plus").addClass("fas fa-minus") :
																  $("#btn_toogle_Technical_area i").removeClass("fas fa-minus").addClass("fas fa-plus");
		
		$("#Technical_area").toggle(1000);
	});	
	
	$("#btn_toogle_Experience_area").click(function(){
		$("#btn_toogle_Experience_area i").hasClass("fas fa-plus") ? $("#btn_toogle_Experience_area i").removeClass("fas fa-plus").addClass("fas fa-minus") :
																  $("#btn_toogle_Experience_area i").removeClass("fas fa-minus").addClass("fas fa-plus");
		
		$("#Experience_area").toggle(1000);
	});	
	
	$("#btn_toogle_Education_area").click(function(){
		$("#btn_toogle_Education_area i").hasClass("fas fa-plus") ? $("#btn_toogle_Education_area i").removeClass("fas fa-plus").addClass("fas fa-minus") :
																  $("#btn_toogle_Education_area i").removeClass("fas fa-minus").addClass("fas fa-plus");
		
		$("#Education_area").toggle(1000);
	});	
	
	// Check for changing progressBar
	$("#doc #inner input").on('input',function(){
		checkInput(this);
	});
	
	// and resize textarea
	$("#doc #inner textarea").on('input',function(){
		do_resize(this);
		checkInput(this);
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

function do_resize(textbox) {
	var maxrows=10; 
	var initialRow = 2;
	var txt=textbox.value;
	var cols=textbox.cols;
	var arraytxt=txt.split('\n');
	var rows=arraytxt.length; 
	
	for (i=0;i<arraytxt.length;i++) {
		rows+=parseInt(arraytxt[i].length/cols);
	}
	
	if(rows > initialRow){
		if (rows>maxrows) {
			textbox.rows=maxrows;
		}
		else {
			textbox.rows=rows;
		}
	}
	else{
		textbox.rows = initialRow;
	}
}

function preview_image(event) {
	var reader = new FileReader();
	
	reader.onload = function(){
		var output = document.getElementById('CV_image');
		output.src = reader.result;
	}
	reader.readAsDataURL(event.target.files[0]);
}

function checkInput(textbox){
	var txt=textbox.value;
	
	if(txt != ""){
		if($("#" + textbox.id).hasClass("tempt_checked_inputCV")){
			return;
		}
		else {
			adjustProgessBar(true);
			
			$("#" + textbox.id).addClass("tempt_checked_inputCV");
		}
	}
	else {
		adjustProgessBar(false);
		
		$("#" + textbox.id).removeClass("tempt_checked_inputCV");
	}
}

function adjustProgessBar(increase){
	var processBarWidth = parseFloat($("#inputCV_processBar .progress .progress-bar").css("width"));
	var processBarParentWidth = parseFloat($("#inputCV_processBar").css("width"));
	var myPercentage = Math.round(processBarWidth / processBarParentWidth * 100);
	
	var adjust = increase ? myPercentage + 10 : myPercentage - 10;
	$("#inputCV_processBar .progress .progress-bar").css("width", adjust + "%");
	
 	evalu = adjust >= 80 ? "Excellent" : adjust >= 60 ? "Good" : adjust >= 40 ? "Basic" : "Bad";
	
	var message = adjust != 0 ? adjust + " % " + evalu : "";
	
	$("#inputCV_processBar .progress .progress-bar").html(message);
}