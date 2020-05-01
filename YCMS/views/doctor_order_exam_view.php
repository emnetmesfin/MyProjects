<?php

class doctorOrderExamView{

  private $view_template;
	public $error_data;
  public $suc_data;
  public $id_data;


  public function __construct($template){
    $this->id_data = "";
    $this->view_template = $template;
		// include ($this->view_template);

  }

  public function update(){
		include_once($this->view_template);
	}

  public function displayError($msg){

		$this->error_data = $msg;
		//$this->update();
		// echo $msg;

	}

  public function setIdData($id){
    $this->id_data= $id;
    //echo "$this->id_data<br>";

    //$this->update();
  }

  public function displaySuccess($msg){

		$this->suc_data = $msg;
		//$this->update();
		// echo $msg;

	}



}


 ?>
