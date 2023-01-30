<?php 

//autoload scans the application and looks for undeclared objects
function classAutoloader($class){
	//we use al uppercase or lowercase to be sure we dont have problems later with their names
	$class = strtolower($class);

	$the_path = "includes/{$class}.php";


	// if(file_exists($the_path)){
	// 	require_once($the_path);
	// }else{
	// 	die("This file named {$class}.php was not found ... ");
	// }
	if (is_file($the_path) && !class_exists($class)){
		include $the_path;
	}

}

function redirect($location){
	header("Location: {$location}");

}

spl_autoload_register('classAutoloader');

?>