<?php

class session{

	public function __construct(){
		if(!isset($_SESSION)){
			session_start();
		}
	}

	public function setFlash($message, $type = 'success'){
		$_SESSION['flash'] = array(
			'message' => $message,
			'type' => $type
		);
	}

	public function flash(){
		if(isset($_SESSION['flash']['message'])){
			$html = '<div class="alert-message '.$_SESSION['flash']['type'].'"><a class="close" href="#">×</a><p>'.$_SESSION['flash']['message'].'</p></div>';
			$_SESSION['flash'] = array();
			return $html;
		}
	}
}

?>

