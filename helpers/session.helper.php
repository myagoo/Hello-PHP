<?php

class session{

	public function __construct(){
		if(!isset($_SESSION)){
			session_start();
		}
	}

	public function flash($message = null, $type = 'success'){
		if(isset($message)){
			$this->data('flash', array(
				'message' => $message,
				'type' => $type
			));
		} else {
			if(isset($_SESSION['flash']['message'])){
				$html = '<div class="alert-message '.$_SESSION['flash']['type'].'"><a class="close" href="#">×</a><p>'.$_SESSION['flash']['message'].'</p></div>';
				$_SESSION['flash'] = array();
				return $html;
			}
		}
	}

	public function data($key = null, $value = null){
		if(!isset($key) && !isset($value)){
			return $_SESSION;
		} else {
			if(!isset($key)){
				return false;
			} else {
				if(isset($value)){
					$_SESSION[$key] = $value;
					return true;
				} else {
					return $_SESSION[$key];
				}
			}
		}
	}

	public function isLogged(){
		return $this->data('user');
	}

	public function del($key = null){
		if(isset($key)){
			if(isset($_SESSION[$key])){
				unset($_SESSION[$key]);
				return true;
			} else {
				return false;
			}
		} else {
			session_destroy();
			return true;
		}
	}
}

?>

