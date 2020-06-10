<?php
namespace controllers;

use system\Controller;


class Auth extends Controller{

	public function index(){
		if(!empty($_POST)){
			var_dump('call login');
			$this->login();
		}
		$this->view->render('/auth');

	}
	
	public function reg(){
		
		$this->view->render('reg');
	}

	public function login(){
		$result = false;
		$this->view->error['email']='';
		if(empty($_POST["email"])){   
            $this->view->error['email'] = 'Email feild is empty';
        } elseif (!preg_match('/[A-Za-z0-9\.\-\_]{2,20}[@]{1}[A-Za-z\.]{1,15}/' , $_POST['email'] )){
            $this->view->error['email'] = 'Email address is wrong';
		}
		if (empty($_POST["password"])){
			$this->view->error['password'] = 'Password feild is empty';
		}
		var_dump($this->view->error['email']);
		if(empty($this->view->error['email'])){
			$model = new \models\User;
			$result = $model->login($_POST['email'], $_POST['password']);
		}
		
		if($result){
			var_dump('logined');
		} else {
			var_dump('not logined');
		}
		// $this->view->render('auth');
	}
}
