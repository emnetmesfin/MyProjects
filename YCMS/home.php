<?php
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
require_once ("controllers/book_controller.php");
require_once ("models/appointment_model.php");
require_once ("models/account_model.php");
require_once ("views/book_view.php");
session_start();
$main_model = new Appointment();
$account_model=new Account();
$main_view  = new bookView("templates/patient_home_page.php");
$main_controller = new bookController($main_model,$account_model, $main_view);
