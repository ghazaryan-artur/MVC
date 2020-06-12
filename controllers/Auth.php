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
				} else {
					$this->view->matching = "Wrong email or password";
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
			if(empty($_FILES['image']['name'])) {
				$this->view->errors['image'] =  'Any file isn\'t choosen';
			} else {
				$imgType = strtolower(strrchr($_FILES['image']['name'], '.'));   
				if($imgType != ".jpg" && $imgType != ".png" && $imgType != ".jpeg" && $imgType != ".gif" ) {
					$this->view->errors['image'] = 'Files format should be JPG, JPEG, PNG or GIF';
				} elseif ($_FILES['image']['size'] > 200000000) {
					$this->view->errors['image'] = 'Files size should be less than 200 MB';
				}
			}

			
			if(empty($this->view->errors)){
				$model = new User;
				$unique = $model->is_unique($_POST['email']);
				if ($unique){
					$data = $_POST; 
					$data['password'] = MD5($data['password']);
					unset($data['conf_password']);
					$uploadingName = microtime(). $imgType;
					$data['image'] = $uploadingName; 
					$result = $model->reg($data);
					if($result){
						if (move_uploaded_file($_FILES['image']['tmp_name'], "public/images/".$uploadingName)){
							$_SESSION['reg'] = 'You have successfully registered';
							header('Location: /');
						} else {
							$this->view->errors['image']  = "Error with uploading your foto";
						}
					}
				} else {
					$this->view->errors['email'] = "User with this email already registred";
				}
			}
		}
		$this->view->render('reg');
	}


}
