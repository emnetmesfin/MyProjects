<?php
class bookView{

	private $view_template;
	public $user_data;
	public $time_data;
	public $time_error;
	public $suc_data;
	public $error_data;

	public function __construct($template){
		$this->view_template = $template;
	}

	public function update(){
		include_once($this->view_template);
	}

	public function setUserData($data){

    $this->user_data=$data;

    //$this->update();

  }

	public function setTimeError($data){
		$this->time_error=$data;
	}

	public function setError($data){
		$this->error_data=$data;
	}

	public function setSuc($data){
		$this->suc_data=$data;
	}

	public function getInfo(){
		if ($_SERVER["REQUEST_METHOD"] == "POST"){

			if(isset($_POST['bsubmit'])){

		        $date = isset($_POST["date"])?$_POST["date"]:'';
		        $dep = isset($_POST["department"])?$_POST["department"]:'';
						$time= isset($_POST["time"])?$_POST["time"]:'';
		        $info= array($date,$dep,$time);
        		return $info;
       }
    	}
	}

	public function setTimeData($data){

		$this->time_data=$data;
		//$this->update();

	}

	public function getDateData(){

		if ($_SERVER["REQUEST_METHOD"] == "POST"){


      if(isset($_POST['submit']))
      {

        $dep = isset($_POST["department"])?$_POST["department"]:'';
        $date = isset($_POST["date"])?$_POST["date"]:'';




        $info= array($dep,$date);




        return $info;
      }
    }

	}


}


 ?>
