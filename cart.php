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
						echo "<br> My Cart<a href='cart.php'><img src='images/social/c.JPG' alt='cart'>".countValue("select cartID from cart where customerID='$customerID' AND status='pending'","cartID")."</a>";
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
					  <li><a href="aboutus.html">About us</a></li>
					  <li><a href="contactus.php">Contact us</a></li>
                      <li><a href="admin_login.php">Admin</a></li>
                    </ul>
                  </div>
                </div>            
            </div>
		</div>


		
    </div>
    <div class="main">
		<div class="login">
					<form action="search_products.php" method="post">
					<label>Search or filter products</label><br>
						<select name="searchType">
							<option value="name">Name</option>
							<option value="brand">brand</option>
							<option value="category">category</option>
							<option value="type">type</option>
						</select>
						<input type="text" placeholder="Search" name="search_field"/><input type="submit" value="Search" name="search_button">
					</form>
			</div>
	
		<br></br>
        <div class="content">
            <div class="products">
            	<p><h1>My Cart</h1></p>	
		
                <hr>
				<?php 
				$getProducts=$db->query("select product.productID,product.name,product.price,product.image,product.brand,product.category from product inner join cart on cart.productID=product.productID inner join customer on customer.customerID=cart.customerID where cart.customerID='$customerID' AND cart.status='pending'");
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
                </div>
				<?php } ?>
				
            </div><p><a href="process_checkout.php">Check out</a></p>
        </div>
    </div>
    <div class="footer">
    	<div class="footer_container">
        	<p>Fitness freak&copy; 2018 All rights reserved</p> <p>Follow us on social media 
			<a href="#"><img src="images/social/f.jpg" alt="F"></a>
			<a href="#"><img src="images/social/t.jpg" alt="T"></a>
			<a href="#"><img src="images/social/i.jpg" alt="I"></a>
			</p>
        </div>
    </div>
</body>
</html>
