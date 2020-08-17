<?php
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['login_user']) || (trim($_SESSION['login_user']) == '')) {
   header("location: admin_login.php");
   exit();
}
$session_id=$_SESSION['login_user'];
require 'includes/connection.php';
require 'includes/methods.php';
?>
<?php
if (isset($_POST['save_button'])){
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=encrypt($_POST['password']);
	$query=$db->query("insert into admin (email, username, password) VALUES ('$email','$username','$password')");
	if ($query==true){
		echo "<script>alert('New admin added successfully')</script>";
		echo "<script>window.open('admin_home.php','_self')</script>";
	}else{
		echo mysqli_error($db);
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
				<a><?php echo "Welcome ".$session_id; ?></a><br>
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
					  <li><a href="logout.php">Log Out</a></li>
                    </ul>
                  </div>
                </div>            
            </div>
		</div>
    </div>
    <div class="main">
		<br><br><br>
		<h1>Add a new admin</h1><hr>
		  <form action="" method="post">
			<p><input type="email" class="textfield" placeholder="Email" name="email" required></p>
			<p><input type="text" class="textfield" placeholder="Username" name="username" required></p>
			<p><input type="password" class="textfield" placeholder="Password" name="password" required></p>
			<p><input type="submit" class="button" Value="Save" name="save_button"></p>
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
