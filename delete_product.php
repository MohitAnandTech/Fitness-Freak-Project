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
	$query("DELETE FROM product where productID='$productID'");
	if($query==true){
		echo "<script>alert('Product deleted successfully')</script>";
		echo "<script>window.open('admin_home.php','_self')</script>";
	}else{
		echo mysqli_error($db);
	}
}
?>