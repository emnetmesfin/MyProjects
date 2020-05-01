<?php

class PatientAccountView{

  private $view_template;
  public $user_data;

  public function __construct($template){
    $this->view_template = $template;

  }

  public function update()
  {

    include_once ($this->view_template);
  }

  public function getupdateInfo(){
    echo "in";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      echo "inpost";

      if(isset($_POST['submit']))
      {
        echo "insubmit";
        $id = isset($_POST["id"])?$_POST["id"]:'';
        $fname = isset($_POST["fname"])?$_POST["fname"]:'';
        $lname = isset($_POST["lname"])?$_POST["lname"]:'';
        $age = isset($_POST["age"])?$_POST["age"]:'';
        $sex = isset($_POST["sex"])?$_POST["sex"]:'';
        $email = isset($_POST["email"])?$_POST["email"]:'';
        $phone = isset($_POST["phone"])?$_POST["phone"]:'';

        $image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
        $econtact = isset($_POST["eContact"])?$_POST["eContact"]:'';
        $upass = isset($_POST["password"])?$_POST["password"]:'';



        $info= array($id,$fname,$lname,$age,$sex,$email,$phone,$econtact,$upass,$image);




        return $info;
      }
    }
  }

  public function setUserData($data){
    $this->user_data=$data;
  }



}


 ?>
