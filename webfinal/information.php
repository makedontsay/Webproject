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

	<link rel ="stylesheet" href="css/informationstyle.css">
	<title>Information</title>
</head>
<body>
	<div class="sidenav test">
	<img class="center-block" src="pic\logo.png" width="200" height="200" alt="logoimg">
  <a href="cart.php">Main Page</a>
  <a href="transfer.php">Profiles</a>
</div>

<ul>
  <li><a href="js/logout.php"> Logout</a></li>
  <li><a>Welcome , <?php echo $username ?></a></li>
  <li><img src="pic\logo.png" width="50" height="50" alt="profilepic"></li>
  <li class="topic1"><a>Profile</a></li>
</ul>

<div class="modal-dialog text-center">
      <div class="col-sm-9 main-section">
        <div class="modal-content">

          <div class="col-12 user-img">
            <img src="css/img/logo.png">
            <div class="signinup">Change Your Profile</div>
          </div>

          <div class="col-12 form-input">
            <form action="js/checkDB.php" method="get" accept-charset="utf-8">
              <div class="form-group">
              <div class="custom-file">
  <input type="file" class="custom-file-input" id="customFile">
  <label class="custom-file-label" for="customFile">Your New Profile Picture</label>
</div>
</div>
              <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Add Phone Number" required>
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Add Address" required>
              </div>
              <span id="errordisplay"></span><br>
              <input type="submit" name="submit" value="Submit" class="btn btn-success button1"></input>
          </div>

        </div>
      </div>
    </div>

</body>
</html>