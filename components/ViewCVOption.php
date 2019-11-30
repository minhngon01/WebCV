<?php
	if($_SESSION['isSessionOn'] == 0){
		header("location:index.php");	
	}

	$db_handle = new DBController();

	$user = $_SESSION['username'];

	$sql_query = "SELECT * from CV where user = '$user'";
	$result = $db_handle->runQuery($sql_query);
	$num_rows = $db_handle->numRows($sql_query);
?>	
	<div>
		<?php
			if($num_rows == 0){
				echo "<div>
						<img src=\"./imageStatic/error_cv_empty.jpg\" width=\"60%\" height=\"30%\" alt=\"cv_not_found\"/>
						<h5 class=\"text-danger\">Oops!It seem you haven't created any CV.<a href=\"?page=FormCV\">Click here</a> or \"Create CV\" to start making one.</h5>
					</div>";
			}
			else{
				echo "<h5 class=\"text-left\">
						Your maximum number of CV you can create is: ";
							if($_SESSION['user_role'] <= 1)
							{ 
								echo 5 . "<br>";
							}
							else {
								echo 3 . "<br>";
							}
				echo	"You created: " . $num_rows . " CV <br>
					</h5>
					<img src=\"./imageStatic/cv_template.png\" alt=\"cv_template\"/>
					<h4>
						Click on the name of CV you want to review to view it. 
					</h4>;
					<h3>";
					$count = 1;
					while($count <= $num_rows){
						echo "CV " . $count . ": <a href=\"?page=ViewCVOption_process&cv_name=" . $result[$count - 1]['cv_name'] . "\">" . $result[$count - 1]['cv_name'] . "</a><br>";
						$count++;
					}
				echo "</h3>";
			}
		?>
	</div>