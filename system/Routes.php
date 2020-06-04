<?php
namespace system;

class Routes {
	private $components;

	function __construct(){
		$this->components = explode('/', substr($_SERVER['REQUEST_URI'], 1));
				
		if(!empty($this->components[0])){
			$controllerData = $this->getObject($this->components[0]);

			if(!$controllerData['error']) { 
				
				if (!empty($this->components[1])){
					$methodError = $this->callMethod($controllerData['contrl'], $this->components[1]);
					if($methodError['error']){
						echo $methodError['msg'];
					} // else -  method called successful
				} else {
					// Call default method
					$methodError = $this->callMethod($controllerData['contrl'], 'index');
					if ($methodError['error']){
						echo $methodError['msg'];
					} // else -  method called successful
				}

			} else {
				echo $controllerData['msg'];
			}

		} else {
			// Call default controller
			$defContrData =  $this->getObject('Entrance');
			if (!$defContrData['error']){
				$methodError = $this->callMethod($defContrData['contrl'], 'index');
				if ($methodError['error']){
					echo $methodError['msg'];
				} // else  - method called successful
			} else {
				echo $defContrData['msg'];
			}
		}

	}
	
	private function getObject($name){
		$output = ['error' => false, 'contrl'=> '', 'msg'=>''];
		$dir = 'controllers'.DIRECTORY_SEPARATOR.ucfirst($name) .'.php';
		if (file_exists($dir)){
			$className = "controllers\\" .ucfirst($name);

			if(class_exists($className)){
				$output['contrl'] = new $className;
				return $output;
			} else {
				$output['error'] = true;
				$output['msg'] = "ERROR: class $name not found (404)";
				return $output;
			}
		} else {
			$output['error'] = true;
			$output['msg'] = "ERROR: file controllers/$name.php is not found (404)";
			return $output;
		}
	}

	private function callMethod($controller, $methodName){
		$output = ['error' => false, 'msg' => ''];
		if(method_exists($controller, $methodName)) {	
			$params = array_slice($this->components, 2);
			call_user_func_array([$controller, $methodName], $params);
			return $output;
		} else {
			$output['error'] = true;
			$output['msg'] = "ERROR: Method $methodName is not found in " .get_class($controller) ." controller";
			return $output;
		}
	}

}

