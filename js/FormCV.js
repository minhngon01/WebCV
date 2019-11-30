$(document).ready(function(){
	// formCV review button
	$("#btn_form_review").click(function(){
		if($("#btn_form_review").val() == "Input"){
			$("#doc #inner input").prop('disabled', false);
			$("#doc #inner textarea").prop('disabled', false);
			
			$("#btn_form_review").val("Review");
			
			$('.btn_toogle_Profile_area').show();
			$('.btn_toogle_Skills_area').show();
			$('.btn_toogle_Technical_area').show();
			$('.btn_toogle_Experience_area').show();
			$('.btn_toogle_Education_area').show();
			
			$('.selectSection').toggle(500);
			$('.ImageSection').toggle(500);


			
		}
		else if($("#btn_form_review").val() == "Review"){
			$("#doc #inner input").prop('disabled', true);
			$("#doc #inner textarea").prop('disabled', true);
			
			$("#btn_form_review").val("Input");

			$('.btn_toogle_Profile_area').hide();
			$('.btn_toogle_Skills_area').hide();
			$('.btn_toogle_Technical_area').hide();
			$('.btn_toogle_Experience_area').hide();
			$('.btn_toogle_Education_area').hide();
			$('.selectSection').toggle(500);
			$('.ImageSection').toggle(500);


		}
		$("#doc #inner input").toggleClass("delete_border");
		$("#doc #inner textarea").toggleClass("delete_border");
	});

	// show/hide part of formCV
	// add section
	$('.btnAddField').on('click', function(){
		var select_value = $('.select_add_field').val();
		if(CheckDisplay('btn_toogle_'+ select_value + '_area') == 'none'){
			$('#' + select_value + '_area').toggle(1000);
		}else if (CheckDisplay('btn_toogle_'+ select_value + '_area') == undefined){
			alert('Please check your select again');
		}else{
			alert('The ' + select_value +' section has already been added');

		}
	})	
	$(".btn_toogle_Profile_area").click(function(){
		$("#Profile_area").toggle(1000);
		
	});	
	
	$(".btn_toogle_Skills_area").click(function(){
		$("#Skills_area").toggle(1000);
		
	});	
	
	$(".btn_toogle_Technical_area").click(function(){
		$("#Technical_area").toggle(1000);
		
	});	
	
	$(".btn_toogle_Experience_area").click(function(){
		$("#Experience_area").toggle(1000);
	});	
	
	$(".btn_toogle_Education_area").click(function(){
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

	$(".custom-file-input").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});
});

function CheckDisplay(classname){
	return $(`.${classname}`).closest(".yui-gf").css('display');
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