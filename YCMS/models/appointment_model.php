<?php

include_once "DatabaseHandler.php";

class Appointment{

  public $appointment_id;
  public $appointment_date;

  public $db;

  public function __construct(){
    $this->db = new DatabaseHandler();
  }

  public function bookAppointment($patient_id,$doctor_id,$date){
    $result=$this->db->addAppointment($patient_id,$doctor_id,$date);


  }

  public function getAvailableDate(){

    $today=date("Y-m-d");


    $ped_tmw_times=array("02:00:00","02:30:00","03:00:00","03:30:00","04:00:00","04:30:00","05:00:00","05:30:00","06:00:00","06:30:00","07:30:00","08:00:00","08:30:00","09:00:00","09:30:00","10:00:00","10:30:00","11:00:00","11:30:00");
    $ped_dtmw_times=array("02:00:00","02:30:00","03:00:00","03:30:00","04:00:00","04:30:00","05:00:00","05:30:00","06:00:00","06:30:00","07:30:00","08:00:00","08:30:00","09:00:00","09:30:00","10:00:00","10:30:00","11:00:00","11:30:00");

    $internal_tmw_times=array("02:00:00","02:30:00","03:00:00","03:30:00","04:00:00","04:30:00","05:00:00","05:30:00","06:00:00","06:30:00","07:30:00","08:00:00","08:30:00","09:00:00","09:30:00","10:00:00","10:30:00","11:00:00","11:30:00");
    $internal_dtmw_times=array("02:00:00","02:30:00","03:00:00","03:30:00","04:00:00","04:30:00","05:00:00","05:30:00","06:00:00","06:30:00","07:30:00","08:00:00","08:30:00","09:00:00","09:30:00","10:00:00","10:30:00","11:00:00","11:30:00");

    $rad_tmw_times=array("02:00:00","02:30:00","03:00:00","03:30:00","04:00:00","04:30:00","05:00:00","05:30:00","06:00:00","06:30:00","07:30:00","08:00:00","08:30:00","09:00:00","09:30:00","10:00:00","10:30:00","11:00:00","11:30:00");
    $rad_dtmw_times=array("02:00:00","02:30:00","03:00:00","03:30:00","04:00:00","04:30:00","05:00:00","05:30:00","06:00:00","06:30:00","07:30:00","08:00:00","08:30:00","09:00:00","09:30:00","10:00:00","10:30:00","11:00:00","11:30:00");


    $reserved= $this->db->getResDates();


    foreach ($reserved as $key => $value) {
      //print_r($value);
      $app= explode(" ",$value["appointment_time"]);

      $app_date=$app[0];
      $app_time=$app[1];





      if($value["doctor_id"]=="STAFF/0000/10"){
        //echo "here <br>";


        if($app_date==date("Y-m-d",strtotime("+1 days", time()))){


            $appkey=array_search($app_time, $ped_tmw_times);


            array_splice($ped_tmw_times, $appkey,1);

        }

        elseif($app_date==date("Y-m-d",strtotime("+2 days", time()))){
          //echo "here<br>";

            $appkey=array_search($app_time, $ped_dtmw_times);

            array_splice($ped_dtmw_times, $appkey,1);

        }

      }

      elseif ($value["doctor_id"]=="STAFF/0001/10") {
        // code...



        if($app_date==date("Y-m-d",strtotime("+1 days", time()))){
          //echo "hereee<br>";


            $appkey=array_search($app_time, $internal_tmw_times);



            array_splice($internal_tmw_times, $appkey,1);

        }

        elseif($app_date==date("Y-m-d",strtotime("+2 days", time()))){
          //echo "here<br>";

            $appkey=array_search($app_time, $internal_dtmw_times);

            array_splice($internal_dtmw_times, $appkey,1);

        }

      }

      elseif ($value["doctor_id"]=="STAFF/0002/10") {
        // code...

        if($app_date==date("Y-m-d",strtotime("+1 days", time()))){


            $appkey=array_search($app_time, $rad_tmw_times);


            array_splice($rad_tmw_times, $appkey,1);

        }

        elseif($app_date==date("Y-m-d",strtotime("+2 days", time()))){
          //echo "here<br>";

            $appkey=array_search($app_time, $rad_dtmw_times);

            array_splice($rad_dtmw_times, $appkey,1);

        }

      }

      // code...
    }

    $all_times=array($ped_tmw_times,$ped_dtmw_times,$internal_tmw_times,$internal_dtmw_times,$rad_tmw_times,$rad_dtmw_times);

    //print_r($rad_dtmw_times);

    //print_r($reserved);
    return($all_times);
  }

  public function getAvailableTimes($dep,$date){
    $all_times=$this->getAvailableDate();
    $available;

    if($date=="tomorrow"){
      if($dep=="Pediatrics"){
        $available=$all_times[0];
      }
      elseif($dep=="Internal Medicine"){
        $available=$all_times[2];
      }
      elseif($dep=="Radiology"){
        $available=$all_times[4];
      }

    }
    elseif ($date=="dayAfter") {
      if($dep=="Pediatrics"){
        $available=$all_times[1];
      }
      elseif($dep=="Internal Medicine"){
        $available=$all_times[3];
      }
      elseif($dep=="Radiology"){
        $available=$all_times[5];
      }
    }

    return $available;
  }

  public function checkPatientAppointment($id){
    $day=date("Y-m-d",strtotime("+1 days", time()));
    $check= $this->db->checkPatientAppointment($id,$day);

    return $check;
  }

  public function validateAppointment($aptId){
    $this->db->approveAppointment($aptId);
  }

  public function getAllAppointments(){
    //returns unapproved Appointments
    return $this->db->getAllAppointments();
  }


  public function getAppointments($doc_id){

    $appointments=$this->db->getAppointments($doc_id);
    return $appointments;

  }

  public function removeAppointment($app_id){
    $this->db->removeAppointment($app_id);
  }

}





 ?>
