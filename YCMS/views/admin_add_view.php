<?php
class adminAddView{
	private $view_template;
	public $view_data;

	public function __construct($template){
		$this->view_template = $template;
	}

	public function update(){
		include_once($this->view_template);
	}

	public function getInfo(){

		if ($_SERVER["REQUEST_METHOD"] == "POST"){


      if(isset($_POST['submit']))
      {


        $fname = isset($_POST["fname"])?$_POST["fname"]:'';
        $status = isset($_POST["role"])?$_POST["role"]:'';
        $email = isset($_POST["email"])?$_POST["email"]:'';
        $image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
        $upass = isset($_POST["password"])?$_POST["password"]:'';



        $info= array($fname,$status,$email,$upass,$image);




        return $info;
      }
    }

	}
}
