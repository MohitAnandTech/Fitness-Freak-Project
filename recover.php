<?php
if(isset($_POST['send'])){
	$email=$_POST['email'];
	$subject = 'FITNESSS FREAK PASSWORD RESET';
	$message2 = "You password reset code is: 19283745";
	$headers = 'From: noreply@fitenessfreak.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	mail($email, $subject, $message, $headers);
}
?>
<?php 
	if(isset($_POST['reset'])){
		$code=$_POST['code'];
		$password=$_POST['password'];
		$email=$_POST['email2'];
		if($code!="19283745"){
			echo "<script>alert('Invalid code')</script>";
			echo "<script>window.open('recover.php')</script>";
		}else{
			require 'includes/connection.php';
			$update=$db->query("update customer set password='$password' where email='$email'");
			if($update==true){
				echo "<script>alert('Password recovered successfully')</script>";
				echo "<script>window.open('login.php')</script>";
			}else{
				echo "<script>alert('Invalid email')</script>";
				echo "<script>window.open('recover.php')</script>";
			}
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
				<a href="login.html">Login</a> / 
				<a href="register.html">Register</a>
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
		<h1>Recover password</h1><hr>
			<form action="" method="post">
			<p><input type="email" class="textfield" name="email" placeholder="Email you want to receive link" required></p>
			<p><input type="submit" class="button" name="send" value="Send Recovery link">
			</form>
			<p>Enter your new password</p>
			<form method="post" action="">
			<p><input type="email" class="textfield" name="email2" placeholder="Registered email" required></p>
			<p><input type="number" class="textfield" placeholder="Enter recovery Code" name="code" required></p>
			<p><input type="password" class="textfield" placeholder="Enter new Password" name="password" required></p>
			<p><input type="submit" class="button" name="reset" value="Reset"></p>
			</form>
		
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
