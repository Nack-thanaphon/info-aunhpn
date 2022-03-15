<?php

require_once '../database/connect.php';
date_default_timezone_set("Asia/Bangkok");

function generateRandomString($length = 10)
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}
// Get user enter a new password, confirm password and a token value via $.ajax() method
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$txt_password	= strip_tags($_POST["upassword"]);
	$txt_token = strip_tags($_POST["utoken"]);
	// New password and confirm password value encrypting using password_hash() function
	$salt = generateRandomString(10);
	$newpassword = md5($txt_password . $salt);
	$now = date("Y-m-d H:i:s");
	$update_token = md5(generateRandomString(10) . $now);
	// Apply SQL update query and updating new password 
	$statement = $conn->prepare("UPDATE tbl_user SET user_password =:pwd, salt =:update_salt,token =:update_token WHERE token =:token");

	$result = $statement->execute(
		array(
			":token" => $txt_token,
			":pwd"	=> $newpassword,
			":update_token" => $update_token,
			":update_salt" => $salt
		)
	);
	http_response_code(200);
} else {
	http_response_code(405);
}