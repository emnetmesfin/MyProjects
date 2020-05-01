<?php
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");

require_once ("controllers/record_controller.php");
require_once ("models/record_model.php");
require_once ("views/patient_history_view.php");

$record_model = new Record();
$history_view  = new PatientHistoryView("templates/patient_history_page.php");
$record_controller = new RecordController($record_model, $history_view);


 ?>
