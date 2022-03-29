<?php 
require '../model/checkAppointmentModel.php';

$date      = isset($_POST['date']) ? $_POST['date'] : 0;
$dr_id     = isset($_POST['dr_id']) ? $_POST['dr_id'] : 0;

$appointmentDetails  = getAppointmentDetails($date,$dr_id);

print_r($appointmentDetails);
die();