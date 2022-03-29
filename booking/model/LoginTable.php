<?php 
require '../config/db_config.php';


function checkTheDetails($aLoginDetails){

	$regId = 0;

	$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	
	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT dr_id FROM doctors where dr_username='$aLoginDetails[username]' AND dr_password = '$aLoginDetails[password]'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// $check = 1;
		while($row = $result->fetch_assoc()) {
    		$regId = $row["dr_id"];
  		}
	}

	return $regId;

}

function insertLoginDetails($regId){
	$last_id = 0;
	$date = date('Y-m-d H:i:s');

	$conn    = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	
	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
	}
	$sql     = "INSERT INTO login_details (reg_id,login_date) VALUES ('$regId', CURRENT_TIMESTAMP)";

	if ($conn->query($sql) === TRUE) {
		$last_id = $conn->insert_id;
  		// echo "New record created successfully";
	} else {
  		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	return $last_id;

}