<?php 
require '../config/db_config.php';

function checkTheUserExist($username){
	$check = 0;

	$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	
	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT dr_id FROM doctors where dr_username='$username'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$check = 1;
	}else {
  		echo "0 results";
	}

	return $check;

}

function saveRegisterDetails($aRegistrationDetails){


	$insertSql = "INSERT INTO doctors (dr_name,dr_username,dr_password) VALUES ('$aRegistrationDetails[dr_name]','$aRegistrationDetails[dr_username]','$aRegistrationDetails[dr_password]')";

	$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
		
	if(mysqli_query($link, $insertSql)){
		$last_id = mysqli_insert_id($link);
    	echo "Records added successfully.";
	} else{
    	echo "ERROR: Could not able to execute $insertSql. " . mysqli_error($link);
	}
	return $last_id; 
}