<?php
namespace system;

class Controller {
	protected $view;
	function __construct (){
		$this->view = new View;
	}

}
