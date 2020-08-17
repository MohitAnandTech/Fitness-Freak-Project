<?php

function fetchValue($sql,$columnName){
	include 'connection.php';
	$value="";
	$fetchQuery=$db->query($sql);
	while ($rows=mysqli_fetch_array($fetchQuery)){
		$value=$rows[$columnName];
	}
	return $value;
}

function countValue($sql,$columnName){
	include 'connection.php';
	$count=0;
	$fetchQuery=$db->query($sql);
	while ($rows=mysqli_fetch_array($fetchQuery)){
		$count=$count+1;
	}
	return $count;
}
function insert ($sql){
	//$insertQuery()
}

function transDate($date){
	$arr=explode("/",$date);
	$month=$arr[0];
	$day=$arr[1];
	$year=$arr[2];
	$newDate=$year.'-'.$month.'-'.$day;
	return $newDate;
}
function dateDiff($startDate,$endDate){
$date=new DateTime($startDate);
$date2=new DateTime($endDate);
$diff=$date2->diff($date)->format("%a");
return $diff;
}

function encrypt($string){
	$key = '64iXjXINnh5wqJlmTQFz';
	$iv = mcrypt_create_iv(
    mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),
    MCRYPT_DEV_URANDOM
	);

	$encrypted = base64_encode(
		$iv .
		mcrypt_encrypt(
			MCRYPT_RIJNDAEL_128,
			hash('sha256', $key, true),
			$string,
			MCRYPT_MODE_CBC,
			$iv
		)
	);
	return $encrypted;
}
function decrypt($encrypted){
	$key = '64iXjXINnh5wqJlmTQFz';
	$data = base64_decode($encrypted);
	$iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));

	$decrypted = rtrim(
		mcrypt_decrypt(
			MCRYPT_RIJNDAEL_128,
			hash('sha256', $key, true),
			substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
			MCRYPT_MODE_CBC,
			$iv
		),
		"\0"
	);
	return $decrypted;
}
