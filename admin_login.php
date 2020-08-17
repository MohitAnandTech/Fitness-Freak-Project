<?php
session_start(); 
	require 'includes/connection.php';
	require 'includes/methods.php';
	if(isset($_POST['loginButton'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$username=stripslashes($username);
		$password=stripslashes($password);
		$countUser=countValue("SELECT username FROM admin WHERE username='$username' and password='$password'","username");
		if($countUser==1){
			$_SESSION['login_user']=$username; // Initializing Session
			echo"<script>window.open('admin_home.php','_self')</script>"; // Redirecting To Other Page	
		}else{
			echo "<script>alert('Invalid login credentials')</script>";
			//echo"<script>window.open('admin_login.php','_self')</script>"; // Redirecting To Other Page
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
</script>
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
			<h2>Admin Dashboard</h2>
			</div>
			<div class="login">
				<a>Welcome to the admin dashboard</a><br>
				<a href="index.php">Go back to main website</a>
			</div>
        </div>
		<div class="menus">
			<div class="menu_container">
                <div id="menucase">
                  <div id="stylefour">
                    <ul>
                      <li><a href="admin_home.php" class="current">Home</a></li>
					  <li><a href="admin_home.php">Manage Products</a></li>
					  <li><a href="add_product.php">Add Product</a></li>
					  <li><a href="add_admin.php">Add Admin</a></li>
                    </ul>
                  </div>
                </div>            
            </div>
		</div>
    </div>
    <div class="main">
		<div class="login">
						
		</div>
		<br><br><br>
		<h1>Administrator Login</h1><hr>
		  <form action="" method="post">
			<p><input type="text" class="textfield" placeholder="Username" name="username" required></p>
			<p><input type="password" class="textfield" placeholder="Password" name="password" required></p>
			<p><input type="submit" class="button" Value="Login" name="loginButton"></p>
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
