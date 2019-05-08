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
<div class="ok">

  <img class="imageza" src="pic/profile.png" alt="img"></div>

        <div class="wow">MARKET ORDER</div>
</div>

<?php
$sql="SELECT id,name,buyer FROM $tablename ";

$result = $conn->query($sql);
?>
<div class="ok2">
<?php
if ($result->num_rows > 0):
    // output data of each row
    while($row = $result->fetch_assoc()):
?>
      
        <div class="wow"><?php echo "Order ID: " . $row["id"]. " - Order: " . $row["name"] . " ||| BY : " . $row["buyer"]. "<hr>"; ?></div>
<?php
endwhile; endif;
$conn->close();
?>
</div>
</div>
</div>


<table class="table table-bordered table-dark col-sm-8">

</table>



</body>
</html>