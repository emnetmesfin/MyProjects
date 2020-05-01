<?php
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");

require_once ("controllers/admin_controller.php");
require_once ("models/admin_model.php");
require_once ("views/admin_add_view.php");


$main_model = new Admin();
$main_view  = new adminAddView("templates/admin_add_page.php");
$main_controller = new adminController($main_model, $main_view);
