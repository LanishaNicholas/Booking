<?php 

require '../model/LoginTable.php';

$username 				= isset($_POST['username']) ? $_POST['username'] : ""; 
$password 				= isset($_POST['password']) ? $_POST['password'] : ""; 

$aLoginDetails          = array(
	'username'          => $username,
	'password'          => $password 
);

$regId        = checkTheDetails($aLoginDetails);
/*if($regId != 0)
	$insertLoginDetails = insertLoginDetails($regId); */

print_r($regId);
die();

