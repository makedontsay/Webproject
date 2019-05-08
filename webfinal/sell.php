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
  
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <script type="text/javascript" src="js/trade.js"></script>

	<link rel ="stylesheet" href="css/commentstyle.css">
	<title>Comment</title>
</head>
<body>
  <div class="sidenav test">
  <img class="center-block" src="pic\logo.png" width="200" height="200" alt="logoimg">
  <a href="cart.php">Home</a>
  <a href="information.php">Profile</a>
  <a href="mainpage.php">Orders</a>
  <a href="sell.php">Trade</a>
  <a href="comment.php">Rate us</a>
</div>

<ul>
  <li><a href="js/logout.php"> Logout</a></li>
  <li><a>Welcome , <?php echo $username ?></a></li>
  <li><img src= <?php echo "pic/".$imgfile ?> width="50" height="50" alt="propic"></li>
  <li class="topic1"><a>Personal Trades</a></li>
</ul>

	<div class="container">
            <div class="row">
                <div class="col-md-8">
                  <div class="page-header">
                    <h1>Trade Contact information</h1>
                  </div> 
                   <div class="comments-list">
                       <div class="card mb-3 divstyle2">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src= "pic/cart.jpg" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h1 class="card-title trademarket">TRADE MARKET</h1>
        <h5 class="card-title" id="email"><?php echo $email ?></h5>
      </div>
    </div>
  </div>
</div>
                          </div>

                          <div id="feed-container">
                          
                          </div>

                          <div class="form-group" id="posting">
  <label for="comment" class="comment">Submit new offer : </label>
  <textarea name="msg" id="comment" value="" rows="5" cols="50" placeholder="" class="form-control"  ></textarea>
</div>
<button class="btn btn-outline-info" id="postbutton">Post</button>
                   </div>
                    
                    
                    
                </div>
            </div>
        </div>

</body>
</html>