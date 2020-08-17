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
			<br><br><br><br><br>
			<fieldset>
				<legend>invoice</legend>
				<img src="images/logo.png" alt="LOGO" width="250px" height="150px"/> <h1>Fitness Freak</h1>
				<div class="map">
				<p><?php echo fetchValue("select firstname from customer where customerID='$customerID'","firstname")." ".fetchValue("select lastName from customer where customerID='$customerID'","lastName");  ?></p>
				<p><?php echo fetchValue("select address from customer where customerID='$customerID'","address"); ?></p>
				<p>AU</p>
				<p><?php echo "Order ID:".fetchValue("select saleID from sales where customerID='$customerID' order by saleID DESC limit 1","saleID"); ?></p>
				<p><?php echo "Date:".fetchValue("select saleDate from sales where customerID='$customerID' order by saleID DESC limit 1","saleDate"); ?></p>
				</div>
				<div class="contact">
				<p><?php echo fetchValue("select firstname from customer where customerID='$customerID'","firstname")." ".fetchValue("select lastName from customer where customerID='$customerID'","lastName");  ?></p>
				<p><?php echo fetchValue("select address from customer where customerID='$customerID'","address"); ?></p>
				<p>AU</p>
				</div>
				<table class="table">
					<tr>
						<th>Product</th>
						<th>Quantity</th>
						<th>u/m</th>
						<th>price</th>
					</tr>
					<?php 
					$saleID=fetchValue("select saleID from sales where customerID='$customerID' order by saleID DESC limit 1","saleID"); 
					$getProducts=$db->query("select product.name, product.price from product inner join sales_products on product.productID=sales_products.productID inner join sales on sales.saleID=sales_products.saleID where sales.saleID='$saleID'");
					while ($rows=mysqli_fetch_array($getProducts)){
						$productName=$rows[0];
						$price=$rows[1];
					?>
					<tr>
						<td><?php echo $productName; ?></td>
						<td>1</td>
						<td>Pieces</td>
						<td>$<?php echo $price; ?></td>
					</tr>
					<?php } ?>	
					<tr>
						<td></td>
						<td></td>
						<td>Total</td>
						<td>$<?php fetchValue("select sum(product.price) from product inner join sales_products on product.productID=sales_products.productID inner join sales on sales.saleID=sales_products.saleID where sales.saleID='$saleID'","sum(product.price)") ?></td>
					</tr>	
				</table>
				
			</fieldset>
			<br>
			<input type="submit" class="button" value="proceed to payment"/>
    </div>
	
	<br><br><br><br>
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
