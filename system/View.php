<?php
namespace system;

class View {

	public function render($view_file){
		if (file_exists("views/pattern.php")){

			include "views/pattern.php";
		}
	}
}
