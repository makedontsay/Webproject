<?php
// add code here
session_start();

$username = $_GET["username"];
$password = $_GET["password"];

$_SESSION["username"] = $username;

$servername = "localhost";
$username = "jirakun";
$password = "123";
$dbname = "mdt419";
$tablename = "usertable";

$conn = new mysqli($servername,$username,$password,$dbname);

//check
if($conn->connect_error){
	die("Connect failed: " . $conn->connect_error);
}


$username = $_GET["username"];
$password = $_GET["password"];

$sql = "SELECT id,username,password,email,imgname,phone,address FROM $tablename WHERE username='$username'";
$result = $conn->query($sql);

if($result->num_rows > 0){
	$output = array();

	while ($row = $result->fetch_assoc()) {
		if($username == $row["username"] ){

			if($password == $row["password"] ){
			echo "login successfully";

			$_SESSION['img'] = $row["imgname"];
			$_SESSION['phone'] = $row["phone"];
			$_SESSION['email'] = $row["email"];
			$_SESSION['address'] = $row["address"];

			header('Location:../cart.php');
			exit;
			}
			else
			{
			header('Location:https://localhost/webfinal/login.html?error=1');
			exit;
			}
		}

	}
	
}
	else
	{
	header('Location:https://localhost/webfinal/login.html?error=1');
	exit;
	}
?>