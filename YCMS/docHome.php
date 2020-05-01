<?php

session_start();
require_once ("controllers/appointment_controller.php");
require_once ("models/appointment_model.php");
require_once ("views/doctorHome_view.php");


$appointment_model = new Appointment();
$doctorHome_view  = new DoctorHomeView("templates/doctor_home_page.php");
$appointment_controller = new AppointmentController($appointment_model, $doctorHome_view);








 ?>
