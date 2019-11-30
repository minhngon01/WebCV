<?php
	$count = 0;
	if(empty($_COOKIE['username'])){
		header("location:index.php");	
	}

	$db_handle = new DBController();

	$user = $_SESSION['username'];

	$sql_query = "SELECT * from CV where user = '$user'";
	$result = $db_handle->runQuery($sql_query);
	$num_rows = $db_handle->numRows($sql_query);
?>	
<body style= "background-color: #f2f5fa;">
	<div class = "row" style = "margin: 10px 0 10px;">
		<p style= "font-size: 30px; margin-left: 20px;"> You can create maximum
			<?php if($_SESSION['user_role'] <= 1)
						{ 
							echo 5 . " CV";
						}
						else {
							echo 3 . " CV";
						}
			?>
	</div>

	<div class = "row" style = "margin: 0px 0 10px;">
		<?php while($count < $num_rows): ?>
				<div class = "col-sm-4" style = "margin: 20px 0 20px;">
						<div style="border:3px solid black; background-color:white; border-radius:5px; padding:10px; align:center;" >
							<img src="./imageStatic/cv_template.png" class="img-responsive" style ="max-width:300px;" /><br />
					
							<h4 class="text-info">Name of CV:</h4>
					
							<h4 class="text-danger"><?php echo $result[$count]['cv_name']; ?></h4>
					
							<a href = "?page=ViewCVOption_process&cv_name=<?php echo $result[$count]['cv_name'] ?>" type = "button"> View CV </a>
							<a type = "button"> Edit CV </a>
							<a href = "?page=ViewCVOption_process&cv_name=<?php echo $result[$count]['cv_name'] ?>"type = "button"> Edit CV </a>
						</div>
				</div>
			<?php $count++; ?>
		<?php endwhile ?>
	</div>
</body>