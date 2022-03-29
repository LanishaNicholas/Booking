<?php
require '../model/RegistrationTable.php';


$name 				    = isset($_POST['name']) ? $_POST['name'] : ""; 
$username 				= isset($_POST['username']) ? $_POST['username'] : ""; 
$password 				= isset($_POST['password']) ? $_POST['password'] : ""; 

$aRegistrationDetails   = array(
	'dr_name'              => $name,
	'dr_username'          => $username,
	'dr_password'          => $password
);

/* Check the user already exist or not*/
$checkTheUserExist        = checkTheUserExist($username);

if($checkTheUserExist == 0){
	$saveRegisterDetails    = saveRegisterDetails($aRegistrationDetails);
}else{
	$saveRegisterDetails    = "exist";
}

print_r($saveRegisterDetails);
die();