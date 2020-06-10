<?php
namespace controllers;

use system\Controller;

class Cabinet extends Controller{

    public function index(){
        $this->view->render('cabinet');
    }
}