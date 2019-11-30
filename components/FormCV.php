	<?php
		if($_SESSION['isSessionOn'] == 0){
			header("location:index.php");	
		}
	?>
	<script src="./js/FormCV.js"></script>
	<h6 class="text-danger">
		Enter your infomation into below form. We will use these information to make your CV. If you can't input all of these, don't worry! We wil simply gather 
		the rest to make your CV, but we recommend to input all information in order to make a good CV.
	</h6>
	<h6 class="text-primary">
		Note: Image size cannot be larger than 200KB and if you leave image input empty and click submit, the process will delete an existed image if it is avaliable.
	</h6>
	<div class="container">
		<div id="formCV">
			<div class="row">
				<div class="col-md-12">
					<input type="button" style="width: 100%" id="btn_form_review" class="btn btn-success" value="Review"/>
				</div>
			</div>
			<form action="?page=FormCV_process" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-12">
						<div class="text-left">
							Name of CV: <input id="nameofCV-add" type="text" name="nameofCV"/>
						</div>
						<div id="inputCV_processBar" style="padding: 10px 0">
							<span>Your progress: </span>	
							<div class="progress">
								<div class="progress-bar progress-bar-striped progress-bar-animated" style="width:0%">
									
								</div>
							</div>
						</div>
					</div>
				</div>

				<div style="marign: 10px auto; width: 100%">
					<div class="row text-center selectSection">
						<div class="col-md-6">
							<div class="form-group" style="margin-left: 70px">
								<select class="form-control select_add_field">
									<option value="-1" selected disabled>Select section</option>
									<option value="Profile">Profile</option>
									<option value="Skills">Skills</option>
									<option value="Technical">Technical</option>
									<option value="Experience">Experience</option>
									<option value="Education">Education</option>
								</select>
							</div>
						</div>
						<div class="col-md-6 text-left">
							<button class="btn btn-info btnAddField" type="button">Select</button>
						</div>
					</div>
					<div class="row ImageSection" >
						<div class="col-md-6">
							<div class="custom-file"  style="margin-left: 70px">
								<input type="file"  class="custom-file-input" onchange="preview_image(event)" name="image"/>
								<label class="custom-file-label" for="customFile">Choose File</label>
							</div>	
						</div>
					</div>
				</div>
				
				<div id="doc">
					<div id="inner">
						<div id="hd">
							<div class="yui-gc">
								<div class="yui-u first">
									<img id="CV_image" src="./imageStatic/download.jpg"/>
									<h1><input id="CVname-add" type="text" name="CVname"/></h1>
									<h2><input id="CVposition-add" type="text" name="CVposition"/></h2>
								</div>
								<div class="yui-u">
									<div class="contact-info">
										<h3><input id="CVwebsite-add" type="text" name="CVwebsite"><img class="small_icon" src="./imageStatic/email.jpg" alt="email icon"/></h3>
										<h3><input id="CVphone-add" type="text" name="CVphone"><img class="small_icon" src="./imageStatic/phone.jpg" alt="phone icon"/></h3>
										<h3><input id="CVaddress-add" type="text" name="CVaddress"><img class="small_icon" src="./imageStatic/address.jpg" alt="address icon"/></h3>
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
										<div class="yui-u second">
											<p>
												<textarea id="CVprofile-add" rows="2" cols="60" name="CVprofile"></textarea> 
											</p>
										</div>
										<div class="yui-u third">
											<button type="button"  class="btn_toogle_Profile_area btn btn-info delete"><i class="fas fa-minus"></i></button>
										</div>
									</div>
									<div id="Skills_area" class="yui-gf">
										<div class="yui-u first">
											<h2>Skills</h2>
										</div>
										<div class="yui-u second">
											<p>
												<textarea id="CVskill-add" rows="2" cols="60" name="CVskill"></textarea> 
											</p>
										</div>
										<div class="yui-u third">
											<button type="button"  class="btn_toogle_Skills_area btn btn-info delete "><i class="fas fa-minus"></i></button>
										</div>
									</div>
									<div id="Technical_area" class="yui-gf">
										<div class="yui-u first">
											<h2>Technical</h2>
										</div>
										<div class="yui-u second">
											<p>
												<textarea id="CVtech-add" rows="2" cols="60" name="CVtech"></textarea> 
											</p>
										</div>
										<div class="yui-u third">
											<button type="button"  class="btn_toogle_Technical_area btn btn-info delete"><i class="fas fa-minus"></i></button>
										</div>
									</div>
									<div id="Experience_area" class="yui-gf">
										<div class="yui-u first">
											<h2>Experience</h2>
										</div>
										<div class="yui-u second">
											<p>
												<textarea id="CVexperi-add" rows="2" cols="60" name="CVexperi"></textarea> 
											</p>
										</div>
										<div class="yui-u third">
											<button type="button"  class="btn_toogle_Experience_area btn btn-info delete"><i class="fas fa-minus"></i></button>
										</div>
									</div>
									<div id="Education_area" class="yui-gf">
										<div class="yui-u first">
											<h2>Education</h2>
										</div>
										<div class="yui-u second">
											<p>
												<textarea id="CVedu-add" rows="2" cols="60" name="CVedu"></textarea> 
											</p>
										</div>
										<div class="yui-u third">
											<button type="button"  class="btn_toogle_Education_area btn btn-info delete"><i class="fas fa-minus"></i></button>
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

