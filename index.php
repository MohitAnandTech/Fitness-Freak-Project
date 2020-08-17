<?php
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['login_customer']) || (trim($_SESSION['login_customer']) == '')) {
   //header("location: admin_login.php");
   //exit();
   $customerID=null;
}else{
$customerID=$_SESSION['login_customer'];
}
require 'includes/connection.php';
require 'includes/methods.php';
?>
<?php 
if(isset($_POST['subscribe'])){
	$email=$_POST['email'];
	$query=$db->query("insert into subscribers VALUES('$email')");
	if($query){
		echo "<script>alert('You have successfully subscribed')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}
}
?>
<?php 
if(isset($_POST['enquire'])){
	$email=$_POST['email'];
	$message=$_POST['message'];
	$query=$db->query("insert into enquiries (email,message) VALUES('$email','$message')");
	if($query){
		echo "<script>alert('Thank you for contacting us..We will get back to you in a moment')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fitness Freak</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="header">
    	<div class="header_container">
            <div class="logo">
            	<img src="images/logo.png" alt="LOGO" width="250px" height="150px"/>
				
            </div>
			 <div class="title">
            <h1>Fitness Freak</h1>
			 </div>
			  <div class="login">
			  <?php if ($customerID==null){ ?>
						<a href="login.php">Login</a> / 
						<a href="register.php">Register</a><br>
			  <?php }else { 
						echo "Welcome ".fetchValue("select firstname from customer where customerID='$customerID'","firstname")." ".fetchValue("select lastName from customer where customerID='$customerID'","lastName"); 
						echo "<br> My Cart <a href='cart.php'><img src='images/social/c.JPG' alt='cart'> ".countValue("select cartID from cart where customerID='$customerID' AND status='pending'","cartID")."</a>";
						echo "<br><a href='logout.php'>Log Out</a>";
					} ?>
			   </div>
					
		</div>
		<div class="menus">
			<div class="menu_container">
                <div id="menucase">
                  <div id="stylefour">
                    <ul>
                      <li><a href="index.php" class="current">Home</a></li>
                      <li><a href="products.php">Products</a></li>
					  <li><a href="aboutus.php">About us</a></li>
					  <li><a href="contactus.php">Contact us</a></li>
                      <li><a href="admin_login.php">Admin</a></li>
                    </ul>
                  </div>
                </div>            
            </div>
		</div>
		
    </div>
    <div class="main">
    	<div class="banner">
        	<img src="images/gym.jpg" height="300px" width="1000px" alt="BANNER"/>        
        </div>
		<br></br>
            <div class="products">
            	<p><h1>Our Products</h1><a href="products.php">view all</a></p>
				<marquee><h3>get 10% off on thus selected products</h3></marquee>
                <hr>
				<?php 
				$getProducts=$db->query("select productID,name,price,image,brand,category from product limit 4");
				while($rows=mysqli_fetch_array($getProducts)){
					$productID=$rows[0];
					$productName=$rows[1];
					$price=$rows[2];
					$image=$rows[3];
					$brand=$rows[4];
					$category=$rows[5];
				
				
				?>
            	<div class="item">
                	<img src="images/products/<?php echo $image; ?>" width="240px" height="200px" alt="PRODUCT" />
                    <p><span class="theme"><?php echo $productName; ?></span></p>
					<p><?php echo "Price: $".$price ?><br>
					<?php echo "Brand: ".$brand ?><br>
					<?php echo "Category: ".$category ?>
					
					</p>
					<a href="add_to_cart.php?productID=<?php echo $productID; ?>">Add to cart</a>
                </div>
				<?php } ?>
				
            </div>
			<hr>
			
			<div class="login2">
			<h1>Subscribe</h1><br><br>
					<form action="" method="post">
						<input type="email" placeholder="Email" name="email"/><br><br>
						<input type="submit" value="Subscribe" name="subscribe">
					</form>
			</div>	
			<div class="login">
			<button onclick="displayEnquire()">Enquiries</button><br>
				<div id="enquiries" style="display:none">
				<h1>Enquire</h1>
				<p>Hi, how can we help you</p>
					<form action="" method="post">
						<input type="email" placeholder="Email" name="email"/><br>
						<textarea name="message"> Message</textarea><br>
						<input type="submit" value="Send message" name="enquire">
					</form>
				</div>
			</div>
    </div>
	<br><br>
    <div class="footer">
    	<div class="footer_container">
        	<p>Fitness freak&copy; 2018 All rights reserved</p> <p>Follow us on social media 
			<a href="#"><img src="images/social/f.jpg" alt="F"></a>
			<a href="#"><img src="images/social/t.jpg" alt="T"></a>
			<a href="#"><img src="images/social/i.jpg" alt="I"></a>
			</p>
        </div>
    </div>
	<script>
	function displayEnquire(){
		document.getElementById("enquiries").style.display="block";
	}
	</script>
</body>
</html>
