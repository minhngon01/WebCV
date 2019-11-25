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
			$('.btn_toogle_Profile_area').each(function(index, element){
				$(element).show();
				// console.log(index);
				if($(element).hasClass('delete') == true){
					console.log(CheckDisplay('btn_toogle_Profile_area'));
					if(CheckDisplay('btn_toogle_Profile_area') == "none"){
						$('.btn_toogle_Profile_area:nth-child(1)').show();
					}
					else{
						$('.btn_toogle_Profile_area:nth-child(1)').hide();
					}
				}
			
			})
			$('.btn_toogle_Skills_area').each(function(index, element){
				$(element).show();
				
				if($(element).hasClass('delete') == true){
					// console.log($(element))
					console.log(CheckDisplay('btn_toogle_Skills_area'));

					if(CheckDisplay('btn_toogle_Skills_area') == "none"){
						$('.btn_toogle_Skills_area:nth-child(1)').show();
						
					}
					else{
						$('.btn_toogle_Skills_area:nth-child(1)').hide();

					}
				}
			})
			$('.btn_toogle_Technical_area').each(function(index, element){
				$(element).show();
				if($(element).hasClass('delete')){
					if(CheckDisplay('btn_toogle_Technical_area') == "none"){
						$('.btn_toogle_Technical_area:nth-child(1)').show();
					}
					else{
						$('.btn_toogle_Technical_area:nth-child(1)').hide();

					}
				}
			})
			$('.btn_toogle_Experience_area').each(function(index, element){
				$(element).show();
				if($(element).hasClass('delete')){
					if(CheckDisplay('btn_toogle_Experience_area') == "none"){
						$('.btn_toogle_Experience_area:nth-child(1)').show();
					}
					else{
						$('.btn_toogle_Experience_area:nth-child(1)').hide();
					}
				}
			})
			$('.btn_toogle_Education_area').each(function(index, element){
				$(element).show();
				if($(element).hasClass('delete')){
					if(CheckDisplay('btn_toogle_Education_area') == "none"){
						$('.btn_toogle_Education_area:nth-child(1)').show();
					}
					else{
						$('.btn_toogle_Education_area:nth-child(1)').hide();
					}
				}
			})
		}
		else if($("#btn_form_review").val() == "Review"){
			$("#doc #inner input").prop('disabled', true);
			$("#doc #inner textarea").prop('disabled', true);
			
			$("#btn_form_review").val("Input");

			$('.btn_toogle_Profile_area').each(function(index, element){
				$(element).hide();
			})
			$('.btn_toogle_Skills_area').each(function(index, element){
				$(element).hide();
			})
			$('.btn_toogle_Technical_area').each(function(index, element){
				$(element).hide();
			})
			$('.btn_toogle_Experience_area').each(function(index, element){
				$(element).hide();
			})
			$('.btn_toogle_Education_area').each(function(index, element){
				$(element).hide();
			})
		}
		$("#doc #inner input").toggleClass("delete_border");
		$("#doc #inner textarea").toggleClass("delete_border");
	});

	function CheckDisplay(classname){
		return $(`.${classname}`).closest(".yui-gf").css('display');
		
	}

	// show/hide part of formCV
	$(".btn_toogle_Profile_area").click(function(){
		$("#Profile_area").toggle(1000);
		if ($(this).hasClass('add')){
			$('.btn_toogle_Profile_area').each(function(index, element){
				if ($(element).hasClass('add')){
					$(element).hide();
				}
			})
		}
		if ($(this).hasClass('delete')){
			$('.btn_toogle_Profile_area').each(function(index, element){
				if ($(element).hasClass('add')){
					$(element).show();
				}
			})
		}
	});	
	
	$(".btn_toogle_Skills_area").click(function(){
		$("#Skills_area").toggle(1000);
		if ($(this).hasClass('add')){
			$('.btn_toogle_Skills_area').each(function(index, element){
				if ($(element).hasClass('add')){
					$(element).hide();
				}
			})
		}
		if ($(this).hasClass('delete')){
			$('.btn_toogle_Skills_area').each(function(index, element){
				if ($(element).hasClass('add')){
					$(element).show();
				}
			})
		}
	});	
	
	$(".btn_toogle_Technical_area").click(function(){
		$("#Technical_area").toggle(1000);
		if ($(this).hasClass('add')){
			$('.btn_toogle_Technical_area').each(function(index, element){
				if ($(element).hasClass('add')){
					$(element).hide();
				}
			})
		}
		if ($(this).hasClass('delete')){
			$('.btn_toogle_Technical_area').each(function(index, element){
				console.log(index);
				if ($(element).hasClass('add')){
					$(element).show();
				}
			})
		}
	});	
	
	$(".btn_toogle_Experience_area").click(function(){
		$("#Experience_area").toggle(1000);
		if ($(this).hasClass('add')){
			$('.btn_toogle_Experience_area').each(function(index, element){
				if ($(element).hasClass('add')){
					$(element).hide();
				}
			})
		}
		if ($(this).hasClass('delete')){
			$('.btn_toogle_Experience_area').each(function(index, element){
				console.log(index);
				if ($(element).hasClass('add')){
					$(element).show();
				}
			})
		}
	});	
	
	$(".btn_toogle_Education_area").click(function(){
		$("#Education_area").toggle(1000);
		if ($(this).hasClass('add')){
			$('.btn_toogle_Education_area').each(function(index, element){
				if ($(element).hasClass('add')){
					$(element).hide();
				}
			})
		}
		if ($(this).hasClass('delete')){
			$('.btn_toogle_Education_area').each(function(index, element){
				if ($(element).hasClass('add')){
					$(element).show();
				}
			})
		}
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