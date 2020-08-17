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
				<a href="login.php">Login</a> / 
				<a href="register.php">Register</a><br>
				<?php echo "Welcome ".fetchValue("select firstname from customer where customerID='$customerID'","firstname")." ".fetchValue("select lastName from customer where customerID='$customerID'","lastName"); ?>
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
        <div class="content">
           <h1>Fitness Freak</h1>
		   <p>Fitness Freak is a gym equipment online shop where you can get the best gym equipments in the market at the best price possible. We have built a brand in qualtiy and consistency to make sure that our customers get the best products in the market. We ensure that all our products are produced following the standard guidelines by our suppliers. The customer is assured quality products at all times</p>
			<p>Our e-commerce platform allows our customers to create an account where they can save their details. We have implemented alot of security mechanisms to make sure our customers data is protected at all times. Once the customer is registered they can easily add items to their cart. The cart is designed to hold the items even of the customer logs out of their account. On the next login session, the customers is asured to get the items. Checking out is simplified to make it easy make the checkout process easy and convenient for the user.</p>
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
