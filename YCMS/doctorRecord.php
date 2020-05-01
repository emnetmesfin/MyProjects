<?php
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
require_once ("controllers/record_controller.php");
require_once ("models/record_model.php");
require_once ("views/doctorRecord_view.php");
//session_start();
$main_model = new Record();
$main_view  = new patientRecordView("templates/doctor_record_page.php");
$main_controller = new RecordController($main_model, $main_view);
