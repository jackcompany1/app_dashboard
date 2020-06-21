<?php
//session_start();
$servername = "localhost";
$username = "DB_USERNAME";
$password = "DB_PASSWORD";
$dbname = "DB_NAME";
/////////////////////////////////////////////connection .///////////////////////////////////////////
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$serveradd='http://'.$_SERVER['SERVER_NAME'].'/app_dashboard/';
$defimg=$serveradd.'uploads/default-image/defaultimage.png';
class DBController {
	private $host = "localhost";
	private $user = "DB_USERNAME";
	private $password = "DB_PASSWORD";
	private $database = "DB_NAME";
	private $conn1;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn1 = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn1;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>