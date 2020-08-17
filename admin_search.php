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
require 'includes/validation.php';
?>

<?php
if(isset($_POST['search_button'])){
	$search_type=validate($_POST['searchType']);
	$search_value=validate($_POST['search_field']);
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
					  <li><a href="add_product.php">Add Product</a></li>
                      <li><a href="enquiries.php">Enquiries</a></li>
                      <li><a href="sales.php">Sales</a></li>
					  <li><a href="add_admin.php">Add Admin</a></li>
					  <li><a href="logout.php">Log Out</a></li>
                    </ul>
                  </div>
                </div>            
            </div>
		</div>
    </div>
    <div class="main">
			<div class="login">
					<form>
						<select name="searchType">
							<option value="name">Name</option>
							<option value="brand">brand</option>
							<option value="category">category</option>
							<option value="type">type</option>
						</select>
						<input type="text" placeholder="Search" name="search_field"/><input type="submit" value="Search" name="search_button">
					</form>
			</div>
			</br><br>
            <div class="products">
            	<p><h1>Stock</h1></p>
				
                <hr>
            	<table class="table">
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Brand</th>
						<th>Category</th>
						<th>Type</th>
						<th>Price $</th>
						<th>Quantity in Stock</th>
						<th>Image</th>
						<th>Update</th>
						<th>Delete</th>
					</tr>
					<?php
					$count=countValue("select productID  from product where $search_type='$search_value'","productID");
					if($count>0){
					$query=$db->query("select *  from product where $search_type LIKE '%$search_value%'");
					while($rows=mysqli_fetch_array($query)){
						$productID=$rows[0];
						$name=$rows[1];
						$price=$rows[2];
						$quantity=$rows[3];
						$status=$rows[4];
						$category=$rows[5];
						$brand=$rows[6];
						$image=$rows[7];
					?>
					<tr>
						<td><?php echo $productID; ?></td>
						<td><?php echo $name; ?></td>
						<td><?php echo $brand; ?></td>
						<td><?php echo $category; ?></td>
						<td><?php echo $status; ?></td>
						<td><?php echo $price; ?></td>
						<td><?php echo $quantity; ?></td>
						<td><img src="images/products/<?php echo $image; ?>" alt="img" height="50px" width="50px"></td>
						<td><a href="update_product.php?productID=<?php echo $productID; ?>">Update</a></td>
						<td><a href="delete_product.php?productID=<?php echo $productID; ?>" onclick="return confirm ('Are you sure you want to delete this product. This action cannot be undone');">Delete</a></td>
					</tr>
					<?php } ?>
				</table>
				<?php
					}else{
						echo "No products found";
					}
				?>
            </div>
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
