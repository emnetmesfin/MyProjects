<?php
/**
*
*/
class Admin{

	public $db;

	public function __construct(){
		$this->db = new DatabaseHandler();
	}
	public function addStaff($user_name, $status, $email, $pass, $user_image){
		$this->db->addStaff($user_name, $status, $email, md5($pass), $user_image);
	}
}
