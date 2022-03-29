<?php 
require '../model/checkAppointmentModel.php';

$patient_name      = isset($_POST['patient_name']) ? $_POST['patient_name'] : "";
$dr_id     		   = isset($_POST['dr_id']) ? $_POST['dr_id'] : 0;
$booking_date      = isset($_POST['booking_date']) ? $_POST['booking_date'] : "";
$timeSlot      	   = isset($_POST['timeSlot']) ? $_POST['timeSlot'] : "";
$gender      	   = isset($_POST['gender']) ? $_POST['gender'] : 0;
$phone_number      = isset($_POST['phone_number']) ? $_POST['phone_number'] : 0;
$comment           = isset($_POST['comment']) ? $_POST['comment'] : "";

$date=date_create($booking_date);
$bDate =  date_format($date,"Y/m/d H:i:s");

$aAppointMentDetails = array(
		'dr_id'      => $dr_id ,
		'app_date'   => $bDate,
		'app_time'   => $timeSlot,
		'app_status' => 0
	);

$app_id = saveAppointmentDetails($aAppointMentDetails);
if($app_id != 0){
	$aPatientDetails = array(
			'app_id' => $app_id,
			'pt_name' => $patient_name,
			'pt_gender' => $gender,
			'pt_phonenumber' => $phone_number,
			'pt_comment' => $comment
	);
	$pt_id = savePatientDetails($aPatientDetails);
}


print_r($pt_id);
die();
