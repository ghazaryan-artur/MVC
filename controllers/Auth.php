<?php
namespace controllers;

use system\Controller;

class Auth extends Controller{

	public function index(){
		$this->view->render('auth');
	}
	
	public function reg(){
		
		$this->view->render('reg');
	}

	public function login(){
		var_dump($_POST);
		$this->view->name = 'John';
        $this->view->email = $_POST['email'];
		$this->view->password = $_POST['password'];
		
	}

}