<?php

include_once "DatabaseHandler.php";

class LabExam{

  public $id;
  public $patientID;
  public $doctorID;
  public $test_type;
  public $date;
  public $db;

  public function __construct(){
    $this->db = new DatabaseHandler();


  }
  public function getexams(){
    $exams=$this->db->getexams();
    return $exams;

  }

  public function getExam($id){
    $exam=$this->db->getExam($id);
    return $exam;


  }

  public function orderLab($patient_id,$doctor_id,$test_type){
      $this->db->addLabExam($patient_id,$doctor_id,$test_type);

  }



}



 ?>
