<?php
//require_once ("/models/account_model.php");
//require_once ("/views/login_view.php");
//include ("models/DatabaseHandler.php");

class LoginController{
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

        $info=$this->view->getlogininfo();
        $this->model->login($info[0]);
        $role=$this->model->role;


        $db = new DatabaseHandler();
        //echo md5($info[1]);
        if($info[0]==""){
          $this->view->setEmailError("This field cant be left empty");
        }
        elseif ($info[1]=="") {
          // code...
          $this->view->setPasswordError("This field cant be left empty");
        }
        else {
          // code...
          if($db->validate($info[0], md5($info[1]))){
            if($this->model->role=="patient"){
              $_SESSION["user_id"] = $info[0];
              $_SESSION["role"]="patient";
              header('Location: home.php');
            }
            else if($this->model->role=="doctor"){
              $_SESSION["user_id"] = $info[0];
              $_SESSION["role"]="doctor";
              echo "doctor <br>";
              header('Location: docHome.php');
            }
            else if($this->model->role=="receptionist"){
              $_SESSION["user_id"] = $info[0];
              $_SESSION["role"]="receptionist";
              echo "doctor <br>";
              header('Location: receptionHome.php');
            }
            else if($this->model->role=="lab"){
              $_SESSION["user_id"] = $info[0];
              $_SESSION["role"]="lab";
              header('Location: lab_home.php');
            }
            else if($this->model->role=="admin"){
              $_SESSION["user_id"] = $info[0];
              $_SESSION["role"]="admin";
              header('Location: admin_add.php');
            }

          }
          else{
            //echo "error set <br>";
            $this->view->setErrorData("invalid user name or password");
            //$this->view->update();

          }
        }




    //include('views/home.php');
  }






}
}
}



 ?>
