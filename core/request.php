<?php

class request{

	public $url;	//URL appelée par l'utilisateur

	public function __construct(){
		$this->url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/posts/index' ;
	}

}

?>
