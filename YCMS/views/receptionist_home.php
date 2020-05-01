<?php
class receptionistHomeView{

	private $view_template;
	public $view_data;
	public $info;

	public function __construct($template){
		$this->view_template = $template;
	}

	public function update(){
		include_once($this->view_template);
	}

	public function setData($data){
		// echo "in here";
		$this->info = $data;
		$this->update();
	}




}
