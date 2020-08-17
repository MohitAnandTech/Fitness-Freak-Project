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
	$createSale=$db->query("insert into sales (customerID) VALUES ('$customerID')");
	if($createSale){
		$saleID=fetchValue("select saleID from sales where customerID='$customerID' order by saleID desc limit 1","saleID");
		$getCart=$db->query("select productID,cartID from cart where customerID='$customerID' and status='pending'");
		while($rows=mysqli_fetch_array($getCart)){
			$productID=$rows[0];
			$cardID=$rows[1];
			if($db->query("insert into sales_products (saleID, productID, quantity) values ('$saleID','$productID','1')")==false){
				echo mysqli_error($db);
				
			}
			$db->query("update cart set status='processed' where cartID='$cartID'");
		}
		echo "<script>window.open('checkout.php','_self')</script>";
	}else{
		echo mysqli_error($db);
	}

}

?>