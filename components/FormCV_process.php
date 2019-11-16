<?php
	define ("MAX_SIZE_KB","100");
	$db_handle = new DBController();
	$CVimageName = $_FILES['image']['name'];
	$target_dir = "./images/";
	$UploadOK = 1;

	$user = "test";

	$CVname = $_POST['CVname'];
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

	//$sql_query = "SELECT * from CV where user = '$productName'";
	//$result = $db_handle->runQuery($sql_query);
	//$num_rows = $db_handle->numRows($sql_query);

	if ($size > MAX_SIZE_KB*1024){
		$UploadOK = 0;
	}
	else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
		$UploadOK = 0;
  	}

  	if($UploadOK == 1){
		$target_file_name = $target_dir . $user . "." . $imageFileType;
	}
	else{
		$target_file_name = '';
	}

	/*if($num_rows != 0){
		if($result[0]["Image"] != '' && $UploadOK == 1){
			unlink($result[0]["Image"]);
		}

		$sql_update = "UPDATE products SET Price = '$price', Description = '$description', Image = '$target_file_name'  WHERE ProductName = '$productName'";
		$db_handle->runInsertQuery($sql_update);
	    
	    if($UploadOK == 1){
	    	move_uploaded_file($_FILES['image']['tmp_name'],$target_file_name);
		}
	}
	else{*/
  		$sql_insert = "INSERT INTO CV(
  						user, name, apply_position, website, contact_number, address, img, profile, skills, technical, experience, education) VALUES 
  						('$user', '$CVname', '$CVposition','$CVwebsite','$CVphone', '$CVaddress', '$target_file_name', '$CVprofile','$CVskill', '$CVtech', '$CVexperi','$CVedu')";
	    $db_handle->runInsertQuery($sql_insert);
	    
	    if($UploadOK == 1){
	    	move_uploaded_file($_FILES['image']['tmp_name'],$target_file_name);
		}
  	//}

  	header('location:index.php');
?>