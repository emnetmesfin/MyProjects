<?php

include ("account_model.php");
include_once ("DatabaseHandler.php");
class Patient {

  public $id;
  public $phone;
  public $emergency_contact;
  public $age;
  public $sex;


  //$db = new DatabaseHandler();



  public function getPatient($id){
    $db = new DatabaseHandler();
    $account= new Account();
    $info=$db->getPatient($id);

    $account_info=$account->getAccountInfo($id);
    //print_r($info);
    //print_r($account_info);

    $result= array_merge($info,$account_info);
    return $result;

  }






  public function registerPatient($fname,$lname,$age,$sex,$email,$phone,$emergency_contact,$password,$user_image){
    $db = new DatabaseHandler();
    echo "check<br>";

    if($db->registerPatient($fname,$lname,$age,$sex,$email,$phone,$emergency_contact,$password,$user_image)){
      return true;
    }
    else{
      return false;
    }


  }

  public function updatePatient($id,$fname,$lname,$age,$sex,$email,$phone,$emergency_contact,$password,$user_image){
    $db = new DatabaseHandler();

    if($db->updatePatient($id,$fname,$lname,$age,$sex,$email,$phone,$emergency_contact,md5($password),$user_image)){
      return true;
    }
    else{
      return false;
    }



  }

  public function sendEmail($email,$id){
    require_once("./Mail-Function/PHPMailer_5.2.4/class.phpmailer.php");
    try {
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->SMTPDebug = 1;
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'ssl';
      $mail->Host = "smtp.gmail.com";
      $mail->Port = 465; // or 587
      $mail->IsHTML(true);
      $mail->Username = "aymen2jelal@gmail.com.com";
      $mail->Password = "Davidwestside1";
      $mail->SetFrom("aymen2jelal@gmail.com.com");
      $mail->Subject = "Hello This is ur Id";
      $mail->Body = "This is the first email sent from PHP.";
      $mail->AddAddress("$email");
      if(!$mail->Send()){
        echo "Mailer Error: " . $mail->ErrorInfo;
      }
      else{
        echo "Message has been sent";
      }
     } catch (phpmailerException $e) {
      echo $e->errorMessage(); //Pretty error messages from PHPMailer
     } catch (Exception $e) {
      echo $e->getMessage(); //Boring error messages from anything else!
     }
  }


}






 ?>
