<?php

class labExamController{
  private $model;
	private $view;

  public function __construct (&$live_model, &$live_view)
  {
    $this->model = $live_model;
    $this->view  = $live_view;
    $this->update();
    $this->view->update();
  }


  public function update(){
    if($_SESSION["role"]=="lab"){

      if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if(isset($_POST['submit'])){

          $_SESSION["exam_id"]=$_POST['submit'];
          header('Location: lab_tech_result.php');



        }

        $exams=$this->model->getexams();
        $this->view->setData($exams);
      }

      $exams=$this->model->getexams();
      $this->view->setData($exams);


    }

    if($_SESSION["role"]=="doctor"){
      //echo "HERE";

      $pid= $_SESSION["patient_id"];
      //echo $patient_id;

      $this->view->setIdData($pid);




      if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $patient_id= $_SESSION["patient_id"];

        $this->view->setIdData($patient_id);
        //echo "here <br>";

      if(sizeof($_POST) == 0){
        $this->view->displayError('* No test selected');
      }

      else{

          $tests = array();
          $patient_id;
          $i = 0;
          foreach ($_POST as $key => $value) {
            if($key=='patient_id'){
              $patient_id=$value;
            }
            else{
              $tests[$i] = $value;
              $i++;

          }
        }

          $ans = "";
          foreach ($tests as $key => $value) {
            $ans = $ans.$value.",";
          }
          // echo $ans;
         $ans = substr($ans, 0,-1);
         // echo $ans;
         $this->model->orderLab($patient_id,$_SESSION['user_id'],$ans);
         $this->view->displaySuccess("Lab Ordered ");
         // print_r($_SESSION['user_id']);

      }


    }

    }


  }
}
