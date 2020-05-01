<?php
session_start();

class RegisterController{

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
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

      if(isset($_POST['submit'])){

        $info=$this->view->getRegInfo();
        $info=$this->view->getRegInfo();
        $this->model->registerPatient($info[0],$info[1],$info[2],$info[3],$info[4],$info[5],$info[6],$info[7],$info[8]);
          $this->model->sendEmail($info[4],$info[0]);
        header('Location: index.php');
        // }
        // else{


        // }


        $db = new DatabaseHandler();



      }
    }
    else{

    }

    //echo ($this->model->id."<br>");



    //include('views/home.php');
  }







}




 ?>
