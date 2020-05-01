<?php
session_start();
class RecordController{
  private $model;
	private $view;



  public function __construct (&$live_model, &$live_view){
		$this->model = $live_model;
		$this->view  = $live_view;

    $this->validate();
    $this->view->update();

	}

  public function initialize(){
    // $this->view->recordList = array(array("a","id_a"),array("b","id_b"),array("c","id_c"));

  }

  public function validate(){

    if ($_SESSION["role"]=="patient") {
      // echo $_SESSION["user_id"]; 
      $record= $this->model->getPatientRecord($_SESSION["user_id"]);
      // print_r($record);
      $arr = array();
      $i = 0;
      foreach ($record as $key => $value) {
        $j = $i + 1;
        $arr[$i] = array("Consultation $j",$value['record_id']);
        $i++;
      }
      // print_r($arr);
      $this->view->setList($arr);
      //$this->view->update();

      if(isset($_POST['cons_id'])){


        //print_r($this->model->getSingleRecord($_POST['cons_id']));
        $this->view->setData($this->model->getSingleRecord($_POST['cons_id']));
        $this->view->update();
      }


    }

    elseif($_SESSION["role"]=="doctor"){

      if($_SERVER["REQUEST_METHOD"] == "POST") {
        // print(isset($_POST['search']));
        if(isset($_POST['search'])){
          // print_r($_POST);
          // print_r($_SESSION);
          $_SESSION["record_patient"]=$_POST['patient_id'];
          $res = $this->model->getRecord($_SESSION['user_id'], $_POST['patient_id']);
          // print_r($res);
          $arr = array();
          $i = 0;
          foreach ($res as $key => $value) {
            $j = $i + 1;
            $arr[$i] = array("Consultation $j",$value['record_id']);
            $i++;
          }
          // print_r($arr);
          $this->view->setList($arr);
          $this->view->update();
        }
        elseif(isset($_POST['cons_id'])){
          // print_r($this->model->getSingleRecord($_POST['cons_id']));
          $this->view->setData($this->model->getSingleRecord($_POST['cons_id']));
          $this->view->update();
        }
        elseif(isset($_POST['addRecord'])){
          header('Location: doctorAddRecord.php');


        }

        // $this->view->setData($this->model->getRecord($_POST['cons_id']));
      }

    }



  }
}
?>
