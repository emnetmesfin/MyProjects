<?php

header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");

//session_start();
require_once ("controllers/addrecord_controller.php");
require_once ("models/record_model.php");
require_once ("views/doctor_addresult_view.php");


$record_model = new Record();
$doctor_addrecord_view  = new DoctorAddRecordView("templates/doctor_addresult_page.php");
$record_controller = new AddRecordController($record_model,$doctor_addrecord_view);








 ?>
