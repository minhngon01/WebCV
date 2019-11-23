	<div>
	<?php
		$db_handle = new DBController();
		$user = $_SESSION['username'];
		$cv_name = $_GET['cv_name'];

		$sql_query = "SELECT * from CV where user = '$user' and cv_name = '$cv_name'";
		$result = $db_handle->runQuery($sql_query);
		$num_rows = $db_handle->numRows($sql_query);
	?>
	</div>

	<div id="printDiv">
		<div id="doc">
			<div id="inner">
				<div id="hd">
					<div class="yui-gc">
						<div class="yui-u first">
							<?php 
								if($result[0]['img'] != ""){
									echo "<img id=\"CV_image\" src=\"" . $result[0]['img'] . "\" alt=\"CV-image\"/>";
								}
								else{
									echo "<img id=\"CV_image\" src=\"./imageStatic/download.png\" alt=\"CV-image\"/>";
								}
								if($result[0]['name'] != ""){
									echo "<h1>" .  $result[0]['name'] . "</h1>";
								}
								if($result[0]['apply_position'] != ""){
									echo "<h2>" . $result[0]['apply_position'] . "</h2>";
								}
							?>
						</div>
						<div class="yui-u">
							<div class="contact-info">
								<?php
									if($result[0]['website'] != ""){
										echo "<h3>";
										echo 	"<a href=\"mailto:" . $result[0]['website'] . "\">" . $result[0]['website'] . "</a>";
										echo	"<img class=\"small_icon\" src=\"./imageStatic/email.png\" alt=\"email icon\"/>";
										echo "</h3>";
									}
									if($result[0]['contact_number'] != ""){
										echo "<h3>" . $result[0]['contact_number'] . "<img class=\"small_icon\" src=\"./imageStatic/phone.png\" alt=\"phone icon\"/></h3>";
									}
									if($result[0]['address'] != ""){
										echo "<h3>" . $result[0]['address'] . "<img class=\"small_icon\" src=\"./imageStatic/address.png\" alt=\"address icon\"/></h3>";
									}
								?>
							</div>
						</div>
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
									<?php
										if($result[0]['profile'] != ""){
											echo "<p class=\"enlarge\">";
											echo nl2br($result[0]['profile']);
											echo "</p>";
										}
									?>
								</div>
							</div>
							<div class="yui-gf">
								<div class="yui-u first">
									<h2>Skills</h2>
								</div>
								<div class="yui-u">
									<?php
										if($result[0]['skills'] != ""){
											echo "<p class=\"enlarge\">";
											echo nl2br($result[0]['skills']);
											echo "</p>";
										}
									?>
								</div>
							</div>
							<div class="yui-gf">
								<div class="yui-u first">
									<h2>Technical</h2>
								</div>
								<div class="yui-u">
									<?php
										if($result[0]['technical'] != ""){
											echo "<p class=\"enlarge\">";
											echo nl2br($result[0]['technical']);
											echo "</p>";
										}
									?>
								</div>
							</div>
							<div class="yui-gf">
								<div class="yui-u first">
									<h2>Experience</h2>
								</div>
								<div class="yui-u">
									<?php
										if($result[0]['experience'] != ""){
											echo "<p class=\"enlarge\">";
											echo nl2br($result[0]['experience']);
											echo "</p>";
										}
									?>
								</div>
							</div>
							<div class="yui-gf last">
								<div class="yui-u first">
									<h2>Education</h2>
								</div>
								<div class="yui-u">
									<?php
										if($result[0]['education'] != ""){
											echo "<p class=\"enlarge\">";
											echo nl2br($result[0]['education']);
											echo "</p>";
										}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="ft_CV">
					<?php
						echo "<p>" . $result[0]['name'] . "&mdash;" . "<a href=\"mailto:" . $result[0]['website'] . "\">" . $result[0]['website'] . "</a>" . "&mdash;" .  $result[0]['contact_number'] . "</p>";
					?>
				</div>
			</div>
		</div>
	</div>
	<input type="button" class="btn btn-success" value="Print/Download" onclick="printDiv('printDiv')" />