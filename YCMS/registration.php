<?php

header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");

require_once ("controllers/register_controller.php");
require_once ("models/patient_model.php");
require_once ("views/register_view.php");

$patient_model = new Patient();
$register_view  = new RegisterView("templates/register.php");
$main_controller = new RegisterController($patient_model, $register_view);


 ?>
