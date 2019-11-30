<?php 
	require_once("model.php");
	$db_handle = new DBController();
	$nameofCV = $_GET["nameofCV"];
	$user = $_SESSION['username'];

	$sql_query = "SELECT * from CV where cv_name = '$nameofCV'";
	$result = $db_handle->runQuery($sql_query);
	$productInfo = array();
	echo json_encode($productInfo);
	if(!empty($result)) {
		array_push($productInfo,$result[0]['name'],$result[0]['apply_position'],$result[0]['website'],$result[0]['contact_number'],$result[0]['address'],$result[0]['img'],$result[0]['profile'],$result[0]['skills'],$result[0]['technical'],$result[0]['experience'],$result[0]['education']);
		echo json_encode($productInfo);
	}
	else {
		echo json_encode($productInfo);
	}
?>