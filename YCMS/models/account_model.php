<?php



include_once ("DatabaseHandler.php");
class Account{



  public $id;
  public $fname;
  public $lname;
  public $password;
  public $email;
  public $phone;
  public $role;
  public $user_image;



  public function login($sid){

    $info=$this->getAccountInfo($sid);


    $this->id=$info["user_id"];
    $this->fname=$info["user_fname"];
    $this->lname=$info["status"];
    $this->password=$info["password"];

    $this->email=$info["email"];
    $this->role=$info["status"];
    session_start();
    $_SESSION["id"] = $this->id;
  }

  public function getAccountInfo($sid){
    $db = new DatabaseHandler();
    $info=$db->getAccount($sid);
    //print_r($info);

    return $info;
  }



}

?>
