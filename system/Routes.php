<?php
namespace system;

class Routes {
	private $components;

	function __construct(){
		$this->components = explode('/', substr($_SERVER['REQUEST_URI'], 1));
				
		if(!empty($this->components[0])){
			if(!empty($this->components[1])){
				$this->get_object($this->components[0], $this->components[1]);
			} else {
				$this->get_object($this->components[0], 'index');
			}
		} else {
			// Call default controller
			$this->get_object('Auth', 'index');
		}

	}
	
	private function get_object($checkingContrl, $methodName) {
		$dir = 'controllers'.DIRECTORY_SEPARATOR.ucfirst($checkingContrl) .'.php';
		if (file_exists($dir)){
			$className = "controllers\\" .ucfirst($checkingContrl);
			if(class_exists($className)){
				$contrl = new $className;
				$this->call_method($contrl, $methodName);
			} else {
				echo "ERROR: class $checkingContrl not found (404)";
			}
		} else {
			echo "ERROR: file controllers/$checkingContrl.php is not found (404)";
		}
	}

	private function call_method($controller, $methodName) {
		if(method_exists($controller, $methodName)) {	
			$params = array_slice($this->components, 2);
			call_user_func_array([$controller, $methodName], $params);
		} else {
			echo "ERROR: Method $methodName is not found in " .get_class($controller);
		}
	}

}

