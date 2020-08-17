<?php
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['login_customer']) || (trim($_SESSION['login_customer']) == '')) {
   echo "<script>alert('Login to add items to cart')</script>";
   header("location: login.php");
   exit();
   $customerID=null;
}else{
	$customerID=$_SESSION['login_customer'];
	require 'includes/connection.php';
	require 'includes/methods.php';
	if(isset($_GET['productID'])){
		$productID=$_GET['productID'];
		$query=$db->query("insert into cart (customerID, productID, quantity, status) VALUES ('$customerID','$productID','1','pending')");
		if($query){
			echo "<script>alert('Item added to cart succesfully')</script>";
			echo "<script>window.open('products.php','_self')</script>";
		}else{
			echo mysqli_error($db);
		}
	}

}

?>