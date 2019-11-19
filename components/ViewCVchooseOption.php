	<?php
		if(empty($_COOKIE['username'])){
			header("location:index.php");	
		}
	?>
	<div>
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="text-danger"><h3>Job seeker</h3></div>
				<a href="?page=ViewCVOption"><img class="view-cv-image-vertical" src="./imageStatic/download.png" alt="cv-for-job-seekers"/></a>
				<h5 class="text-info">
					If you want to review you own CV, click on the image above. 
				</h5>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="text-danger"><h3>Recruiter</h3></div>
				<a href=""><img class="view-cv-image" src="./imageStatic/recruiter.jpg" alt="cv-for-recruiter"/></a>
				<h5 class="text-info">
					If you want to read another CV, click on the image above.
				</h5>
			</div>
		</div>
	</div>