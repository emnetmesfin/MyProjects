<?php
class PatientHistoryView{
	private $view_template;
	public $recordData;
	public $recordList;
	public function __construct($template){
		$this->view_template = $template;
	}
	public function setData($data){
		$this->recordData = $data;
    //print_r($this->recordData);

	}
	public function setList($list){
		$this->recordList = $list;


	}
	public function update(){
		include_once($this->view_template);
	}
}
