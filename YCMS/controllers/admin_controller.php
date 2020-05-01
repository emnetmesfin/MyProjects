<?php
include_once 'models/DatabaseHandler.php';

class adminController{
	private $model;
	private $view;

	public function __construct (&$live_model, &$live_view){
		$this->model = $live_model;
		$this->view  = $live_view;

		$this->validate();
		$this->view->update();
	}

	public function validate(){
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			if (isset($_POST['submit'])) {

				$info=$this->view->getInfo();
				
				$this->model->addStaff($info[0],$info[1],$info[2],$info[3],$info[4]);
			}
		}
	}

 }

  ?>
