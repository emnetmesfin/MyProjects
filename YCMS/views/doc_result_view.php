<?php

class DoctorResultView{

	private $view_template;
	public $result_data;


	public function __construct($template){
		$this->view_template = $template;
	}

	public function update(){
		include_once($this->view_template);
	}

	public function setResultData($data){
		// echo "in here";
		$this->result_data = $data;


	}

}






 ?>
