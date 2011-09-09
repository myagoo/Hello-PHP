<?php
require_once('./core.php');
if(!empty($_GET['p'])){
	$params = explode('/',$_GET['p']);
	$controller = $params[0];
	$action = isset($params[1]) ? $params[1] : 'index';
	if(!empty($params[2])){
		$id = array($params[2]);
	}else{
		$id = array();
	}
}else{
	$controller = 'posts';
	$action = 'index';
	$id=array();
}
if(file_exists(ROOT.'controllers/'.$controller.'.controller.php')){
	require(ROOT.'controllers/'.$controller.'.controller.php');
	$controller = new $controller();
	if(method_exists($controller,$action)){
		call_user_func_array(array($controller,$action),$id);
	}else{
		echo 'L\'action '.$action.' pour le controleur '.get_class($controller).' n\'existe pas.';
	}
}else{
	echo 'Le controleur '.$controller.' n\'existe pas.';
}
?>
