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
  if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
  }
  if(isset($_SESSION['phone'])){
    $phone = $_SESSION['phone'];
  }
  if(isset($_SESSION['address'])){
    $address = $_SESSION['address'];
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
  <script type="text/javascript" src="js/infoJS.js"></script>

	<title>Information</title>
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
  <li class="topic1"><a>Profile</a></li>
</ul>

<div class="modal-dialog text-center">
      <div class="col-sm-9 main-section">
        <div class="modal-content">

          <div class="col-12 user-img">
            <img src=<?php echo "pic/".$imgfile ?>>
            <div class="signinup">Change your cover photo</div>
          </div>

          <div class="col-12 form-input">

          <form action="js/uploadPic.php" method="post" id="formId" enctype="multipart/form-data">
          <input type="file" id="fileField" name="fileToUpload" value="fileToUpload" placeholder="">
          <button type="submit" name="submit" value="Upload" class="btn btn-success button1">Upload</button>
          </form>

          <form action="js/addInfo.php" method="get" accept-charset="utf-8">

              <div class="form-group" id="info1">
                <h2><?php echo $username ?>'s information:</h2><br>
                <h4>Phone number : <?php echo $phone ?></h4><br>
                <h4>Email : <?php echo $email ?></h4><br>
                <h4>Delivery Address : <?php echo $address ?></h4><br><br>

                <input type="text" name="phone" value="" class="form-control" placeholder="Enter new phone number">
              </div>

              <div class="form-group">
                <input type="text" name="email" value="" class="form-control" placeholder="Enter new email" required="">
              </div>

              <div class="form-group">
                <input type="text" name="address" value="" class="form-control" placeholder="Enter new delivery address" required="">
              </div>

              <button type="submit" name="submit" value="Submit" class="btn btn-success button1">Submit</button>
          </form><br>
          </div>

        </div>
      </div>
    </div>

</body>
</html>