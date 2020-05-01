<?php

class LoginView{

  private $view_template;
	public $error_data;
  public $email_error;
  public $password_error;


  public function __construct($template){
    $this->view_template = $template;

		//include ($this->view_template);

  }

  public function update()
	{
		//$view_data = $this->view_data;

		include_once($this->view_template);
	}



  public function getlogininfo(){
    // echo "in";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      // echo "inpost";

      if(isset($_POST['submit']))
      {
        // echo "insubmit";
        $uname = isset($_POST["username"])?$_POST["username"]:'';
        $upass = isset($_POST["password"])?$_POST["password"]:'';

        $info= array($uname,$upass );



        // echo $uname;
        // echo $upass."<br>";

        return $info;
      }
    }
  }

  public function setErrorData($data){
    // echo "in set error <br>";
    $this->error_data=$data;
    // include_once($this->view_template);
    $this->update();
  }

  public function setEmailError($data){
    $this->email_error=$data;
    $this->update();
  }

  public function setPasswordError($data){
    $this->passowrd_error=$data;
    $this->update();
  }




}


 ?>
