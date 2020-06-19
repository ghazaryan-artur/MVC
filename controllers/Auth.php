<?php
namespace controllers;

use system\Controller;
use models\User;
use helpers\FlashHelper;

class Auth extends Controller{

	public function index(){
		if(!empty($_POST)){
			if(empty($_POST["email"])){   
				$this->view->emailErr= 'Email feild is empty';
			}
			if (empty($_POST["password"])){
				$this->view->passErr = 'Password feild is empty';
			}

			if(!$this->view->emailErr && !$this->view->passErr){
				$model = new \models\User;
				$result = $model->login($_POST['email'], $_POST['password']);
				if($result){
					$_SESSION['user_id'] = $result['id'];
					header("Location: /profile");
				} else {
					$this->view->matching = "Wrong email and/or password";
				}
			}
		}		
		$this->view->render('/auth');
	}
	
	public function reg(){
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->view->errors = [];
			if(empty($_POST['name'])){
				FlashHelper::set_flash_message($_SESSION, 'name','Name field is empty');
			}  
			if(empty($_POST['email'])){   
				FlashHelper::set_flash_message($_SESSION, 'email', 'Email address is empty');
			} elseif (!preg_match('/[A-Za-z0-9\.\-\_]{2,20}[@]{1}[A-Za-z\.]{1,15}/' , $_POST['email'] )){
				FlashHelper::set_flash_message($_SESSION, 'email', 'Email address is wrong');
			}  
			if (empty($_POST['password'])){
				FlashHelper::set_flash_message($_SESSION, 'password', 'Password field is empty');

			} elseif($_POST["password"] != $_POST["conf_password"] ){
				FlashHelper::set_flash_message($_SESSION, 'password', 'Passwords did\'n mutch');

			}
			
			if(empty($_SESSION['name']) && empty($_SESSION['email']) && empty($_SESSION['password'])){
				$model = new User;
				$unique = $model->is_unique($_POST['email']);
				if ($unique){
					$data = $_POST; 
					$data['password'] = MD5($data['password']);
					unset($data['conf_password']);
					$result = $model->reg($data);
					FlashHelper::set_flash_message($_SESSION, 'reg', 'You have successfully registered');
					header('Location: /');
				} else {
					FlashHelper::set_flash_message($_SESSION, 'email', 'User with this email already registred');
				}
			}
		}
		$this->view->render('reg');
	}
	public function logout(){
		unset($_SESSION['user_id']);
        header("Location: /");
    }
}