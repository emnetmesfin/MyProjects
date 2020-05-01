<?php

class LabHomeView{

  private $view_template;
	public $exam_data;


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

    $this->exam_data=$data;
    
    $this->update();

  }
}
?>
