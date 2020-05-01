<?php
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");

session_start();
require_once ("controllers/labExamController.php");
require_once ("models/labexam_model.php");
require_once ("views/labHome_view.php");


$labexam_model = new LabExam();
$labHome_view  = new LabHomeView("templates/lab_home_page.php");
$labexam_controller = new labExamController($labexam_model, $labHome_view);








 ?>
