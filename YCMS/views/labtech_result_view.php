<?php

class LabTechResultView{

	private $view_template;
	public $exam_data;
	public $error_data;
	public $suc_data;


	public function __construct($template){
		$this->view_template = $template;
	}

	public function update(){
		include_once($this->view_template);
	}

	public function setSuccess($data){
		$this->suc_data=$data;
	}

	public function setExamData($data){
		// echo "in here";
		$this->exam_data = $data;


	}

	public function setErrorData($data){
		$this->error_data=$data;
	}

  public function getResultData(){
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      if(isset($_POST['submit']))
      {

				$examID=isset($_POST["examid"])?$_POST["examid"]:'';
        $patient_id = isset($_POST["patientid"])?$_POST["patientid"]:'';
        $doc_id = isset($_POST["docid"])?$_POST["docid"]:'';
        $diagnosis = isset($_POST["diagnosis"])?$_POST["diagnosis"]:'';

        $info= array($examID,$patient_id,$doc_id,$diagnosis);
				//print_r($info);
        return $info;
      }
    }

  }





}






 ?>
