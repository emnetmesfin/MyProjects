<?php

class DoctorHomeView{

  private $view_template;
	public $appointment_data;


  public function __construct($template){
    $this->view_template = $template;

		//include ($this->view_template);

  }

  public function update()
	{
		//$view_data = $this->view_data;

		include_once ($this->view_template);
	}


  public function setData($data){
  
    $this->appointment_data=$data;
    $this->update();

  }
}
?>
