<?php

class ControllerAuthsignup extends Controller
{
	private $username;
	private $password;
	private $email;

	public function view(){
		$this->add_buff('first_var');
	}

	public function signUp(){
		if ($_POST['signup'] === 'Submit' && $_POST['password'] === $_POST['password2']){
			
		}
		print_r($_POST);
	}
}
?>