<?php 
require '../config/db_config.php';

function getAppointmentDetails($dr_id){
	$aPatientList = [];

	$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	
	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT patient_details.pt_name,patient_details.pt_gender,patient_details.pt_comment,appointment.app_date,appointment.app_time,appointment.app_status,appointment.app_id FROM patient_details INNER JOIN appointment ON appointment.app_id = patient_details.app_id where appointment.dr_id=$dr_id ORDER BY appointment.app_date Asc";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// $check = 1;
		while($row = $result->fetch_assoc()) {
    		array_push($aPatientList,$row);
  		}
	}

	return $aPatientList;
}