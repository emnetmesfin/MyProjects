<?php
require_once ("controllers/appointment_controller.php");
require_once ("models/appointment_model.php");
require_once ("views/receptionist_home.php");
session_start();
$main_model = new Appointment($_SESSION["id"]);
$main_view  = new receptionistHomeView("templates/receptionist_home_page.php");
$main_controller = new AppointmentController($main_model, $main_view);