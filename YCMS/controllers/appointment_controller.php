<?php
class AppointmentController{
	private $model;
	private $view;

	public function __construct (&$live_model, &$live_view){
		$this->model = $live_model;
		$this->view  = $live_view;
		$this->update();
	}
	public function update(){
		if($_SESSION["role"]=="doctor"){
      $id=$_SESSION["user_id"];


      if ($_SERVER["REQUEST_METHOD"] == "POST"){

			if(isset($_POST['submit'])){

				$this->model->removeAppointment($_POST['submit']);
        $appointments=$this->model->getAppointments($id);
        $this->view->setData($appointments);
        $this->view->update();

			}
      $appointments=$this->model->getAppointments($id);
      $this->view->setData($appointments);


		}

    $appointments=$this->model->getAppointments($id);
    $this->view->setData($appointments);


    }

		if(isset($_POST['submit1'])){
			$_SESSION["patient_id"]=$_POST['submit1'];
			header('Location: doctorOrderExam.php');
		}



    else if($_SESSION["role"]=="receptionist"){
      $id=$_SESSION["user_id"];


      if ($_SERVER["REQUEST_METHOD"] == "POST"){

			if(isset($_POST['submit'])){
        $this->model->validateAppointment($_POST['submit']);
				$this->view->setData($this->model->getAllAppointments());
        $this->view->update();

			}
      $appointments=$this->model->getAllAppointments();
      $this->view->setData($appointments);


		}
    $appointments=$this->model->getAllAppointments($id);

    $this->view->setData($appointments);


    }
	}
}
