<?php
function debug($var){
	if(config::$debug > 0){
		$backtrace = debug_backtrace();
		echo '<p><a href="#" onclick="$(this).parent().next(\'ol\').slideToggle(); return false"><strong>'.$backtrace[0]['file'].'</strong> line '.$backtrace[0]['line'].'</a></p>';
		echo '<ol style="display:none">';
		foreach($backtrace as $key => $value){
			if($key > 0){
				echo '<li><strong>'.$backtrace[$key]['file'].'</strong> line '.$backtrace[$key]['line'].'</li>';
			}
		}
		echo '</ol>';
		echo '<pre>';
		print_r($var);
		echo '</pre>';
	}
}

function objectToArray($d) {
	if (is_object($d)) {
		// Gets the properties of the given object
		// with get_object_vars function
		$d = get_object_vars($d);
	}

	if (is_array($d)) {
		/*
		* Return array converted to object
		* Using __FUNCTION__ (Magic constant)
		* for recursive call
		*/
		return array_map(__FUNCTION__, $d);
	}
	else {
		// Return array
		return $d;
	}
}
?>
