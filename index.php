<?php
	if(isset($_GET['page']) || isset($_POST['page'])){
		if(isset($_GET['page'])){
			$page = $_GET['page'];
			$page = "./components/" . $page;
			include('./components/header.php');
			include('$page.php');
			include('./components/footer.php');
		}
		else if(isset($_POST['page'])){
			$page = $_POST['page'];
			$page = "./components/" . $page;
			include('./components/header.php');
			include("$page.php");
			include('./components/footer.php');
		}
	}
	else {
		include('./components/header.php');
		include('./components/home_hero.php');
		include('./components/footer.php');
	}
?>