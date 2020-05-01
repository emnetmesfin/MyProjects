<?php
session_start();
class AddRecordController{
  private $model;
	private $view;



  public function __construct (&$live_model, &$live_view){
		$this->model = $live_model;
		$this->view  = $live_view;
    $this->validate();
    $this->view->update();
	}


  public function validate(){
    if($_SESSION["role"]=="doctor"){
      $this->view->setUserData($_SESSION["record_patient"]);
      //$this->view->update();
      if($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST['submit']))
        {
          $info=$this->view->getRecordData();
          if ($info[1]=="") {
            $this->view->displayError("Data cant be empty");
            $this->view->update();
          }
          else{
            //header('Location: doctorRecord.php');
            if ($this->model->addRecord($info[0],$_SESSION["user_id"],$info[1])) {
              $this->view->displaySuccess("Record added");
              $this->view->update();
            }

          }

          //echo "$info[0]";
        }

      }

    }

  }
}
?>
