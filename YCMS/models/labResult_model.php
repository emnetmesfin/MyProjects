<?php

include "DatabaseHandler.php";

class LabResult{
  public $labid;
  public $patient_id;
  public $test_type;
  public $date;
  public $result;
  public $db;



  public function __construct(){
    $this->db = new DatabaseHandler();

  }

  public function getResult($id){
    $results=$this->db->getResults($id);
    return $results;

  }

  public function removeResult($id){
    $this->db->validateResult($id);

  }

  public function sendLabResult($examid){


    $this->db->postLabResult($examid[0],$examid[1],$examid[2],$examid[3]);
    //$this->db->approveLabExam($examid[0]);

  }


}


?>
