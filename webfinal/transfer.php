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
  if(isset($_SESSION['price'])){
    $price = $_SESSION['price'];
  }
  if(isset($_SESSION['order'])){
    $order = $_SESSION['order'];
  }
  if(isset($_SESSION['orderid'])){
    $orderid = $_SESSION['orderid'];
  }

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<link rel ="stylesheet" href="css/transferstyle.css">
  <script type="text/javascript" src="js/bilJS.js"></script>

	<title>Transfer</title>
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
  <li><a>Welcome , <?php echo $username ?></a></li>
  <li><img src= <?php echo "pic/".$imgfile ?> width="50" height="50" alt="propic"></li>
  <li class="topic1"><a>Transfer</a></li>
</ul>

<div class="login-form">
    <form action="js/uploadBil.php" method="post" id="formId" enctype="multipart/form-data">       


  <div class="custom-control custom-checkbox my-1 mr-sm-2">
    <input type="checkbox" class="custom-control-input" id="customControlInline">
  </div>
  <div class="form-group">
    <label class="my-1 mr-2" for="formGroupExampleInput">Order Number: </label>
    <a><?php echo $orderid ?><a><br>
    <label class="my-1 mr-2" for="formGroupExampleInput">Order Detail: </label><br>
    <a><?php echo $order ?><a><br>
    <label class="my-1 mr-2" for="formGroupExampleInput">Total: </label>
    <a><?php echo $price ?><a>
  </div>
          
          <input type="file" id="fileField" name="fileToUpload" value="fileToUpload" placeholder="">
          <button type="submit" name="submit" value="Upload" class="btn btn-success button1">Upload</button>
          </form>
</div>

</body>
</html>