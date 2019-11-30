<?php
	class DBController {
		private $host = "localhost";
		private $user = "root";
		private $password = "root";
		private $database = "assignment";
		private $conn;
		
		function __construct() {
			$this->conn = $this->connectDB();
		}
		
		function connectDB() {
			$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
			return $conn;
		}
		
		function runQuery($query) {
			$result = mysqli_query($this->conn,$query);
			while($row=mysqli_fetch_assoc($result)) {
				$resultset[] = $row;
			}		
			if(!empty($resultset))
				return $resultset;
		}
		
		function runInsertQuery($query){
			return mysqli_query($this->conn,$query);
		}

		function numRows($query) {
			$result  = mysqli_query($this->conn,$query);
			$rowcount = mysqli_num_rows($result);
			return $rowcount;	
		}
	}

	class Cookies{
		private $session_expired_time = 900;
		private $cookies_expired_time = 86400 * 30; // 1 month

		function get_session_time(){
			return $this->session_expired_time;
		}

		function get_cookies_time(){
			return $this->cookies_expired_time;
		}
	}
?>