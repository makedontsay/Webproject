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

	<link rel ="stylesheet" href="css/commentstyle.css">
	<title>Comment</title>
</head>
<body>
  <div class="sidenav test">
  <img class="center-block" src="pic\logo.png" width="200" height="200" alt="logoimg">
  <a href="cart.php">Home</a>
  <a href="transfer.php">Transfer</a>
  <a href="comment.php">Rate us</a>
</div>

<ul>
  <li><a href="js/logout.php"> Logout</a></li>
  <li><a>Welcome , <?php echo $username ?></a></li>
  <li><img src="pic\logo.png" width="50" height="50" alt="profilepic"></li>
  <li class="topic1"><a>Rate us</a></li>
</ul>

	<div class="container">
            <div class="row">
                <div class="col-md-8">
                  <div class="page-header">
                    <h1> Comments </h1>
                  </div> 
                   <div class="comments-list">
                       <div class="card mb-3 divstyle1">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="..." class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>
                          </div>
                          <div class="form-group">
  <label for="comment">Comment:</label>
  <textarea class="form-control" rows="5" id="comment"></textarea>
</div>
<button class="btn btn-outline-info" type="submit">Comment</button>
                   </div>
                    
                    
                    
                </div>
            </div>
        </div>

</body>
</html>