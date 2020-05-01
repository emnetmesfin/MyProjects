<?php
class patientRecordView{
	private $view_template;
	public $recordData;
	public $recordList;
	public function __construct($template){
		$this->view_template = $template;
	}
	public function setData($data){
		$this->recordData = $data;
		$this->update();
	}
	public function setList($list){
		$this->recordList = $list;
	
		$this->update();
	}
	public function update(){
		include_once($this->view_template);
	}
}
