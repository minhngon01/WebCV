<?php
	define ("MAX_SIZE_KB","200");
	$db_handle = new DBController();
	$CVimageName = $_FILES['image']['name'];
	$target_dir = "./images/";
	$UploadOK = 1;
	$err = "";
	$msg = "";

	$user = $_SESSION['username'];

	$CVname = $_POST['CVname'];
	$nameofCV = $_POST['nameofCV'];
	$CVposition = $_POST['CVposition'];
	$CVwebsite = $_POST['CVwebsite'];
	$CVphone = $_POST['CVphone'];
	$CVaddress = $_POST['CVaddress'];
	$CVprofile = $_POST['CVprofile'];
	$CVskill = $_POST['CVskill'];
	$CVtech = $_POST['CVtech'];
	$CVexperi = $_POST['CVexperi'];
	$CVedu = $_POST['CVedu'];

	$target_file = $target_dir . basename($CVimageName);

	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	$size = $_FILES["image"]["size"];

	$sql_query = "SELECT * from CV where cv_name = '$nameofCV' and user = '$user'";
	$result = $db_handle->runQuery($sql_query);
	$num_rows = $db_handle->numRows($sql_query);

	if ($size > MAX_SIZE_KB*1024){
		$UploadOK = 0;
		$err .= "File size is too large "; 
	}
	else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $CVimageName != ""){
		$UploadOK = 0;
		$err .= "This is not a image ";
  	}

  	if($UploadOK == 1 && $CVimageName != ""){
		$target_file_name = $target_dir . $user . "." . $imageFileType;
	}
	else{
		$target_file_name = '';
	}

	if($num_rows != 0){
		if($result[0]["img"] != ''){
			if(unlink($result[0]["img"])){
				$msg .= "Delete image successfully ";
			}
			else{
				$err .= "Error deleting ";
			}
		}

		$sql_update = "UPDATE CV SET 
						name = '$CVname',
						apply_position = '$CVposition',
						website = '$CVwebsite',
						contact_number = '$CVphone',
						address = '$CVaddress',
						img = '$target_file_name',
						profile = '$CVprofile',
						skills = '$CVskill',
						technical = '$CVtech',
						experience = '$CVexperi',
						education = '$CVedu'
						WHERE cv_name = '$nameofCV' and user = '$user'";
		if($db_handle->runInsertQuery($sql_update)){
			$msg .= "Update successfully ";
		}
		else{
			$err .= "Error updating ";
		}
	    
	    if($UploadOK == 1 && $CVimageName != ""){
	    	if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file_name)){
	    		$msg .= "Image updated";
	    	}
	    	else {
	    		$err .= "Error image updating ";
	    	}
		}
	}
	else{
  		$sql_insert = "INSERT INTO CV(
					user, cv_name, name, apply_position, website, contact_number, address, img, profile, skills, technical, experience, education) VALUES 
					('$user', '$nameofCV', '$CVname', '$CVposition','$CVwebsite','$CVphone', '$CVaddress', '$target_file_name', '$CVprofile','$CVskill', '$CVtech', '$CVexperi','$CVedu')";
	    if($db_handle->runInsertQuery($sql_insert)){
	    	$msg .= "Create successfully ";
	    }
	    else {
	    	$err .= "Error creating ";
	    }
	    
	    if($UploadOK == 1 && $CVimageName != ""){
	    	if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file_name)){
	    		$msg .= "Image added ";
	    	}
	    	else {
	    		$err .= "Error image adding ";
	    	}
		}
  	}

	$_SESSION['msg'] = $msg;
	$_SESSION['err'] = $err;

  	header('location:index.php');
?>