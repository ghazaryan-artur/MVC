<?php
namespace controllers;

use system\Controller;
use models\User;

class Profile extends Controller{
    function __construct(){
        if (!isset($_SESSION['user_id'])){
            header("Location: /");
        }
        parent::__construct();
    }
    
    public function index(){
        $user_id = $_SESSION['user_id'];
        
        $model = new User;
        $user_data = $model->get_data($user_id);
        $this->view->name = $user_data['name'];
        $this->view->email = $user_data['email'];
        $this->view->img = $user_data['image'];

        $this->view->render('profile');
    }

    public function logout(){
        session_unset();
        header("Location: /");
    }
}