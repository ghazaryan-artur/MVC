<?php
	session_start();

	// global $helper;
	// $helper = 'xxx';
	spl_autoload_register(function($class_name){
		include str_replace("\\", DIRECTORY_SEPARATOR,  $class_name) .".php";
	});




	// $helper2 = 'yyy';

	new \system\Routes;