<?php
namespace system;



class Controller {
	protected $view;
	public $helper = 'pub';
	function __construct (){
		$this->view = new View();
		// var_dump( $helper);
	}

}
