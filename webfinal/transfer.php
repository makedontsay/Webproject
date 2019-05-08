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
  
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<link rel ="stylesheet" href="css/transferstyle.css">
	<title>Transfer</title>
</head>
<body>
	<div class="sidenav test">
	<img class="center-block" src="pic\logo.png" width="200" height="200" alt="logoimg">
  <a href="cart.php">Main Page</a>
  <a href="transfer.php">Transfer</a>
</div>

<ul>
  <li><a href="js/logout.php"> Logout</a></li>
  <li><a>Welcome , <?php echo $username ?></a></li>
  <li><img src="pic\logo.png" width="50" height="50" alt="profilepic"></li>
  <li class="topic1"><a>Transfer</a></li>
</ul>
<div class="headerimg">
<img src="pic\bank.png">
</div>

<div class="login-form">
    <form action="/examples/actions/confirmation.php" method="post">
    <label class="my-1 mr-2 ID1">ID: <label class="my-1 mr-2"> <?php echo $username ?></label></label>      
    <div class="pricetag">
    <label class="my-1 mr-2 price1">Price : </label><label class="my-1 mr-2 price1">Price</label>
    </div>     
<div class="custom-file">
  <input type="file" class="custom-file-input" id="customFile">
  <label class="custom-file-label" for="customFile">Your bill picture</label>
</div>
        
  <div class="custom-control custom-checkbox my-1 mr-sm-2">
    <input type="checkbox" class="custom-control-input" id="customControlInline">
  </div>
  <button type="submit" class="btn btn-outline-info">Submit</button>
</div>

</body>
</html>