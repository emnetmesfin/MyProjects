<?php

class bookController{
	private $model;
	private $account_model;
	private $view;
	private $user_data;

	public function __construct (&$live_model,&$live_account_model, &$live_view){
		$this->model = $live_model;
		$this->view  = $live_view;
		$this->account_model=$live_account_model;
		$user_id= $_SESSION["user_id"];
		$this->user_data= $this->account_model->getAccountInfo($user_id);







		//$this->view->update();

		$this->book();
		//$this->view->update();



	}
	public function book(){
		//$this->model->getAvailableDate();

		if ($_SERVER["REQUEST_METHOD"] == 'POST'){

			if(isset($_POST['submit'])){

				$info=$this->view->getDateData();
				$available=$this->model->getAvailableTimes($info[0],$info[1]);

				$this->view->setTimeData($available);
				$this->view->setUserData($this->user_data);
				$this->view->update();



			}

			if (isset($_POST['bsubmit'])) {
				$day;
				$doc;

				if($this->model->checkPatientAppointment($_SESSION['user_id'])){

					$this->view->setError("You Already have an appointment booked");
					$this->view->setUserData($this->user_data);

					$this->view->update();

				}
				else {
					// code...
					$appinfo=$this->view->getInfo();

					if ($appinfo[2]=="") {
						// code...

						$this->view->setTimeError("You have to select a time");
						$this->view->setUserData($this->user_data);

						$this->view->update();

					}
					else {
						if($appinfo[0]=="tomorrow"){
							$day=date("Y-m-d",strtotime("+1 days", time()));
						}

						elseif($appinfo[0]=="dayAfter"){
							$day=date("Y-m-d",strtotime("+2 days", time()));
						}

						$time=$day.' '.$appinfo[2];


						if ($appinfo[1]== 'Pediatrics') {
		    			$doc_id = 'STAFF/0000/10';
		    		}
		    		elseif ($appinfo[1] == 'Internal Medicine') {
		    			$doc_id = 'STAFF/0001/10';
		    		}
		    		elseif ($appinfo[1] == 'Radiology') {
		    			$doc_id = 'STAFF/0002/10';
		    		}

						$this->model->bookAppointment($_SESSION['user_id'],$doc_id,$time);
							$this->view->setSuc("You have successfully booked an apointment");
							$this->view->setUserData($this->user_data);

							$this->view->update();

					}




				}

				// code...



			}


    	}


		$this->view->setUserData($this->user_data);
		//$this->view->setSuc("");
		$this->view->update();


	}

  }


?>
