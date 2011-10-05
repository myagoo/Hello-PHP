<?php

class router{

	/**
	* Permet de parser une url
	* @param $url Url à parser
	* @param $request Objet request à completer
	* @return tableau contenant les paramètres
	**/
	static function parse($request){
		$url = trim($request->url, '/');
		$params = explode('/', $url);
		$request->controller = $params[0];
		$request->action = isset($params[1]) ? $params[1] : 'index';
		$request->params = array_slice($params, 2);
		return true;
	}

	static function redirect($url = null){
		if(isset($url)){
			die(header('Location: '.$url));
		} else {
			die(header('Location: '.BASE_URL));
		}
	}

}

?>

