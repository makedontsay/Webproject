<?php
session_start();

	if(isset($_SESSION['username'])){
   	$username = $_SESSION['username'];
  	}else{
    header('Location:login.html');
    exit;
  	}

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
name VARCHAR(500) NULL,
price VARCHAR(60) NOT NULL,
bilpic VARCHAR(400),
buyer VARCHAR(400)
)";

if($conn->query($sql) === TRUE){
	echo "Table $tablename created successfully";
} else {
	echo $conn->error;
}

$name = $_GET["name"];
$price = $_GET["price"];
$buyer = $username;
$sql = "INSERT INTO $tablename (name,price,buyer)
VALUES ('$name','$price','$buyer')";


if($conn->query($sql) === TRUE){
	echo "New record created successfully";
	$last_id = $conn->insert_id;
	$_SESSION['orderid'] = $last_id;
	$_SESSION['order'] = $name;
	$_SESSION['price'] = $price;
	$_SESSION['buyer'] = $buyer;
	header("Location:https://localhost/webfinal/transfer.php");
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	header("Location:https://localhost/webfinal/cart.php");
}




$conn -> close();
?>