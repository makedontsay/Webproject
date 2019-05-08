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

//check if Add to Cart button has bbeen submitted
if(filter_input(INPUT_POST,'add_to_cart')){
	if(isset($_SESSION['shopping_cart'])){

		$count = count($_SESSION['shopping_cart']);

		$product_ids = array_column($_SESSION['shopping_cart'],'id');

		if(!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
			$_SESSION['shopping_cart'][$count] = array
			(
				'id' => filter_input(INPUT_GET, 'id'),
				'name' => filter_input(INPUT_POST, 'name'),
				'price' => filter_input(INPUT_POST, 'price'),
				'quantity' => filter_input(INPUT_POST, 'quantity')
			);
		}
		else{
			for($i = 0; $i < count($product_ids); $i++){
				if($product_ids[$i] == filter_input(INPUT_GET, 'id')){
					$_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
				}
			}
		}

	}
	else{
		$_SESSION['shopping_cart'][0] = array
		(
			'id' => filter_input(INPUT_GET, 'id'),
			'name' => filter_input(INPUT_POST, 'name'),
			'price' => filter_input(INPUT_POST, 'price'),
			'quantity' => filter_input(INPUT_POST, 'quantity')
		);
	}
}
if(filter_input(INPUT_GET,'action') == 'delete'){
	foreach ($_SESSION['shopping_cart'] as $key => $product) {
		if($product['id'] == filter_input(INPUT_GET, 'id')){
			unset($_SESSION['shopping_cart'][$key]);
		}
		$_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
	}
}
//pre_r($_SESSION);

