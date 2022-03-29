<?php 

require '../config/db_config.php';


function getAppointmentDetails($date,$dr_id){
	// $aAppointmentList = [];
	$appTime = 0;
	$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	
	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
	}

	$booking_date=date_create($date);
	$bDate =  date_format($booking_date,"Y/m/d H:i:s");

	$sql = "SELECT app_time FROM appointment WHERE dr_id=$dr_id AND app_date='$bDate' AND app_status=0";
	// echo $sql;
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$appTime = $row['app_time'];
  		}
	}
	return $appTime;
}

function saveAppointmentDetails($aAppointMentDetails){
	$last_id = 0;
	$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	
	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO appointment (dr_id, app_date, app_time, app_status) VALUES ($aAppointMentDetails[dr_id],'$aAppointMentDetails[app_date]',$aAppointMentDetails[app_time],$aAppointMentDetails[app_status])";

	if ($conn->query($sql) === TRUE) {
		$last_id = $conn->insert_id;
  		// echo "New record created successfully";
	} else {
  		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	return $last_id;
}

function savePatientDetails($aPatientDetails){
	$last_id = 0;
	$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	
	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO patient_details (app_id, pt_name, pt_gender, pt_phonenumber,pt_comment) VALUES ($aPatientDetails[app_id],'$aPatientDetails[pt_name]',$aPatientDetails[pt_gender],'$aPatientDetails[pt_phonenumber]','$aPatientDetails[pt_comment]')";

	if ($conn->query($sql) === TRUE) {
		$last_id = $conn->insert_id;
  		// echo "New record created successfully";
	} else {
  		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	return $last_id;
}