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
  


$username = $_SESSION["username"];

  $servername = "localhost";
  $usname = "jirakun";
  $passw = "123";
  $dbname = "cart";
  $tablename = "wdata";

  $conn = new mysqli($servername, $usname, $passw,$dbname);


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<link rel ="stylesheet" href="css/mainstyle.css">
	<title></title>
</head>
<body>
	<div class="sidenav test">
	<img class="center-block" src="pic\logo.png" width="200" height="200" alt="logoimg">
  <a href="cart.php">Home</a>
  <a href="information.php">Profile</a>
  <a href="mainpage.php">Orders</a>
  <a href="comment.php">Rate us</a>
</div>

<ul>
  <li><a href="js/logout.php"> Logout</a></li>
  <li><a>Welcome , <?php echo $username ?> </a></li>
  <li><img src= <?php echo "pic/".$imgfile ?> width="50" height="50" alt="profilepic"></li>
  <li class="topic1"><a>market order</a></li>
</ul>

<table class="table table-bordered table-dark col-sm-8">
  <thead>
    <tr>
      <th scope="col">ตารางเหี้ย</th>
      <th scope="col">ใช้ไม่เป็นโว้ย</th>
      <th scope="col">Order ทั้งหมดจาก DB อยู่ใต้ตาราง</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry the Bird</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td colspan="1">Larry the Birdasdasdasdasdasdasdasdasdasdasdasdasdasd</td>
      <td colspan="2">yoasdasdadawdqawdadsasdqwda dasfsfdesfage rgdrs</td>
    </tr>
  </tbody>
</table>


<?php


$sql="SELECT id,name,buyer FROM $tablename ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Order ID: " . $row["id"]. " - Order: " . $row["name"] . "by " . $row["buyer"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>


</body>
</html>