function pre_r($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Shopping Cart</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>		
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="css/cart.css"/>

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
  <li><img src=<?php echo "pic/".$imgfile ?> width="50" height="50" alt="profilepic"></li>
  <li class="topic1"><a>market order</a></li>
</ul>
		
		<img class="image1" src="image/homebackgrndimgss.jpg" alt="img">
		<div class="home-welcome-text">
		</div>
		<div class="container">
		<?php

		$connect = mysqli_connect('localhost','firsts','123','cart');
		$query = 'SELECT * FROM products ORDER by id ASC';
		$result = mysqli_query($connect,$query);

		if($result):
			if(mysqli_num_rows($result)>0):
				while ($product = mysqli_fetch_assoc($result)):
					?>
					<div class="con-sm-4 col-md-3">
						<form method="post" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
							<div class="products">
								<img src="<?php echo $product['image']; ?>" class="img-responsive" />
								<h4 class="text-info"><?php echo $product['name']; ?></h4>
								<h4>$ <?php echo $product['price']; ?></h4>
								<input type="text" name="quantity" class="form-control" value="1"/>
								<input type="hidden" name="name" value="<?php  echo $product['name']; ?> "/>
								<input type="hidden" name="price" value="<?php  echo $product['price']; ?> "/>
								<input type="submit" name="add_to_cart" class="btn btn-info"
										value="Add To Cart" />


							</div>
						</form>
					</div>
					<?php
					endwhile;
				endif;
			endif;			
		?>
		<div class="divstyle11"></div>
		<br />
		<div class="table-responsive">
		<table class="table">
			<tr><th colspan="5"><h3>Order Details</h3></th></tr>
		<tr>
			<th width="40%">Product Name</th>
			<th width="10%">Quantity</th>
			<th width="20%">Price</th>
			<th width="15%">Total</th>
			<th width="5%">Action</th>
		</tr>
		<?php $i = 0 ?>
		<?php $j = 1 ?>
		<?php
			if(!empty($_SESSION['shopping_cart'])):

				$total = 0;
		
				foreach ($_SESSION['shopping_cart'] as $key => $product):
		?>
	<form action="addDATA.php" method="get" accept-charset="utf-8">
		<tr>
			<td><?php echo $product['name']; ?></td>
			<td><?php echo $product['quantity']; ?></td>
			<td>$ <?php echo $product['price']; ?></td>
			<td >$ <?php echo number_format($product['quantity'] *  floatval($product['price']),2); ?></td>
			<td>
				<a href="cart.php?action=delete&id=<?php echo $product['id']; ?>">
					<div class="btn-danger">Remove</div>
				</a>
			</td>
		</tr>
				<?php  $dataname[$i] = $product['name'];?>
				<?php  $dataquan[$i] = $product['quantity']; ?>


				<?php $i = $i + 1 ?>
		<?php
				$total = $total + ($product['quantity'] * floatval($product['price']));
			endforeach;
		?>
			<input type="hidden" name="price" value=
				"Price : $ <?php echo $total;?>" 
				class="form-control" placeholder="1" required>
			<?php
			if($i==8):
			?>	
				<input type="hidden" name="name" value=
				"<?php echo $dataname[0]; ?> / Quantity : <?php echo $dataquan[0];?> | <?php echo $dataname[1]; ?> / Quantity : <?php echo $dataquan[1]; ?> | <?php echo $dataname[2]; ?> / Quantity : <?php echo $dataquan[2]; ?> <?php echo $dataname[3]; ?> | / Quantity : <?php echo $dataquan[3]; ?> | <?php echo $dataname[4]; ?> / Quantity : <?php echo $dataquan[4]; ?> | <?php echo $dataname[5]; ?> / Quantity : <?php echo $dataquan[5]; ?> | <?php echo $dataname[6]; ?> / Quantity : <?php echo $dataquan[6]; ?> | <?php echo $dataname[7]; ?> / Quantity : <?php echo $dataquan[7]; ?>" 
				class="form-control" placeholder="1" required>
				<?php $j = $j + 1 ?>
			
			<?php
			endif;
			?>
			<?php
			if($i==7):
			?>	
				<input type="hidden" name="name" value=
				"<?php echo $dataname[0]; ?> / Quantity : <?php echo $dataquan[0];?> | <?php echo $dataname[1]; ?> / Quantity : <?php echo $dataquan[1]; ?> | <?php echo $dataname[2]; ?> / Quantity : <?php echo $dataquan[2]; ?> | <?php echo $dataname[3]; ?> / Quantity : <?php echo $dataquan[3]; ?> | <?php echo $dataname[4]; ?> / Quantity : <?php echo $dataquan[4]; ?> | <?php echo $dataname[5]; ?> / Quantity : <?php echo $dataquan[5]; ?> | <?php echo $dataname[6]; ?> / Quantity : <?php echo $dataquan[6]; ?>" 
				class="form-control" placeholder="1" required>
				<?php $j = $j + 1 ?>
			
			<?php
			endif;
			?>
			<?php
			if($i==6):
			?>	
				<input type="hidden" name="name" value=
				"<?php echo $dataname[0]; ?> / Quantity : <?php echo $dataquan[0];?> | <?php echo $dataname[1]; ?> / Quantity : <?php echo $dataquan[1]; ?> | <?php echo $dataname[2]; ?> / Quantity : <?php echo $dataquan[2]; ?> | <?php echo $dataname[3]; ?> / Quantity : <?php echo $dataquan[3]; ?> | <?php echo $dataname[4]; ?> / Quantity : <?php echo $dataquan[4]; ?> | <?php echo $dataname[5]; ?> / Quantity : <?php echo $dataquan[5]; ?>" 
				class="form-control" placeholder="1" required>
				<?php $j = $j + 1 ?>
			
			<?php
			endif;
			?>
			<?php
			if($i==5):
			?>	
				<input type="hidden" name="name" value=
				"<?php echo $dataname[0]; ?> / Quantity : <?php echo $dataquan[0];?>  | <?php echo $dataname[1]; ?> / Quantity : <?php echo $dataquan[1]; ?>  | <?php echo $dataname[2]; ?> / Quantity : <?php echo $dataquan[2]; ?>  | <?php echo $dataname[3]; ?> / Quantity : <?php echo $dataquan[3]; ?>  | <?php echo $dataname[4]; ?> / Quantity : <?php echo $dataquan[4]; ?>" 
				class="form-control" placeholder="1" required>
				<?php $j = $j + 1 ?>
			
			<?php
			endif;
			?>
			<?php
			if($i==4):
			?>	
				<input type="hidden" name="name" value=
				"<?php echo $dataname[0]; ?> / Quantity : <?php echo $dataquan[0];?> | <?php echo $dataname[1]; ?> / Quantity : <?php echo $dataquan[1]; ?> | <?php echo $dataname[2]; ?> / Quantity : <?php echo $dataquan[2]; ?> | <?php echo $dataname[3]; ?> / Quantity : <?php echo $dataquan[3]; ?>" 
				class="form-control" placeholder="1" required>

			
			<?php
			endif;
			?>
			<?php
			if($i==3):
			?>	
				<input type="hidden" name="name" value=
				"<?php echo $dataname[0]; ?> / Quantity : <?php echo $dataquan[0];?> | <?php echo $dataname[1]; ?> / Quantity : <?php echo $dataquan[1]; ?> | <?php echo $dataname[2]; ?> / Quantity : <?php echo $dataquan[2]; ?>" 
				class="form-control" placeholder="1" required>

			
			<?php
			endif;
			?>
			<?php
			if($i==2):
			?>	
				<input type="hidden" name="name" value=
				"<?php echo $dataname[0]; ?> / Quantity : <?php echo $dataquan[0];?> | <?php echo $dataname[1]; ?> / Quantity : <?php echo $dataquan[1]; ?> " 
				class="form-control" placeholder="1" required>

			
			<?php
			endif;
			?>
			<?php
			if($i==1):
			?>	
				<input type="hidden" name="name" value=
				"<?php echo $dataname[0]; ?> / Quantity : <?php echo $dataquan[0];?>" 
				class="form-control" placeholder="1" required>

			
			<?php
			endif;
			?>

		<tr>
			<td colspan="3" allign="right">Total</td>
			<td name="total" align="right">$ <?php echo number_format($total,2); ?></td>
			<td></td>
		</tr>
		<tr>
			<td colspan="5">
				<?php
					if (isset($_SESSION['shopping_cart'])):
					if (count($_SESSION['shopping_cart']) > 0):
				?>
				
				<button type="submit" name="submit" class="button" >Checkout</button>
		</form>
				<?php endif; endif; ?>
			</td>			
		</tr>
		<?php endif; ?>
		</table>
		</div>
		</div>
	</body>
</html>