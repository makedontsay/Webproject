<?php
    session_start();
  if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
  }else{
    header('Location:login.html');
    exit;
  }

  if(isset($_SESSION['img'])){
    $imgfile = $_SESSION['img'];
  }
  if(isset($_SESSION['phone'])){
    $phone = $_SESSION['phone'];
  }
  if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
  }

    $username = $_SESSION["username"];

  $servername = "localhost";
	$usname = "jirakun";
	$passw = "123";
	$dbname = "mdt419";
	$tablename = "usertable";
    
    $conn = new mysqli($servername, $usname, $passw,$dbname);
  
    if($conn->connect_error){
	die("Connect failed: " . $conn->connect_error);
	}
	echo "Connected successfully<br>";

  //$username = $_GET["username"];
	$phone = $_GET["phone"];
	$email = $_GET["email"];
  $address = $_GET["address"];

	$sql = "UPDATE $tablename SET phone='$phone',email='$email',address='$address' WHERE username='$username'";

	if($conn->query($sql) === TRUE)
    {
      //$_SESSION['email'] = $row["email"];
    	echo  "Table $tablename created successfully";
    	header("Location:https://localhost/webfinal/information.php");
    }

    $_SESSION['phone'] = $phone;
    $_SESSION['email'] = $email;
    $_SESSION['address'] = $address;
    $conn -> close();
	
?>