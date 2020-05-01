<?php

require_once ("controllers/account_controller.php");
require_once ("models/patient_model.php");
require_once ("views/paccount_view.php");

$patient_model = new Patient();
$account_view  = new PatientAccountView("templates/paccount_page.php");
$account_controller = new AccountController($patient_model, $account_view);


 ?>
