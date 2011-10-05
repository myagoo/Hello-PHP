<?php

class request {

	public $url;
	public $page;
	public $data = null;

	public function __construct() {
		$this->url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/' . config::$default_controller . '/' . config::$default_action;
		if (isset($_GET['page'])) {
			$this->page = $_GET['page'];
		}
		if (isset($_POST)) {
			$this->data = $_POST;
		}
	}

}
?>
