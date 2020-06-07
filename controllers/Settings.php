<?php 
namespace controllers;

use system\Controller;

class Settings extends Controller{
	
	function __construct (){
		parent::__construct();
	}
	public function general(){

		var_dump('You call general method');
		// some action
	}

	public function index(){
		$x = "some text";
		$y = "another text";
		$this->view->firstArrg = $x;
		$this->view->secondArrg = $y;

		$this->view->Render('settings');

	}
	public function print_text($text1, $text2){

		$this->view->firstArrg = $text1;
		$this->view->secondArrg = $text2;

		$this->view->Render('settings');

	}
	
}