<?php
namespace system;


class View {

	public function render($view_file, $wrap = true){

		if (file_exists("views/$view_file.php")){
			if($wrap){
				include "views/layout/header.php";
					include "views/$view_file.php";
				include "views/layout/footer.php";
			} else {
				include "views/$view_file.php";
			}
		}
	}

	

	public function __get ($name){
		$this->$name = null;
	}
}
