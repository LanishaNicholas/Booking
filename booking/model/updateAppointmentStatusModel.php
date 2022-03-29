<?php
require '../config/db_config.php';

function updateAppointmentStatus($appointment_id){
	
	$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$sql = "UPDATE appointment SET app_status=1 WHERE app_id=$appointment_id";
	echo $sql;

	if ($conn->query($sql) === TRUE) {
	  echo "Record updated successfully";
	} else {
	  echo "Error updating record: " . $conn->error;
	}

}