	<?php
		if(empty($_COOKIE['username'])){
			header("location:index.php");	
		}

		if(isset($_GET['enableSearch'])){
			$user = $_SESSION['username'];
			$nameofCV = $_GET['enableSearch'];
			$sql_query = "SELECT * from CV where cv_name = '$nameofCV' and user = '$user'";
			$result = $db_handle->runQuery($sql_query);
		}
	?>
	<h6 class="text-danger">
		Enter your infomation into below form. We will use these information to make your CV. If you can't input all of these, don't worry! We wil simply gather 
		the rest to make your CV, but we recommend to input all information in order to make a good CV.
	</h6>
	<div class="text-info">
		This also can be used to edit your CV according to your CV name. Just enter your CV name and click Search(below button); after that start editing!
	</div>
	<button class="btn btn-success" onclick="search_CV()">Search</button>
	<h6 class="text-primary">
		Note: Image size cannot be larger than 200KB and if you leave image input empty and click submit, the process will delete an existed image if it is avaliable.
	</h6>
	<form action="?page=FormCV_process" method="POST" enctype="multipart/form-data">
		<div id="doc" class="yui-t">
			<div id="inner">
				<div id="hd">
					<div>
						<table class="basic_inform">
							<tr>
								<th>Name of CV</th>
								<th><textarea id="nameofCV-add" rows="1" cols="50" name="nameofCV"><?php if(isset($_GET['enableSearch'])){ echo $_GET['enableSearch'];} ?></textarea></th>
							</tr>
							<tr>
								<th>Name</th>
								<th><textarea id="CVname-add" rows="1" cols="50" name="CVname"><?php if(isset($_GET['enableSearch'])){ echo $result[0]['name'];} ?></textarea></th>
							</tr>
							<tr>
								<th>Apply position</th>
								<th><textarea id="CVposition-add" rows="1" cols="50" name="CVposition"><?php if(isset($_GET['enableSearch'])){ echo $result[0]['apply_position'];} ?></textarea></th>
							</tr>
							<tr>
								<th>Your website</th>
								<th><textarea id="CVwebsite-add" rows="1" cols="50" name="CVwebsite"><?php if(isset($_GET['enableSearch'])){ echo $result[0]['website'];} ?></textarea></th>
							</tr>
							<tr>
								<th>Contact numbers</th>
								<th><input id="CVphone-add" type="number" name="CVphone" value="<?php if(isset($_GET['enableSearch'])){ echo $result[0]['contact_number'];} ?>"/></th>
							</tr>
							<tr>
								<th>Address</th>
								<th><textarea id="CVaddress-add" rows="1" cols="50" name="CVaddress"><?php if(isset($_GET['enableSearch'])){ echo $result[0]['address'];} ?></textarea></th>
							</tr>
							<tr>
								<th>Image</th>
								<th><input type="file" name="image"/></th>
								<th>
									<div id="CVimage-add">
										<?php 
											if(isset($_GET['enableSearch'])){ 
												if($result[0]['img'] != ""){
													echo "Image avaliable";
												}
											} 
										?>
									</div>
								</th>
							</tr>
						</table>
					</div>
				</div>
				<div id="bd">
					<div id="yui-main">
						<div class="yui-b">
							<div class="yui-gf">
								<div class="yui-u first">
									<h2>Profile</h2>
								</div>
								<div class="yui-u">
									<textarea id="CVprofile-add" rows="5" cols="60" name="CVprofile"><?php if(isset($_GET['enableSearch'])){ echo $result[0]['profile'];} ?></textarea> 
								</div>
							</div>
							<div class="yui-gf">
								<div class="yui-u first">
									<h2>Skills</h2>
								</div>
								<div class="yui-u">
									<textarea id="CVskill-add" rows="5" cols="60" name="CVskill"><?php if(isset($_GET['enableSearch'])){ echo $result[0]['skills'];} ?></textarea>
								</div>
							</div>
							<div class="yui-gf">
								<div class="yui-u first">
									<h2>Technical</h2>
								</div>
								<div class="yui-u">
									<textarea id="CVtech-add" rows="5" cols="60" name="CVtech"><?php if(isset($_GET['enableSearch'])){ echo $result[0]['technical'];} ?></textarea>
								</div>
							</div>
							<div class="yui-gf">
								<div class="yui-u first">
									<h2>Experience</h2>
								</div>
								<div class="yui-u">
									<textarea id="CVexperi-add" rows="6" cols="60" name="CVexperi"><?php if(isset($_GET['enableSearch'])){ echo $result[0]['experience'];} ?></textarea>
								</div>
							</div>
							<div class="yui-gf last">
								<div class="yui-u first">
									<h2>Education</h2>
								</div>
								<div class="yui-u">
									<textarea id="CVedu-add" rows="5" cols="60" name="CVedu"><?php if(isset($_GET['enableSearch'])){ echo $result[0]['education'];} ?></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<input class="btn btn-info" type="submit" value="Submit"/>
	</form>	

