<?php

class DoctorAddRecordView{

	private $view_template;
	public $suc_message;
	public $error_message;
	public $user_data;


	public function __construct($template){
		$this->view_template = $template;
	}

	public function update(){
		include_once($this->view_template);
	}

	public function setUserData($data){
		$this->user_data = $data;


	}

	public function getRecordData(){
		if ($_SERVER["REQUEST_METHOD"] == "POST"){


      if(isset($_POST['submit']))
      {

        $id = isset($_POST["patientid"])?$_POST["patientid"]:'';
        $data = isset($_POST["data"])?$_POST["data"]:'';
        $info= array($id,$data);
        return $info;
      }
    }
	}

	public function displaySuccess($data){

		$this->suc_message=$data;
		//echo "$this->suc_message";

	}
	public function displayError($data){

		$this->error_message=$data;
		//echo "$this->suc_message";

	}

}






 ?>
