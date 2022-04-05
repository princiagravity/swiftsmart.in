<?php
// core ctrler
ini_set("display_errors", true);

class admin_index extends CI_Controller{
	public $user;
	
	public function __construct()
	{
		parent::__construct();

		//session_start();// for kcfinder

		$this->user = $this->session->userdata('login_state'); //session data storing
		
		//var_dump($this->user);return;
		$m = $this->router->fetch_method();   			//method retrive
		
		if(!isset($this->user['user_name'])){		// not login
			$_SESSION['login'] = false;// for kcfinder
			if(($m!='login') && ($m!='submit'))
				return $this->signin();
		}
		else if(isset($this->user['user_name'])) { 	//is log
			$_SESSION['login'] = true; // for kcfinder
			if(($m=='login') || ($m=='submit')){
				redirect("admin/admin_ctlr/admin_login");
			}
		}
	}

	function signin(){
	//	redirect("admin/admin_ctlr/index");
	}
	





	
}




?>