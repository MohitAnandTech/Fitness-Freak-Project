<?php
session_start(); 
	require 'includes/connection.php';
	require 'includes/methods.php';
	if(isset($_POST['loginButton'])){
		$email=$_POST['email'];
		$password=$_POST['password'];
		$email=stripslashes($email);
		$password=stripslashes($password);
		$countUser=countValue("SELECT email FROM customer WHERE email='$email' AND password='$password'","email");
		if($countUser==1){
			$_SESSION['login_customer']=fetchValue("select customerID from customer where email='$email'","customerID"); // Initializing Session
			echo"<script>window.open('index.php','_self')</script>"; // Redirecting To Other Page	
		}else{
			echo "<script>alert('Invalid login credentials')</script>";
			echo"<script>window.open('login.php','_self')</script>"; // Redirecting To Other Page
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
		
		<br><br><br>
		<h1>Login</h1><hr>
		<form action="" method="post">
			<p><input type="text" class="textfield" placeholder="Email" name="email"></p>
			<p><input type="password" class="textfield" placeholder="Password" name="password"></p>
			<p><input type="submit" class="button" placeholder="Login" name="loginButton"> </form> <a href="register.php">Dont have an account?..Register</a></p>
			<p><a href="recover.php">Forgot password?</a></p>
		
    </div>
	</br></br>
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
