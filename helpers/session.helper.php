<?php

class session {

	public function __construct() {
		if(!isset($_SESSION)) {
			session_start();
		}
	}

	public function flash($message = null, $type = 'success') {
		if(isset($message)) {
			$_SESSION['flashes'][] = array(
				'message' => $message,
				'type' => $type
			);
		} else {
			if(isset($_SESSION['flashes'])) {
				$html = '';
				foreach ($_SESSION['flashes'] as $flash) {
					$html .= '<div class="alert-message ' . $flash['type'] . ' fade in" data-alert="alert"><a class="close" href="#">×</a><p>' . $flash['message'] . '</p></div>';
				}
				unset($_SESSION['flashes']);
				return $html;
			}
		}
	}

	public function data($key = null, $value = null) {
		if(!isset($key) && !isset($value)) {
			return $_SESSION;
		} else {
			if(isset($value)) {
				$_SESSION[$key] = $value;
				return true;
			} elseif(isset($_SESSION[$key])) {
				return $_SESSION[$key];
			}
		}
	}

	public function isLogged() {
		return isset($_SESSION['user']);
	}

	public function del($key = null) {
		if(isset($key)) {
			if(isset($_SESSION[$key])) {
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
