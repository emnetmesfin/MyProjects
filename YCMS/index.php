<?php


require_once ("controllers/login_controller.php");
require_once ("models/account_model.php");
require_once ("views/login_view.php");


$main_model = new Account();
$main_view  = new LoginView("templates/login.php");
$main_controller = new LoginController($main_model, $main_view);







 ?>
