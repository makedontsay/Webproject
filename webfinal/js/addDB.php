<?php
// add code here
$servername = "localhost";
$usname = "jirakun";
$passw = "123";
$dbname = "mdt419";
$tablename = "usertable";

//create connection
$conn = new mysqli($servername,$usname,$passw,$dbname);

//check
if($conn->connect_error){
	die("Connect failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

//sql table
$sql = "CREATE TABLE $tablename(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(60) NOT NULL UNIQUE,
password VARCHAR(40) NOT NULL,
email VARCHAR(50),
address VARCHAR(120),
phone VARCHAR(12),
imgname VARCHAR(60),
reg_date TIMESTAMP
)";

if($conn->query($sql) === TRUE){
	echo "Table $tablename created successfully";
} else {
	echo $conn->error;
}

$username = $_GET["username"];
$email = $_GET["email"];
$password = $_GET["password"];



$sql = "INSERT INTO $tablename (username,email,password)
VALUES ('$username','$email','$password')";

if($conn->query($sql) === TRUE){
	echo "New record created successfully";
	header("Location:https://localhost/webfinal/login.html");
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	header("Location:https://localhost/webfinal/register.html");
}


$conn -> close();
?>