<?php
session_start();


class AccountController{
  private $model;
	private $view;

  public function __construct (&$live_model, &$live_view)
	{
		$this->model = $live_model;
		$this->view  = $live_view;


    $this->validate();
    $this->view->update();
	}

  public function validate(){
    $user_id = $_SESSION["user_id"];
    $data=$this->model->getPatient($user_id);
    //print_r($data);
    $this->view->setUserData($data);

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

      if(isset($_POST['submit'])){

        $info=$this->view->getupdateInfo();

        if($this->model->updatePatient($info[0],$info[1],$info[2],$info[3],$info[4],$info[5],$info[6],$info[7],$info[8],$info[9])){
          $_SESSION["user_id"] = $info[0];
          header('Location: home.php');
        }
        else{
        }
      }
    }
    else{
    }

  }


}





 ?>
