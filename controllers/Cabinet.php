<?php
namespace controllers;

use system\Controller;

class Cabinet extends Controller{

    public function index(){
        $this->view->name = 'John';
        $this->view->email = $_POST['email'];
        $this->view->password = $_POST['password'];

        $this->view->render('cabinet');
    }
}