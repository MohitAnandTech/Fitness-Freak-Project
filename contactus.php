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
        	<div class="map">
            	<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:300px;width:500px;'><div id='gmap_canvas' style='height:300px;width:500px;'></div><div><small><a href="http://embedgooglemaps.com">Click here to generate your map!</a></small></div><div><small><a href="http://www.genkigirl.net/">website visitors</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(-33.86767051887184,151.21005724736028),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-33.86767051887184,151.21005724736028)});infowindow = new google.maps.InfoWindow({content:'<strong>Fitness freak</strong><br> australia<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
            </div>    
            <div class="contact">
            	<p><h2>Reach us through</h2></p>
                <p><span class="theme_text">Email: </span>info@fitnessfreak.com</p>
                <p><span class="theme_text">Website:</span> www.fitnessfreak.com</p>
                <p><span class="theme_text">Phone: </span>+34567543</p>
                <p><span class="theme_text">Address: </span>19th avenue street</p>
            </div> >
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
