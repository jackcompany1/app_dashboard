<?php
$servername = "localhost";
$username = "DB_USERNAME";
$password = "DB_PASSWORD";
$dbname = "DB_NAME";
/////////////////////////////////////////////connection .///////////////////////////////////////////
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$serveradd='http://'.$_SERVER['SERVER_NAME'].'/app_dashoard/';

define('DB_USERNAME','DB_USERNAME');
 define('DB_PASSWORD','DB_PASSWORD');
 define('DB_NAME','DB_NAME');
 define('DB_HOST','localhost');