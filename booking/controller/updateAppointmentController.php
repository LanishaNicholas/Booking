<?php 
require '../model/updateAppointmentStatusModel.php';

$app_id  = isset($_POST['app_id']) ? $_POST['app_id'] : 0;

$update = updateAppointmentStatus($app_id);

print_r($update);
die();