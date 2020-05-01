<?php
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
require_once ("controllers/labExamController.php");
require_once ("models/labexam_model.php");
require_once ("views/doctor_order_exam_view.php");
session_start();
$main_model = new LabExam();
$main_view  = new doctorOrderExamView("templates/doctor_order_exam_page.php");
$main_controller = new labExamController($main_model, $main_view);
