<?php

class DatabaseHandler{
  // db settings
  private $host   = 'localhost';
  private $user   = 'root';
  private $dbname = 'yelemma';
  private $pass   = '';

  private $dbh;
  private $error;

  public function __construct(){
        // Set DSN
        $dsn = 'mysql: host=' . $this->host;
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT            => true,
            PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND    => 'SET NAMES UTF8'
        );
        // Create a new PDO instanace
        try {
          $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);

            $this->dbh->query("CREATE DATABASE IF NOT EXISTS $this->dbname")
        or die(print_r($this->$dbh->errorInfo(), true));
        $this->dbh->query("use $this->dbname");



        }

        catch (PDOException $e) {

          die("DB ERROR: ". $e->getMessage());

        }


        $tableExists = $this->dbh->query("SHOW TABLES LIKE 'patient_profile'")->rowCount() > 0;


        if(!$tableExists){
            $table = 'CREATE TABLE patient_profile( '.
                'patient_id VARCHAR(20) NOT NULL UNIQUE, '.
                'patient_fname VARCHAR(20) NOT NULL, '.
                'patient_lname VARCHAR(20) NOT NULL, '.
                'age VARCHAR(2) NOT NULL, '.
                'sex VARCHAR(5) NOT NULL, '.
                'Phone_Number VARCHAR(20) NOT NULL, '.
                'emergency_contact VARCHAR(20) NOT NULL, '.
                'primary key (patient_id))';
            $tableExists = $this->dbh->query($table);
            // echo $table;
            if(!$tableExists){

                die("Error creating table");
            }
        }

        $tableExists = $this->dbh->query("SHOW TABLES LIKE 'user_data'")->rowCount() > 0;


        if(!$tableExists){
            $table = 'CREATE TABLE user_data( '.
                'user_id VARCHAR(20) NOT NULL UNIQUE, '.
                'user_fname VARCHAR(20) NOT NULL, '.
                'status VARCHAR(20) NOT NULL, '.
                'email VARCHAR(50) NOT NULL, '.
                'password TEXT NOT NULL, '.
                'user_image LONGBLOB,' .
                'primary key (user_id))';
            $tableExists = $this->dbh->query($table);
            // echo $table;
            if(!$tableExists){

                die("Error creating table");
            }
        }

        $tableExists= $this->dbh->query("SHOW TABLES LIKE 'appointment'")->rowCount() > 0;

        if(!$tableExists){

          $table = 'CREATE TABLE appointment( '.
              'appointment_id VARCHAR(20) NOT NULL UNIQUE, '.
              'patient_id VARCHAR(20) NOT NULL, '.
              'doctor_id VARCHAR(20) NOT NULL, '.
              'appointment_time DATETIME NOT NULL, '.
              'approved tinyint(1) NOT NULL,'.
              'primary key (appointment_id))';
          // echo $table;
          $tableExists = $this->dbh->query($table);

          if(!$tableExists){

              die("Error creating table");
          }

        }

        $tableExists= $this->dbh->query("SHOW TABLES LIKE 'labexam'")->rowCount() > 0;

        if(!$tableExists){

          $table = "CREATE TABLE `labexam` (
  `examId` varchar(20) NOT NULL,
  `doctorId` varchar(20) NOT NULL,
  `patientId` varchar(20) NOT NULL,
  `testType` varchar(150) NOT NULL,
  `approved` tinyint(4) NOT NULL
)";
          // echo $table;
          $tableExists = $this->dbh->query($table);

          if(!$tableExists){

              die("Error creating table");
          }

        }

        $tableExists= $this->dbh->query("SHOW TABLES LIKE 'treated'")->rowCount() > 0;

        if(!$tableExists){

          $table = 'CREATE TABLE treated( '.
              'appointment_id VARCHAR(20) NOT NULL UNIQUE, '.
              'patient_id VARCHAR(20) NOT NULL, '.
              'doctor_id VARCHAR(20) NOT NULL, '.
              'appointment_time DATE NOT NULL, '.
              'primary key (appointment_id))';
          // echo $table;
          $tableExists = $this->dbh->query($table);

          if(!$tableExists){

              die("Error creating table");
          }

        }

        $tableExists= $this->dbh->query("SHOW TABLES LIKE 'result'")->rowCount() > 0;

        if(!$tableExists){

          $table = 'CREATE TABLE result( '.
              'result_id VARCHAR(20) NOT NULL UNIQUE, '.
              'patient_id VARCHAR(20) NOT NULL, '.
              'doctor_id VARCHAR(20) NOT NULL, '.
              'data text NOT NULL, '.
              'seen tinyint(1) NOT NULL,'.
              'primary key (result_id))';
          // echo $table;
          $tableExists = $this->dbh->query($table);

          if(!$tableExists){

              die("Error creating table");
          }

        }


        $tableExists= $this->dbh->query("SHOW TABLES LIKE 'record'")->rowCount() > 0;

        if(!$tableExists){

          $table = 'CREATE TABLE record( '.
              'record_id VARCHAR(20) NOT NULL UNIQUE, '.
              'patient_id VARCHAR(20) NOT NULL, '.
              'doctor_id VARCHAR(20) NOT NULL, '.
              'data text NOT NULL, '.
              'rdate date NOT NULL,'.
              'primary key (record_id))';
          // echo $table;
          $tableExists = $this->dbh->query($table);

          if(!$tableExists){

              die("Error creating table");
          }

        }


    }

    public function getNewRecordId(){
        $appId = "SELECT `record_id` FROM `record` ORDER BY `record_id` DESC LIMIT 1;";
        $prep = $this->dbh->prepare($appId);
        $prep->execute();
        $result = $prep->fetch();
        $year = date("Y");
        $year = substr($year,-3,-1);
        $year = strrev($year);
        if($prep->rowCount() == 1){
          $newId = explode("/", $result[0]);
          $newId = $newId[1];
          $newId = (int)$newId;
          $newId = $newId + 1;
          $newId = (string) $newId;
          $num = strlen($newId);
          $num = 4 - $num;
          for ($x = 0; $x < $num; $x++) {
            $newId = "0" . $newId;
          }

          $newId = "REC/$newId/$year";
          return $newId;
        }
        else{
          $newId = "REC/0000/".$year;
          return $newId;
        }
    }
    public function getNewStaffId(){
        $appId = "SELECT `user_id` FROM `user_data` WHERE `status` NOT LIKE 'patient' ORDER BY `user_id` DESC LIMIT 1;";
        $prep = $this->dbh->prepare($appId);
        $prep->execute();
        $result = $prep->fetch();
        $year = date("Y");
        $year = substr($year,-3,-1);
        $year = strrev($year);
        if($prep->rowCount() == 1){
          $newId = explode("/", $result[0]);
          $newId = $newId[1];
          $newId = (int)$newId;
          $newId = $newId + 1;
          $newId = (string) $newId;
          $num = strlen($newId);
          $num = 4 - $num;
          for ($x = 0; $x < $num; $x++) {
            $newId = "0" . $newId;
          }

          $newId = "STAFF/$newId/$year";
          return $newId;
        }
        else{
          $newId = "STAFF/0000/".$year;
          return $newId;
        }
    }

    public function addStaff($user_fname, $status, $email, $pass, $image){
      //try{
        $stfId = $this->getNewStaffId();
        $sth=$this->dbh->prepare("INSERT INTO `user_data` (`user_id`, `user_fname`, `status`, `email`,`password`,`user_image`) VALUES ('$stfId', '$user_fname', '$status', '$email' , '$pass','$image');");
        $sth->execute();
        return true;
      //}
      //catch(PDOException $e){
        //return false;
      //}
    }

    public function addRecord($patient_id, $doctor_id, $data){
      try{
        $recId = $this->getNewRecordId();
        $sth=$this->dbh->prepare("INSERT INTO `record` (`record_id`, `patient_id`, `doctor_id`, `data`,`rdate`) VALUES ('$recId', '$patient_id', '$doctor_id', '$data' , NOW());");
        $sth->execute();
        return true;
      }
      catch(PDOException $e)
       {
         return false;
      }
    }

    public function getPatientRecord($patient_id){
      $q = "SELECT * FROM `record` WHERE `patient_id` LIKE '$patient_id';";
      // echo $q;
      $query = $this->dbh->prepare($q);
      $query->execute();
      // echo $q;
      $result = $query->fetchAll();
      // print_r($result);
      return $result;
    }

    public function getRecord($doctor_id,$patient_id){
      $q = "SELECT * FROM `record` WHERE `patient_id` LIKE '$patient_id' AND `doctor_id` LIKE '$doctor_id';";
      $query = $this->dbh->prepare($q);
      $query->execute();
      // echo $q;
      $result = $query->fetchAll();
      // print_r($result);
      return $result;
    }

    public function getSingleRecord($record_id){
      $q = "SELECT * FROM `record` WHERE `record_id` LIKE '$record_id';";
      $query = $this->dbh->prepare($q);
      $query->execute();
      // echo $q;
      $result = $query->fetch();
      // print_r($result);
      return $result;
    }



    public function validateResult($id){
      $query = $this->dbh->prepare("UPDATE `result` SET `seen` = '1' WHERE `result`.`result_id` = '$id';");
      $query->execute();

    }

    public function getResults($id){

      $sth=$this->dbh->prepare("SELECT * FROM result WHERE doctor_id = '" .$id. "' AND seen= '0' ");
      $sth->execute();
      $result = $sth->fetchALL();
      return $result;

    }

    public function checkPatientAppointment($id,$date){

      $sth=$this->dbh->prepare("SELECT * FROM appointment WHERE patient_id = '" .$id. "' AND appointment_time LIKE '%".$date."%' LIMIT 1");
      $sth->execute();
      $result=$sth->fetch();

      if ($sth->rowCount()==1){
        return true;
      }
      return false;
    }



    public function getResDates(){

      $tmw = date("Y-m-d",strtotime("+1 days", time()));
      $dtmw = date("Y-m-d",strtotime("+2 days", time()));



      $sth=$this->dbh->prepare("SELECT * FROM `appointment` WHERE `appointment_time` LIKE '%".$tmw."%' OR `appointment_time` LIKE '%".$dtmw."%'");
      $sth->execute();
      $result=$sth->fetchAll();

      return $result;


    }


    public function getexams(){
      $sth = $this->dbh->prepare("SELECT * FROM `labexam` WHERE `approved` = '0'");
      $sth->execute();
      $result=$sth->fetchAll();



      return $result;

    }

    public function getexam($id){
      $sth=$this->dbh->prepare("SELECT * FROM labexam WHERE  examId = '" .$id. "'");

      $sth->execute();
      $result=$sth->fetchAll();
      return $result;


    }
    public function getNewResultId(){
        $appId = "SELECT `result_id` FROM `result` ORDER BY `result_id` DESC LIMIT 1;";
        $prep = $this->dbh->prepare($appId);
        $prep->execute();
        $result = $prep->fetch();
        $year = date("Y");
        $year = substr($year,-3,-1);
        $year = strrev($year);
        if($prep->rowCount() == 1){
          $newId = explode("/", $result[0]);
          $newId = $newId[1];
          $newId = (int)$newId;
          $newId = $newId + 1;
          $newId = (string) $newId;
          $num = strlen($newId);
          $num = 4 - $num;
          for ($x = 0; $x < $num; $x++) {
            $newId = "0" . $newId;
          }

          $newId = "RES/$newId/$year";
          return $newId;
        }
        else{
          $newId = "RES/0000/".$year;
          return $newId;
        }
    }

    public function getNewExamId(){
        $appId = "SELECT `examId` FROM `labexam` ORDER BY `examId` DESC LIMIT 1;";
        $prep = $this->dbh->prepare($appId);
        $prep->execute();
        $result = $prep->fetch();
        $year = date("Y");
        $year = substr($year,-3,-1);
        $year = strrev($year);
        if($prep->rowCount() == 1){
          $newId = explode("/", $result[0]);
          $newId = $newId[1];
          $newId = (int)$newId;
          $newId = $newId + 1;
          $newId = (string) $newId;
          $num = strlen($newId);
          $num = 4 - $num;
          for ($x = 0; $x < $num; $x++) {
            $newId = "0" . $newId;
          }

          $newId = "EXM/$newId/$year";
          return $newId;
        }
        else{
          $newId = "EXM/0000/".$year;
          return $newId;
        }
    }

    public function postLabResult($examId,$patient_id,$doc_id,$diagnosis){

      $newId = $this->getNewResultId();

      try{
        $sql = "INSERT INTO result VALUES ('$newId', '$patient_id', '$doc_id','$diagnosis','0')";
        $this->dbh->exec($sql);
        //echo "New lab result added successfully";

      }
      catch(PDOException $e)
      {
        echo $sql . "<br>" . $e->getMessage();
        return false;
      }
      $this->approveExam($examId);

    }

    public function approveExam($examId){
      $query = $this->dbh->prepare("UPDATE `labexam` SET `approved` = '1' WHERE `labexam`.`examId` = '$examId';");
      $query->execute();
    }

    public function getPatient($userid){
      $sth=$this->dbh->prepare("SELECT * FROM patient_profile WHERE patient_id = '" .$userid. "' LIMIT 1");
      $sth->execute();
      $result = $sth->fetch();
      return $result;


    }

    public function validate($userid,$password){
      $sth=$this->dbh->prepare("SELECT * FROM user_data WHERE user_id = '" .$userid. "' AND password = '" .$password. "' LIMIT 1");
      $sth->execute();
      $result=$sth->fetch();

      if ($sth->rowCount()==1){
        return true;
      }
      return false;
    }


    public function getPatientId(){
        $appId = "SELECT `patient_id` FROM `patient_profile` ORDER BY `patient_id` DESC LIMIT 1;";
        $prep = $this->dbh->prepare($appId);
        $prep->execute();
        $result = $prep->fetch();
        $year = date("Y");
        $year = substr($year,-3,-1);
        $year = strrev($year);
        if($prep->rowCount() == 1){
          $newId = explode("/", $result[0]);
          $newId = $newId[1];
          $newId = (int)$newId;
          $newId = $newId + 1;
          $newId = (string) $newId;
          $num = strlen($newId);
          $num = 4 - $num;
          for ($x = 0; $x < $num; $x++) {
            $newId = "0" . $newId;
          }

          $newId = "YLM/$newId/$year";
          return $newId;
        }
        else{
          $newId = "YLM/0000/".$year;
          return $newId;
        }
    }
    public function registerPatient($fname,$lname,$age,$sex,$email,$phone,$emergency_contact,$password,$user_image){
      $id=$this->getPatientId();
      $password = md5($password);
      //try{
        $sql = "INSERT INTO patient_profile VALUES ('$id', '$fname', '$lname','$age','$sex','$phone','$emergency_contact')";

        $this->dbh->exec($sql);
         echo "New patient record created successfully";

      //}
      //catch(PDOException $e)
      //{
        // echo $sql . "<br>" . $e->getMessage();
        //return false;
      //}
      //try{
        $sql2= "INSERT INTO user_data VALUES ('$id','$fname','patient','$email','$password','$user_image')";
        //echo ($sql2."<br>");
        $this->dbh->exec($sql2);
         echo "New record created successfully";
      //}
      //catch(PDOException $e)
      //{
        // echo $sql . "<br>" . $e->getMessage();
        //return false;
      //}

      return true;



    }
    public function getNewAppointment(){
        $appId = "SELECT `appointment_id` FROM `appointment` ORDER BY `appointment_id` DESC LIMIT 1;";
        $prep = $this->dbh->prepare($appId);
        $prep->execute();
        $result = $prep->fetch();
        $year = date("Y");
        $year = substr($year,-3,-1);
        $year = strrev($year);
        if($prep->rowCount() == 1){
          $newId = explode("/", $result[0]);
          $newId = $newId[1];
          $newId = (int)$newId;
          $newId = $newId + 1;
          $newId = (string) $newId;
          $num = strlen($newId);
          $num = 4 - $num;
          for ($x = 0; $x < $num; $x++) {
            $newId = "0" . $newId;
          }

          $newId = "APT/$newId/$year";
          return $newId;
        }
        else{
          $newId = "APT/0000/".$year;
          return $newId;
        }
    }
    public function addAppointment($patient_id, $doctor_id, $date){
      try{
        // echo $date;
        // $date = explode("/", $date);
        // $dateI = $date[2]."-".$date[0]."-".$date[1];
        // SELECT `appointment_id` FROM `appointment` ORDER BY `appointment_id` DESC LIMIT 1
        $newId = $this->getNewAppointment();
        $query = "INSERT INTO `appointment` (`appointment_id`, `patient_id`, `doctor_id`, `appointment_time`, `approved`) VALUES ('$newId', '$patient_id', '$doctor_id', '$date' ,'0');";

        $this->dbh->query($query);
        return true;
      }
      catch (PDOException $e){
        return false;
      }
    }

    public function addLabExam($patient_id, $doctor_id, $tests){
      try{

        $newId = $this->getNewExamId();
        $query = "INSERT INTO `labexam` (`examId`, `doctorId`, `patientId`, `testType`, `approved`) VALUES ('$newId', '$doctor_id', '$patient_id', '$tests' ,'0');";
        $this->dbh->query($query);
        return true;
      }
      catch (PDOException $e){
        return false;
      }
    }



    public function getAllAppointments(){

      $sth = $this->dbh->prepare("SELECT * FROM `appointment` WHERE `approved` = '0'");
      $sth->execute();
      $result=$sth->fetchAll();



      return $result;
    }


    public function approveAppointment($aptId){
      $query = $this->dbh->prepare("UPDATE `appointment` SET `approved` = '1' WHERE `appointment`.`appointment_id` = '$aptId';");
      $query->execute();
    }

    public function removeAppointment($app_id){
      $sth=$this->dbh->prepare("DELETE FROM appointment WHERE  appointment_id = '" .$app_id. "' ");

      $sth->execute();

    }
    public function getAppointments($doc_id){
      $sth=$this->dbh->prepare("SELECT * FROM appointment WHERE  doctor_id = '" .$doc_id. "'  AND approved= '1' ");

      $sth->execute();
      $result=$sth->fetchAll();
      return $result;

    }
    public function check(){

    }

    public function getAccount($userid){
      $sth=$this->dbh->prepare("SELECT * FROM user_data WHERE  user_id = '" .$userid. "' LIMIT 1");
      $sth->execute();
      $result = $sth->fetch();
      return $result;
    }


  public function updatePatient($id,$fname,$lname,$age,$sex,$email,$phone,$emergency_contact,$password,$user_image){

      try{

        $sql =   "UPDATE patient_profile SET patient_fname='$fname', patient_lname='$lname', age='$age', sex='$sex', Phone_Number='$phone', emergency_contact='$emergency_contact' WHERE patient_id='$id'";
         //"INSERT INTO patient_profile VALUES ('$id', '$fname', '$lname','$age','$sex','$phone','$emergency_contact')";
        $this->dbh->exec($sql);
        echo "patient record updated";

      }
      catch(PDOException $e)
      {
        echo $sql . "<br>" . $e->getMessage();
        return false;
      }
      try{
        $sql2= "UPDATE user_data SET user_fname='$fname', email='$email', user_image='$user_image'  WHERE user_id='$id'";
        //echo ($sql2."<br>");
        $this->dbh->exec($sql2);
        echo "user update successfully";
      }
      catch(PDOException $e)
      {
        echo $sql . "<br>" . $e->getMessage();
        return false;
      }
      return true;
    }

}
?>
