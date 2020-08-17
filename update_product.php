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
if (isset($_GET['productID'])){
	$productID=$_GET['productID'];
}
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
	if(!empty($image)){
		$image_tmp=$_FILES['image']['tmp_name'];
		move_uploaded_file($image_tmp,"images/products/$image");
		$query=$db->query("UPDATE product set name='$name', price='$price', quantity='$quantity', status='$type', category='$category', brand='$brand', image='$image' WHERE productID='$productID'");
	}else{
		$query=$db->query("UPDATE product set name='$name', price='$price', quantity='$quantity', status='$type', category='$category', brand='$brand' WHERE productID='$productID'");
	}
	if ($query==true){
		echo "<script>alert('Product updated successfully')</script>";
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
				<a><?php echo "Welcome ".$session_id; ?></a>
			</div>
        </div>
		<div class="menus">
			<div class="menu_container">
                <div id="menucase">
                  <div id="stylefour">
                    <ul>
                      <li><a href="admin_home.php" class="current">Home</a></li>
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
		<h1>Update product</h1><hr>
		  <form action="" method="post" enctype="multipart/form-data">
			<p><input type="text" class="textfield" placeholder="Name of product" name="name" required value="<?php echo fetchValue("select name from product where productID='$productID'","name"); ?>"></p>
			<p><input type="text" class="textfield" placeholder="Price per unit" name="price" required  value="<?php echo fetchValue("select price from product where productID='$productID'","price"); ?>"></p>
			<p><input type="text" class="textfield" placeholder="Quantity in stock" name="quantity" required  value="<?php echo fetchValue("select quantity from product where productID='$productID'","quantity"); ?>"></p>
			<p><label>Type:</label><br>
			<select name="type" class="textfield">
				<option value="normal" <?php if(fetchValue("select status from product where productID='$productID'","status")=="normal"){echo "selected";} ?>>Normal Stock</option>
				<option value="clearance" <?php if(fetchValue("select status from product where productID='$productID'","status")=="clearance"){echo "selected";} ?>>Clearace Stock</option>
				<option value="coming"  <?php if(fetchValue("select status from product where productID='$productID'","status")=="coming"){echo "selected";} ?>>Coming Stock</option>
			</select>
			</p>
			<p><label>Category:</label><br>
			<select name="category" class="textfield">
				<option value="cardio" <?php if(fetchValue("select category from product where productID='$productID'","category")=="cardio"){echo "selected";} ?>>Cardio Machines</option>
				<option value="weights" <?php if(fetchValue("select category from product where productID='$productID'","category")=="weights"){echo "selected";} ?>>Free Weights</option>
				<option value="strength"  <?php if(fetchValue("select category from product where productID='$productID'","category")=="strength"){echo "selected";} ?>>Gym Strenght equipment</option>
			</select>
			</p>
			<p><label>Brand:</label><br>
			<select name="brand" class="textfield">
				<option value="precor" <?php if(fetchValue("select brand from product where productID='$productID'","brand")=="precor"){echo "selected";} ?>>Precor</option>
				<option value="star-trac" <?php if(fetchValue("select brand from product where productID='$productID'","brand")=="star-prac"){echo "selected";} ?>>Star Trac</option>
				<option value="cybex"  <?php if(fetchValue("select brand from product where productID='$productID'","brand")=="cybex"){echo "selected";} ?>>Cybex International</option>
			</select>
			</p>
			<p><label>Image:(ignore this field to retain the current image)</label><br>
			<input type="file" name="image" class="textfield"/>
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
