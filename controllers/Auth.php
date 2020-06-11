<?php
namespace controllers;

use system\Controller;
use models\User;

class Auth extends Controller{

	public function index(){
		if(!empty($_POST)){
			if(empty($_POST["email"])){   
				$this->view->emailErr= 'Email feild is empty';
			} elseif (!preg_match('/[A-Za-z0-9\.\-\_]{2,20}[@]{1}[A-Za-z\.]{1,15}/' , $_POST['email'] )){
				$this->view->emailErr = 'Email address is wrong';
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
				}
	
		
			}
		}		
		$this->view->render('/auth');

	}
	
	public function reg(){
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->view->errors = [];
			if(empty($_POST['name'])){
				$this->view->errors['name'] = 'First name field is empty';
			}  
			if(empty($_POST['email'])){   
				$this->view->errors['email'] = 'Email address is empty';
			} elseif (!preg_match('/[A-Za-z0-9\.\-\_]{2,20}[@]{1}[A-Za-z\.]{1,15}/' , $_POST['email'] )){
				$this->view->errors['email'] = 'Email address is wrong';
			}  
			if (empty($_POST['password'])){
				$this->view->errors['password'] = 'Password field is empty';
			} elseif($_POST["password"] != $_POST["conf_password"] ){
				$this->view->errors['password'] = 'Passwords did\'n mutch';
			}
			/* if(empty($_FILES['img']['name'])) {
				$this->view->errors['img'] =  'Any file isn\'t choosen';
			} else {
				$imgType = strtolower(strrchr($_FILES['img']['name'], '.'));   
				if($imgType != ".jpg" && $imgType != ".png" && $imgType != ".jpeg" && $imgType != ".gif" ) {
					$this->view->errors['img'] = 'Files format should be JPG, JPEG, PNG or GIF';
				} elseif ($_FILES['img']['size'] > 200000000) {
					$this->view->errors['img'] = 'Files size should be less than 200 MB';
				}
			} */
			// Checking is email already registred
			// $selQuery = mysqli_query($link, "SELECT email FROM users");
			
			if(empty($this->view->errors)){
				var_dump('no error');
				$model = new User;
				$data = $_POST; 
				$data['password'] = MD5($data['password']);
				unset($data['conf_password']);
				$data['image'] = '111'; //temporary
				$result = $model->reg($data);
				var_dump($result);
			}
			var_dump('heve error');
		}
		$this->view->render('reg');
	}


}
