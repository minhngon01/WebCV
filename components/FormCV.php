	<?php
		if(empty($_COOKIE['username'])){
			header("location:index.php");	
		}
	?>
	<h6 class="text-danger">
		Enter your infomation into below form. We will use these information to make your CV. If you can't input all of these, don't worry! We wil simply gather 
		the rest to make your CV, but we recommend to input all information in order to make a good CV.
	</h6>
	<h6 class="text-primary">
		Note: Image size cannot be larger than 200KB and if you leave image input empty and click submit, the process will delete an existed image if it is avaliable.
	</h6>
	<div class="container">
		<div id="formCV">
			<input type="button" id="btn_form_review" class="btn btn-info" value="Review"/>
			<button id="btn_toogle_Profile_area" class="btn btn-info"><i class="fas fa-minus"></i></button>
			<button id="btn_toogle_Skills_area" class="btn btn-info"><i class="fas fa-minus"></i></button>
			<button id="btn_toogle_Technical_area" class="btn btn-info"><i class="fas fa-minus"></i></button>
			<button id="btn_toogle_Experience_area" class="btn btn-info"><i class="fas fa-minus"></i></button>
			<button id="btn_toogle_Education_area" class="btn btn-info"><i class="fas fa-minus"></i></button>
			<form action="?page=FormCV_process" method="POST" enctype="multipart/form-data">
				<div id="inputCV_processBar">
					<span>Your progress: </span>
					<div class="progress">
						<div class="progress-bar progress-bar-striped progress-bar-animated" style="width:0%">
							
						</div>
					</div>
				</div>
				<div class="text-left">
					Name of CV: <input id="nameofCV-add" type="text" name="nameofCV"/><input type="file" onchange="preview_image(event)" name="image"/>
				</div>
				<div id="doc">
					<div id="inner">
						<div id="hd">
							<div class="yui-gc">
								<div class="yui-u first">
									<img id="CV_image" src="./imageStatic/download.png"/>
									<h1><input id="CVname-add" type="text" name="CVname"/></h1>
									<h2><input id="CVposition-add" type="text" name="CVposition"/></h2>
								</div>
								<div class="yui-u">
									<div class="contact-info">
										<h3><input id="CVwebsite-add" type="text" name="CVwebsite"><img class="small_icon" src="./imageStatic/email.png" alt="email icon"/></h3>
										<h3><input id="CVphone-add" type="text" name="CVphone"><img class="small_icon" src="./imageStatic/phone.png" alt="phone icon"/></h3>
										<h3><input id="CVaddress-add" type="text" name="CVaddress"><img class="small_icon" src="./imageStatic/address.png" alt="address icon"/></h3>
									</div>
								</div>
							</div>
						</div>
						<div id="bd">
							<div id="yui-main">
								<div class="yui-b">
									<div id="Profile_area" class="yui-gf">
										<div class="yui-u first">
											<h2>Profile</h2>
										</div>
										<div class="yui-u">
											<p>
												<textarea id="CVprofile-add" rows="2" cols="60" name="CVprofile"></textarea> 
											</p>
										</div>
									</div>
									<div id="Skills_area" class="yui-gf">
										<div class="yui-u first">
											<h2>Skills</h2>
										</div>
										<div class="yui-u">
											<p>
												<textarea id="CVskill-add" rows="2" cols="60" name="CVskill"></textarea> 
											</p>
										</div>
									</div>
									<div id="Technical_area" class="yui-gf">
										<div class="yui-u first">
											<h2>Technical</h2>
										</div>
										<div class="yui-u">
											<p>
												<textarea id="CVtech-add" rows="2" cols="60" name="CVtech"></textarea> 
											</p>
										</div>
									</div>
									<div id="Experience_area" class="yui-gf">
										<div class="yui-u first">
											<h2>Experience</h2>
										</div>
										<div class="yui-u">
											<p>
												<textarea id="CVexperi-add" rows="2" cols="60" name="CVexperi"></textarea> 
											</p>
										</div>
									</div>
									<div id="Education_area" class="yui-gf">
										<div class="yui-u first">
											<h2>Education</h2>
										</div>
										<div class="yui-u">
											<p>
												<textarea id="CVedu-add" rows="2" cols="60" name="CVedu"></textarea> 
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<input class="btn btn-info" type="submit" value="Submit"/>
			</form>
		</div>
	</div>

