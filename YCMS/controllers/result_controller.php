<?php
session_start();

class ResultController{

  private $model;
  private $exam_model;
	private $view;

  public function __construct (&$live_model,&$live_exam_model, &$live_view)
	{

		$this->model = $live_model;
    $this->exam_model=$live_exam_model;
		$this->view  = $live_view;


    $this->update();
    $this->view->update();
	}


  public function update(){
    if($_SESSION["role"]=="doctor"){
      $id=$_SESSION["user_id"];



      if ($_SERVER["REQUEST_METHOD"] == "POST"){

			if(isset($_POST['submit'])){

        $this->model->removeResult($_POST['submit']);
        $result=$this->model->getResult($id);
        $this->view->setResultData($result);
        $this->view->update();

      }
      $result=$this->model->getResult($id);
      $this->view->setResultData($result);
      $this->view->update();
    }

    $result=$this->model->getResult($id);
    $this->view->setResultData($result);
    $this->view->update();
    }

    else if($_SESSION["role"]=="lab"){
      $exam=$this->exam_model->getexam($_SESSION["exam_id"]);
      $this->view->setExamData($exam);
      if($_SESSION["exam_id"]!=null){


      }
      if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if(isset($_POST['submit'])){

        $info=$this->view->getResultData();

        if ($info[3]=="") {

          $this->view->setErrorData("Diagnosis field cant be empty");
          $this->view->update();
        }
        else {
          $this->model->sendLabResult($info);

          $this->view->setSuccess("Result add success");
          $this->view->update();
        }

        //$this->model->sendLabResult($info);
        }
      }

  }
}

}
 ?>
