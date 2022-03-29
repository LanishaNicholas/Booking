<?php 
require 'config/db_config.php';

function getDoctorsList(){
	$aDoctorList = [];
	$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	
	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM doctors";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($aDoctorList,$row);
  		}
	}
	return $aDoctorList;
}

