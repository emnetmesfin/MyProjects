<?php

include "DatabaseHandler.php";

class Record{
    public $id;
    public $patient_id;
    public $data;
    public $date;

    public $db;

    public function __construct(){
        $this->db = new DatabaseHandler();
    }

    public  function getRecord($doctor_id,$patient_id){
        return $this->db->getRecord($doctor_id,$patient_id);
    }

    public function getPatientRecord($patient_id){
      return $this->db->getPatientRecord($patient_id);

    }
    public function getSingleRecord($record_id){
        return $this->db->getSingleRecord($record_id);
    }

    public function updateRecord($patient_id,$doctor_id,$data){
        $this->db->addRecord($patient_id,$doctor_id,$data);
    }

    public function searchRecord($patient_id){

    }

    public function addRecord($patient_id,$doctor_id,$data){

      $check=$this->db->addRecord($patient_id,$doctor_id,$data);
      return $check;


    }

    public function getConsDate($patient_id){

    }

}


 ?>
