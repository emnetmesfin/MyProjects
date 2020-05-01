<?php

//session_start();
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
require_once ("controllers/result_controller.php");
require_once ("models/labResult_model.php");
require_once ("models/labexam_model.php");
require_once ("views/doc_result_view.php");


$result_model = new LabResult();
$exam_model=new LabExam();
$doctor_result_view  = new DoctorResultView("templates/doctor_results_page.php");
$result_controller = new ResultController($result_model,$exam_model, $doctor_result_view);

// header("Location: ./docResult.php");






 ?>
