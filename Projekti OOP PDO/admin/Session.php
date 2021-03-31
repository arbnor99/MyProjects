<?php
class Session{

	public function __construct(){
		session_start();

		if(!isset($_SESSION['id'])){
			$_SESSION['id']=0;
		}
	}

	public function login($user){
		if($user){
			$_SESSION['id']=$user['id'];
			$_SESSION['fullname']=$user['firstname']." ".$user['lastname'];
			$_SESSION['email']=$user['email'];
			$_SESSION['role']=$user['role'];
		}
	}

	public function logout(){
		unset($_SESSION['id']);
		unset($_SESSION['fullname']);
		unset($_SESSION['email']);
		unset($_SESSION['role']);
	}

}

?>