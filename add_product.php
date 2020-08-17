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
$adminID=fetchValue("SELECT adminID FROM admin WHERE username='$session_id'","adminID");
?>
<?php
if (isset($_POST['save_button'])){
	$name=$_POST['name'];
	$price=$_POST['price'];
	$quantity=$_POST['quantity'];
	$type=$_POST['type'];
	$category=$_POST['category'];
	$brand=$_POST['brand'];
	$image=$_FILES['image']['name'];
	$image_tmp=$_FILES['image']['tmp_name'];
	move_uploaded_file($image_tmp,"images/products/$image");
	$query=$db->query("insert into product (name, price, quantity, status, category, brand, image,addedBy) VALUES ('$name','$price','$quantity','$type','$category','$brand','$image','$adminID')");
	if ($query==true){
		echo "<script>alert('New Product added successfully')</script>";
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
				<li><a href="logout.php">Log Out</a></li>
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
		<h1>Add a new product</h1><hr>
		  <form action="" method="post" enctype="multipart/form-data">
			<p><input type="text" class="textfield" placeholder="Name of product" name="name" required></p>
			<p><input type="number" class="textfield" placeholder="Price per unit" name="price" required></p>
			<p><input type="number" class="textfield" placeholder="Quantity in stock" name="quantity" required></p>
			<p><label>Type:</label><br>
			<select name="type" class="textfield">
				<option value="normal">Normal Stock</option>
				<option value="clearance">Clearace Stock</option>
				<option value="coming">Coming Stock</option>
			</select>
			</p>
			<p><label>Category:</label><br>
			<select name="category" class="textfield">
				<option value="cardio">Cardio Machines</option>
				<option value="weights">Free Weights</option>
				<option value="strength">Gym Strenght equipment</option>
			</select>
			</p>
			<p><label>Brand:</label><br>
			<select name="brand" class="textfield">
				<option value="precor">Precor</option>
				<option value="star-trac">Star Trac</option>
				<option value="cybex">Cybex International</option>
			</select>
			</p>
			<p><label>Image:</label><br>
			<input type="file" name="image" required class="textfield"/>
			</p>			
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
