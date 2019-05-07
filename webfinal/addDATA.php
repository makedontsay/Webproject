<?php
session_start();
// add code here
$servername = "localhost";
$usname = "firsts";
$passw = "123";
$dbname = "cart";
$tablename = "wdata";

//create connection
$conn = new mysqli($servername,$usname,$passw,$dbname);

if(isset($_SESSION['shopping_cart'])){
		$shopping = $_SESSION['shopping_cart'];
}

//check
if($conn->connect_error){
	die("Connect failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

//sql table
$sql = "CREATE TABLE $tablename(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(500) NULL
)";

print_r($_SESSION['shopping_cart']);
if($conn->query($sql) === TRUE){
	echo "Table $tablename created successfully";
} else {
	echo $conn->error;
}

$name = $_GET["name"];

$sql = "INSERT INTO $tablename (name)
VALUES ('$name')";

if($conn->query($sql) === TRUE){
	echo "New record created successfully";
	header("Location:https://localhost/webfinal/transfer.php");
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	//header("Location:https://localhost/webfinal/cart.php");
}


$conn -> close();
?>