<?php
namespace controllers;

use system\Controller;

class Auf extends Controller{

	public function index(){
		$this->view->render('auf');
	}
	
	public function reg(){
		$this->view->render('reg');
	}

}