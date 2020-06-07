<?php
namespace system;

class View {
	function __construct (){
	}


	public function render($view_file){
		if (file_exists("views/".$view_file.".php")){
			session_start();
			$_SESSION['text1'] = $this->firstArrg;
			$_SESSION['text2'] = $this->secondArrg;
			include "views/".$view_file.".php";
		}
	}
}
